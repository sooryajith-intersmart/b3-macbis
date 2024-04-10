<?php

namespace Modules\Admin\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PageBanner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\app\Http\Requests\PageBannerRequest;

class PageBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $page_banners = PageBanner::all();

        return view('admin::page-banner.index', compact('page_banners'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $page_banner = PageBanner::find(base64_decode($id));
        if ($page_banner) {
            return view('admin::page-banner.edit', compact('page_banner'));
        }

        abort(404);
    }

    /**
     * Update the specified MetaTag resource in storage.
     *
     * @param \Illuminate\Http\Request $request The HTTP request containing updated data.
     * @param \App\Models\MetaTag $meta_tag The MetaTag instance to be updated.
     * @return \Illuminate\Http\RedirectResponse A redirection response indicating success or failure.
     */
    public function update(PageBannerRequest $request, PageBanner $page_banner)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $page_banner->deleteFile('image');
            $image = $page_banner->uploadFile($request->image, $page_banner->fileDirectory());
            $data['image'] = $image;
        }
        if (!$request->filled('sort_order'))
            $data['sort_order'] = 0;
        if ($page_banner->fill($data)->save()) {
            return redirect()->route('page-banner.index')->with('success', 'Page Banner updated successfully!');
        }else{
            return redirect()->route('page-banner.index')->with('error', 'Failed to update Page Banner.');
        }
    }
}
