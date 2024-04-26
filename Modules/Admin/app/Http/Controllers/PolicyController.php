<?php

namespace Modules\Admin\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;
use Modules\Admin\app\Http\Requests\PolicyRequest;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $policies = Policy::latest()->get();

        return view('admin::policy.index', compact('policies'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::policy.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PolicyRequest $request)
    {
        $data = $request->all();
        if ($request->has('page_banner_image')) {
            $page_banner_image = (new Policy())->uploadFile($request->page_banner_image, (new Policy())->fileDirectory());
            $data['page_banner_image'] = $page_banner_image;
        }
        if ($policy = Policy::create($data)) {
            return redirect()->route('policy.index')->with('success', $policy->title . ' created successfully!');
        }else{
            return redirect()->route('policy.index')->with('error', 'Failed to create ' . $policy->title . '.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $policy = Policy::find(base64_decode($id));
        if($policy){
            return view('admin::policy.edit', compact('policy'));
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
    public function update(PolicyRequest $request, Policy $policy)
    {
        $data = $request->all();
        if ($request->has('page_banner_image')) {
            $policy->deleteFile('page_banner_image');
            $page_banner_image = $policy->uploadFile($request->page_banner_image, $policy->fileDirectory());
            $data['page_banner_image'] = $page_banner_image;
        }
        if ($policy->fill($data)->save()) {
            return redirect()->route('policy.edit', base64_encode($policy->id))->with('success', $policy->title . ' updated successfully!');
        }else{
            return redirect()->route('policy.edit', base64_encode($policy->id))->with('error', 'Failed to update ' . $policy->title . '.');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Policy $policy)
    {
        if ($policy->delete()) {
            return redirect()->route('policy.index')->with('success', 'Policy deleted successfully.');
        } else {
            return redirect()->route('policy.index')->with('error', 'Failed to delete Policy.');
        }
    }
}