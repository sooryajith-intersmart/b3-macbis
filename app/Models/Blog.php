<?php

namespace App\Models;

use App\Helpers\AdminHelper;
use App\Traits\FileTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory, FileTrait, SoftDeletes, Sluggable;

    protected $fillable = [
        'title',
        'description',
        'thumb_image',
        'thumb_image_alt_text',
        'image',
        'image_alt_text',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'posted_date',
        'status',
    ];
    
    protected $fileDirectory = 'blog';

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

    public function getThumbImageValueAttribute()
    {
        if ($this->thumb_image && Storage::disk('public')->exists($this->thumb_image))
            return Storage::url($this->thumb_image);
        else
            return asset(AdminHelper::getValueByKey('default_image'));
    }

    public function getImageValueAttribute()
    {
        if ($this->image && Storage::disk('public')->exists($this->image))
            return Storage::url($this->image);
        else
            return asset(AdminHelper::getValueByKey('default_image'));
    }

    public function getPostedDateValueAttribute()
    {
        return Carbon::parse($this->posted_date)->format('d F, Y');
    }
}
