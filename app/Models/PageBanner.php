<?php

namespace App\Models;

use App\Helpers\AdminHelper;
use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageBanner extends Model
{
    use HasFactory, FileTrait;

    protected $fillable = [
        'page',
        'subtitle',
        'title',
        'image',
        'image_alt_text',
    ];
    
    protected $fileDirectory = 'slider';

    public function fileDirectory()
    {
        return $this->fileDirectory;
    }

    public function getPageValueAttribute()
    {
        return str_replace('_', ' ', Str::title($this->page));
    }

    public function getImageValueAttribute()
    {
        if ($this->image && Storage::disk('public')->exists($this->image))
            return Storage::url($this->image);
        else if ($this->image && file_exists($this->image))
            return asset($this->image);
        else
            return asset(AdminHelper::getValueByKey('default_image'));
    }
}