<?php

namespace App\Helpers;

use App\Models\ThemeSettings;
use Illuminate\Support\Facades\Storage;

class AdminHelper
{
    /**
     * get value by key from theme settings
     *
     * @author Sooryajith
     */
    public static function getValueByKey($key)
    {
        $theme_settings = ThemeSettings::where('key', $key)->first();

        if (!$theme_settings) {
            return null;
        }

        switch ($theme_settings->type) {
            case 0:
            case 2:
                return $theme_settings->value;
            case 1:
                return $theme_settings->image;
            default:
                return null;
        }
    }
}