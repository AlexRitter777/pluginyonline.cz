<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Rules\SummernoteContent;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
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

        $data['thumbnail'] = ImageUploadService::uploadImage($request, 'thumbnail');

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

        return view('admin.services.preview-single', ['service' => $service]);

    }

    public function showGrid(string $slug)
    {
        $service = Service::findBySlug($slug);

        return view('admin.services.preview-grid', ['service' => $service]);

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {

        return view('admin.services.edit', compact('service'));

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
        $oldThumbnail = null;

        if(!$data['old_thumbnail'] && $service->thumbnail) {
            $oldThumbnail = $service->thumbnail;
        }

        if($data['old_thumbnail']) {
            $data['thumbnail'] = $data['old_thumbnail'];
        }else{
            $data['thumbnail'] = ImageUploadService::uploadImage($request, 'thumbnail', $oldThumbnail);
        }


        $service->update($data);

        Cache::forget('services');

        return redirect(route('admin.services.index'))->with('success', 'Service has been updated!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $service = Service::find($id);
        //dd($service->thumbnail);
        if(isset($service->thumbnail)) {
            Storage::delete($service->thumbnail);
        }
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
