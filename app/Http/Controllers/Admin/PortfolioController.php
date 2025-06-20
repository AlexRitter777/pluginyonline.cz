<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Models\Portfolio;
use App\Services\CacheCleanerService;
use App\Traits\HasThumbnail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class PortfolioController extends Controller
{
    use HasThumbnail;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::orderBy('created_at', 'desc')->paginate(4);

        return view('admin.portfolio.index', ['portfolios' => $portfolios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Throwable
     */
    public function store(StorePortfolioRequest $request)
    {

        $validated = $request->validated();

        $validated['thumbnail'] = $this->updateThumbnail($request->file('thumbnail'));

        $images = $request->file('images') ?: [];
        $positions = (array) json_decode($request->input('positions'), true);

        $savedImagePaths = [];

        try {

            DB::transaction(function () use ($validated, $images, $positions, &$savedImagePaths) {

                $portfolio = Portfolio::create($validated);

                $savedImagePaths = $portfolio->saveImages($positions, $images);

                $portfolio->slugs()->create([
                    'slug' => $validated['slug'],
                    'is_current' => true
                ]);

            });

        } catch (\Throwable $e) {
            Storage::delete($validated['thumbnail']);

            foreach ($savedImagePaths as $path) {
                Storage::delete($path);
            }

            throw $e;
        }

        CacheCleanerService::cleanCache([
            'portfolios',
            'admin_dashboard_portfolios',
            'admin_dashboard_portfolios_count'
        ]);

        return redirect()->route('admin.portfolio.index');

    }

    /**
     * Display the specified resource.
     */
    public function showSingle(Portfolio $portfolio)
    {
        return view('admin.portfolio.preview-single', ['portfolio' => $portfolio]);
//        TODO: Change to slug in URL
    }

    public function showGrid(Portfolio $portfolio){

        $portfolios = [];

        for($i = 0; $i < 4; $i++){
            $portfolios[] = $portfolio;
        }

        return view('admin.portfolio.preview-grid', ['portfolios' => $portfolios]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {

        $images = [];
        $paths = [];

        $imagesCollection = $portfolio->images;

        if(count($imagesCollection) != 0) {

            $images = $portfolio->makePositionsArray($imagesCollection);
            $paths = $portfolio->makePathsArray($imagesCollection);

        }

        $slug = $portfolio->slugs->where('is_current', true)->first();

        return view('admin.portfolio.edit', ['portfolio' => $portfolio, 'images' => $images, 'paths' => $paths, 'slug' => $slug]);
    }

    /**
     * Update the specified resource in storage.
     * @throws \Throwable
     */
    public function update(StorePortfolioRequest $request, Portfolio $portfolio)
    {


        $validated = $request->validated();

        $updatedImagePaths = [];

        //Images gallery update prepare data
        $images = $request->file('images') ?: [];
        $positions = json_decode($request->input('positions'),true);
        $oldImagesIds = json_decode($request->input('oldImagesIds'),true);
        $existingImages = $portfolio->images()->get()->keyBy('unique_id');
        //dd($positions, $existingImages, $oldImagesIds);

        try{
            DB::transaction(function () use ($request, $portfolio, $validated, $images, $positions, $oldImagesIds, $existingImages, &$updatedImagePaths) {

                // Update thumbnail
                $validated['thumbnail'] = $this->updateThumbnail($request->file('thumbnail'), $validated['old_thumbnail'], $portfolio->thumbnail);

                // Update Images
                $updatedImagePaths = $portfolio->updateImages($positions, $images, $oldImagesIds, $existingImages);

                //update Slug
                if($validated['old_slug'] !== $validated['slug']) {

                    $portfolio->slugs()
                        ->where('is_current', true)
                        ->first()
                        ->update(['is_current' => false]);

                    $portfolio->slugs()->updateOrCreate(
                        ['slug' => $validated['slug']],
                        ['is_current' => true]
                    );

                }

                //Update project
                $portfolio->update($validated);

            });
        }catch (\Throwable $e){
            Storage::delete($validated['thumbnail']);

            // remove images
            foreach ($updatedImagePaths as $path) {
                Storage::delete($path);
            }

            throw $e;
        }

        $portfolio->deleteImages($existingImages, $oldImagesIds);

        CacheCleanerService::cleanCache([
            'portfolios',
            'admin_dashboard_portfolios',
            'admin_dashboard_portfolios_count'
        ]);


        return redirect(route('admin.portfolio.index'))
            ->with('success', 'Project has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $portfolio = Portfolio::findOrFail($id);

        if($portfolio->thumbnail) {
            Storage::delete($portfolio->thumbnail);
        }


        $existingImages = $portfolio->images()->get();

        $portfolio->deleteImages($existingImages, []);

        $portfolio->delete();

        CacheCleanerService::cleanCache([
            'portfolios',
            'admin_dashboard_portfolios',
            'admin_dashboard_portfolios_count'
        ]);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Portfolio has been deleted successfully.');

    }
}
