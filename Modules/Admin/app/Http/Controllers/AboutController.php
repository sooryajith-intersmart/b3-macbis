<?php

namespace Modules\Admin\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use Modules\Admin\app\Http\Requests\AboutRequest;

class AboutController extends Controller
{
   /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $about = About::latest()->first();
        return view('admin::about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $request, About $about)
    {
        $data = $request->all();
        if($request->has('image')) {
            $about->deleteFile('image');
            $image = $about->uploadFile($request->image, $about->fileDirectory());
            $data['image'] = $image;
        }
        if ($about->fill($data)->save()) {
            return back()->with('success', 'About Updated Successfully');
        } else {
            return back()->with('error', 'Failed to Update About');
        }
    }
}
