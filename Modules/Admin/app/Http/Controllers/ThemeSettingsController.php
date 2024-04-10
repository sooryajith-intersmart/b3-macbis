<?php

namespace Modules\Admin\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ThemeSettings;
use Illuminate\Http\Request;

class ThemeSettingsController extends Controller
{
    public function index()
    {
        $theme_settings = ThemeSettings::all();

        return view('admin::theme-settings.index', compact('theme_settings'));
    }

    public function edit($id)
    {
        $theme_setting = ThemeSettings::find(base64_decode($id));
        if ($theme_setting) {
            return view('admin::theme-settings.edit', compact('theme_setting'));
        }
        abort(404);
    }

    public function update(Request $request, ThemeSettings $theme_settings)
    {
        $request->validate([
            'value' => [
                ($request->type == 0 || $request->type == 2) ? 'required' : 'nullable',
            ],
        ]);

        if ($request->hasFile('value')) {
            $request->validate([
                'value' => 'mimetypes:text/plain,image/svg+xml,image/png,image/jpg,image/jpeg,image/webp,image/vnd.microsoft.icon,image/x-icon'
            ]);
            $theme_settings->deleteFile('value');
            $value = $request->file('value');
            $theme_settings->value = $theme_settings->uploadFile($value, $theme_settings->getFileDirectory());
        } else {
            if ($request->type == 0 || $request->type == 2) {
                $theme_settings->value = $request->value;
            }
        }

        if ($theme_settings->update()) {
            return to_route('theme-settings.index')->with('success', 'Theme Setting updated successfully!');
        } else {
            return to_route('theme-settings.index')->with('error', 'Failed to update Theme Setting.');
        }
    }

    /**
     * update sort order
     */
    public function updateSortOrder(Request $request)
    {
        $model = $request->model;
        $id = $request->id;
        $value = $request->value;
        $model = 'App\\Models\\' . $model;
        if ($id) {
            $data = $model::find(base64_decode($id));
            if ($data) {
                $data->sort_order = $value;
                if ($data->save())
                    return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    /**
     * update status
     */
    public function updateStatus(Request $request)
    {
        $model = $request->model;
        $id = $request->id;
        $value = $request->value;
        $model = 'App\\Models\\' . $model;
        if ($id) {
            $data = $model::find(base64_decode($id));
            if ($data) {
                $data->status = $value;
                if ($data->save())
                    return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}