<?php

namespace Modules\Admin\app\Http\Controllers;

use App\Models\Slider;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\app\Http\Requests\SliderRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $sliders = Slider::latest()->get();

        return view('admin::slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::slider.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(SliderRequest $request)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $image = (new Slider())->uploadFile($request->image, (new Slider())->fileDirectory());
            $data['image'] = $image;
        }
        if (!$request->filled('sort_order'))
            $data['sort_order'] = 0;
        if (Slider::create($data)) {
            return redirect()->route('slider.index')->with('success', 'Slider created successfully!');
        }else{
            return redirect()->route('slider.index')->with('error', 'Failed to create Slider.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $slider = Slider::find(base64_decode($id));
        if($slider){
            return view('admin::slider.edit', compact('slider'));
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
    public function update(SliderRequest $request, Slider $slider)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $slider->deleteFile('image');
            $image = $slider->uploadFile($request->image, $slider->fileDirectory());
            $data['image'] = $image;
        }
        if (!$request->filled('sort_order'))
            $data['sort_order'] = 0;
        if ($slider->fill($data)->save()) {
            return redirect()->route('slider.index')->with('success', 'Slider updated successfully!');
        }else{
            return redirect()->route('slider.index')->with('error', 'Failed to update Slider.');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Slider $slider)
    {
        if ($slider->delete()) {
            return redirect()->route('slider.index')->with('success', 'Slider deleted successfully.');
        } else {
            return redirect()->route('slider.index')->with('error', 'Failed to delete Slider.');
        }
    }
}