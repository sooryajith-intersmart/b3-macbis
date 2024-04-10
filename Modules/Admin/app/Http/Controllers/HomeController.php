<?php

namespace Modules\Admin\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Admin\app\Http\Requests\HomeRequest;

class HomeController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $home = Home::latest()->first();
        return view('admin::home.edit', compact('home'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HomeRequest $request, Home $home)
    {
        $data = $request->all();
        if($request->has('section_three_image')) {
            $home->deleteFile('section_three_image');
            $section_three_image = $home->uploadFile($request->section_three_image, $home->fileDirectory());
            $data['section_three_image'] = $section_three_image;
        }
        if ($home->fill($data)->save()) {
            return back()->with('success', 'Home Updated Successfully');
        } else {
            return back()->with('error', 'Failed to Update Home');
        }
    }
}