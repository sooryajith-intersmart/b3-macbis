<?php

namespace App\Models;

use App\Helpers\AdminHelper;
use App\Traits\FileTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Policy extends Model
{
    use HasFactory, FileTrait, SoftDeletes, Sluggable;

    protected $fillable = [
        'title',
        'content',
        'page_banner_subtitle',
        'page_banner_title',
        'page_banner_image',
        'page_banner_image_alt_text',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
    ];

    protected $fileDirectory = 'policy';

    public function fileDirectory()
    {
        return $this->fileDirectory;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

    public function getPageBannerImageValueAttribute()
    {
        if ($this->page_banner_image && Storage::disk('public')->exists($this->page_banner_image))
            return Storage::url($this->page_banner_image);
        else if ($this->page_banner_image && file_exists($this->page_banner_image))
            return asset($this->page_banner_image);
        else
            return asset(AdminHelper::getValueByKey('default_image'));
    }
}
