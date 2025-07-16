<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageRequest;
use App\Models\Page;
use App\Services\CacheCleanerService;
use App\Services\PingSitemapService;
use App\Services\SitemapGeneratorService;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::orderBy('updated_at', 'desc')->paginate(6);

        return view('admin.pages.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePageRequest $request, SitemapGeneratorService $sitemapGenerator, PingSitemapService $pingSitemap)
    {
        $validated = $request->validated();

        $page = Page::create($validated);

        CacheCleanerService::clearAllPages('pages');

        if($validated['is_published']) {
            defer(function () use ($sitemapGenerator, $pingSitemap) {
                $sitemapGenerator->generate();
                $pingSitemap->ping();
            });
        }

        return redirect()->route('admin.pages.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $page = Page::findBySlug($slug);

        if(!$page){
            abort(404);
        }

        return view('admin.pages.preview-single', ['page' => $page]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePageRequest $request, Page $page, SitemapGeneratorService $sitemapGenerator, PingSitemapService $pingSitemap)
    {
        $validated = $request->validated();

        $page->update($validated);

        CacheCleanerService::clearAllPages('pages');

        if($page->wasChanged('is_published') && $validated['is_published']) {
            defer(function () use ($sitemapGenerator, $pingSitemap) {
                $sitemapGenerator->generate();
                $pingSitemap->ping();
            });
        }

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page has been updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        CacheCleanerService::clearAllPages('pages');
        return redirect()->route('admin.pages.index')
            ->with('success', 'Page has been deleted successfully!');
    }
}
