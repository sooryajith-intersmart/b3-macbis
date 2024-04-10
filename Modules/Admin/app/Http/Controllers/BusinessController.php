<?php

namespace Modules\Admin\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\app\Http\Requests\BusinessRequest;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $businesses = Business::latest()->get();

        return view('admin::business.index', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::business.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(BusinessRequest $request)
    {
        $data = $request->all();
        if ($request->has('logo')) {
            $logo = (new Business())->uploadFile($request->logo, (new Business())->fileDirectory());
            $data['logo'] = $logo;
        }
        if ($request->has('image')) {
            $image = (new Business())->uploadFile($request->image, (new Business())->fileDirectory());
            $data['image'] = $image;
        }
        if (!$request->filled('sort_order'))
            $data['sort_order'] = 0;
        if (Business::create($data)) {
            return redirect()->route('business.index')->with('success', 'Business created successfully!');
        }else{
            return redirect()->route('business.index')->with('error', 'Failed to create Business.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $business = Business::find(base64_decode($id));
        if($business){
            return view('admin::business.edit', compact('business'));
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
    public function update(BusinessRequest $request, Business $business)
    {
        $data = $request->all();
        if ($request->has('logo')) {
            $business->deleteFile('logo');
            $logo = $business->uploadFile($request->logo, $business->fileDirectory());
            $data['logo'] = $logo;
        }
        if ($request->has('image')) {
            $business->deleteFile('image');
            $image = $business->uploadFile($request->image, $business->fileDirectory());
            $data['image'] = $image;
        }
        if (!$request->filled('sort_order'))
            $data['sort_order'] = 0;
        if ($business->fill($data)->save()) {
            return redirect()->route('business.edit', base64_encode($business->id))->with('success', 'Business updated successfully!');
        }else{
            return redirect()->route('business.edit', base64_encode($business->id))->with('error', 'Failed to update Business.');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Business $business)
    {
        if ($business->delete()) {
            return redirect()->route('business.index')->with('success', 'Business deleted successfully.');
        } else {
            return redirect()->route('business.index')->with('error', 'Failed to delete Business.');
        }
    }
}
