<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Models\Portfolio;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PortfolioController extends Controller
{
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

        $validated['thumbnail'] = ImageUploadService::uploadImage($request, 'thumbnail');

        $portfolio = Portfolio::create($validated);

        $images = $request->file('images') ?: [];


        $positions = json_decode($request->input('positions'),true);

        //$images['id'] => file

        //'id' => 'position'

        foreach ($positions as $key => $position) {

            if($images[$key]) {

                $uploadedImage = ImageUploadService::uploadOnlyImage($images[$key]);
                $path = $uploadedImage['path'];
                $imageName = $uploadedImage['name'];

                $portfolio->images()->create([
                    'path' => $path,
                    'filename' => $imageName,
                    'position' => $position
                ]);
            }
        }


        //Cache::forget('portfolios');


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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        //
    }
}
