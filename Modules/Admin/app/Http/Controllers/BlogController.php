<?php

namespace Modules\Admin\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Modules\Admin\app\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('admin::blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::blog.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(BlogRequest $request)
    {
        $data = $request->all();
        if ($request->has('thumb_image')) {
            $thumb_image = (new Blog())->uploadFile($request->thumb_image, (new Blog())->fileDirectory());
            $data['thumb_image'] = $thumb_image;
        }
        if ($request->has('image')) {
            $image = (new Blog())->uploadFile($request->image, (new Blog())->fileDirectory());
            $data['image'] = $image;
        }
        $data['posted_date'] = Carbon::today();
        if (Blog::create($data)) {
            return redirect()->route('blog.index')->with('success', 'Blog created successfully!');
        }else{
            return redirect()->route('blog.index')->with('error', 'Failed to create Blog.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $blog = Blog::find(base64_decode($id));
        if($blog){
            return view('admin::blog.edit', compact('blog'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $data = $request->all();
        if ($request->has('thumb_image')) {
            $blog->deleteFile('thumb_image');
            $thumb_image = $blog->uploadFile($request->thumb_image, $blog->fileDirectory());
            $data['thumb_image'] = $thumb_image;
        }
        if ($request->has('image')) {
            $blog->deleteFile('image');
            $image = $blog->uploadFile($request->image, $blog->fileDirectory());
            $data['image'] = $image;
        }
        if ($blog->fill($data)->save()) {
            return redirect()->route('blog.edit', base64_encode($blog->id))->with('success', 'Blog updated successfully!');
        }else{
            return redirect()->route('blog.edit', base64_encode($blog->id))->with('error', 'Failed to update Blog.');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Blog $blog)
    {
        if ($blog->delete()) {
            return redirect()->route('blog.index')->with('success', 'Blog deleted successfully.');
        } else {
            return redirect()->route('blog.index')->with('error', 'Failed to delete Blog.');
        }
    }
}