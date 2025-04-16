<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Models\Portfolio;
use App\Traits\HasThumbnail;
use Illuminate\Support\Facades\Cache;
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
     */
    public function store(StorePortfolioRequest $request)
    {

        $validated = $request->validated();

        $validated['thumbnail'] = $this->updateThumbnail($request->file('thumbnail'));

        $portfolio = Portfolio::create($validated);

        $images = $request->file('images') ?: [];

        $positions = (array) json_decode($request->input('positions'), true);

        $portfolio->saveImages($positions, $images);

        Cache::forget('portfolios');

        return redirect()->route('admin.portfolio.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        //
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

        return view('admin.portfolio.edit', ['portfolio' => $portfolio, 'images' => $images, 'paths' => $paths]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePortfolioRequest $request, Portfolio $portfolio)
    {

        $validated = $request->validated();

        // Update thumbnail
        $validated['thumbnail'] = $this->updateThumbnail($request->file('thumbnail'), $validated['old_thumbnail'], $portfolio->thumnail);


        //Images gallery update
        $images = $request->file('images') ?: [];
        $positions = json_decode($request->input('positions'),true);
        $oldImagesIds = json_decode($request->input('oldImagesIds'),true);
        $existingImages = $portfolio->images()->get();

        $portfolio->updateImages($positions, $images, $oldImagesIds, $existingImages);
        $portfolio->deleteImages($existingImages, $oldImagesIds);

        Cache::forget('portfolio');

        return redirect(route('admin.portfolio.index'))
            ->with('success', 'Project has been updated!');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $portfolio = Portfolio::findOrFail($id);

        Storage::delete($portfolio->thumbnail);

        $existingImages = $portfolio->images()->get();

        $portfolio->deleteImages($existingImages, []);

        $portfolio->delete();

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Portfolio has been deleted successfully.');

    }
}
