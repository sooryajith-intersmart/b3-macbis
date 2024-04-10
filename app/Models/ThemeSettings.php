<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FileTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ThemeSettings extends Model
{
    use HasFactory, FileTrait;

    protected $fileDirectory = 'theme-settings';
    
    public function getFileDirectory()
    {
        return $this->fileDirectory;
    }

    public function getKeyWithoutUnderscoreAttribute()
    {
        return str_replace('_', ' ', Str::title($this->key));
    }

    public function getImageAttribute()
    {
        if ($this->value && Storage::disk('public')->exists($this->value))
            return Storage::url($this->value);
        else if ($this->value && file_exists($this->value))
            return asset($this->value);
        else
            return asset(AdminHelper::getValueByKey('default_image'));
    }
}
