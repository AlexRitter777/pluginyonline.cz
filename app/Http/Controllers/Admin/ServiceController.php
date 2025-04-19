<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Rules\SummernoteContent;
use App\Traits\HasThumbnail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    use HasThumbnail;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|min:3|max:65',
            'description' => 'required|min:3|max:170',
            'content' => new SummernoteContent,
            'is_published' => 'required|boolean',
            'thumbnail' => 'nullable|image|max:6144',
            'position' => 'nullable|integer|min:1',
        ]);

        $data = $request->all();

        $data['thumbnail'] = $this->updateThumbnail(request()->file('thumbnail'));

        $service = Service::create($data);

        Cache::forget('services');

        return redirect(route('admin.services.index'))->with('success', 'Service has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function showSingle(string $slug)
    {
        $service = Service::findBySlug($slug);

        if(!$service){
            abort(404);
        }

        return view('admin.services.preview-single', ['service' => $service]);

    }

    public function showGrid(string $slug)
    {
        $services = [];

        $service = Service::findBySlug($slug);

        if(!$service){
            abort(404);
        }

        for($i = 0; $i < 3; $i++){
            $services[] = $service;
        }

        return view('admin.services.preview-grid', ['services' => $services]);

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {

        return view('admin.services.edit', ['service' => $service]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {

        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:800',
            'content' => new SummernoteContent,
            'is_published' => 'required|boolean',
            'thumbnail' => 'nullable|image|max:6144',
            'position' => 'nullable|integer|min:1',
        ]);

        $data = $request->all();

        $data['thumbnail'] = $this->updateThumbnail(request()->file('thumbnail'), $data['old_thumbnail'], $service->thumbnail);

        $service->update($data);

        Cache::forget('services');

        return redirect(route('admin.services.index'))
            ->with('success', 'Service has been updated!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $service = Service::findOrFail($id);

        if($service->thumbnail){
            Storage::delete($service->thumbnail);
        }


        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');

    }
}
