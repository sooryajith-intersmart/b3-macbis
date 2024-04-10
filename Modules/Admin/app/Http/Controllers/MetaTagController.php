<?php

namespace Modules\Admin\app\Http\Controllers;

use App\Models\MetaTag;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MetaTagController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $meta_tags = MetaTag::all();

        return view('admin::meta-tag.index', compact('meta_tags'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $meta_tag = MetaTag::find(base64_decode($id));
        if ($meta_tag) {
            return view('admin::meta-tag.edit', compact('meta_tag'));
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
    public function update(Request $request, MetaTag $meta_tag)
    {
        $request->validate([
            'meta_title' => 'required',
            'meta_description' => 'required'
        ]);

        $meta_tag->meta_title = $request->meta_title;
        $meta_tag->meta_description = $request->meta_description;
        $meta_tag->meta_keywords = $request->meta_keywords;

        if ($meta_tag->update()) {
            return redirect()->route('meta-tag.index')->with('success', 'Meta Tag updated successfully!');
        } else {
            return redirect()->route('meta-tag.index')->with('error', 'Failed to update Meta Tag.');
        }
    }
}
