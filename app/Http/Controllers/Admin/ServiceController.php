<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Rules\SummernoteContent;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

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
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:800',
            'content' => new SummernoteContent,
            'is_published' => 'required|boolean',
            'thumbnail' => 'nullable|image|max:6144',
            'position' => 'nullable|integer|min:1',
        ]);

        $data = $request->all();

        $data['thumbnail'] = ImageUploadService::uploadImage($request, 'thumbnail');

        $service = Service::create($data);

        return redirect(route('admin.services.index'))->with('success', 'Service has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
