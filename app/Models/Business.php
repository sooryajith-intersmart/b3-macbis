<?php

namespace App\Models;

use App\Helpers\AdminHelper;
use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Business extends Model
{
    use HasFactory, FileTrait, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'image',
        'image_alt_text',
        'logo',
        'logo_alt_text',
        'link',
        'sort_order',
        'status',
    ];
    
    protected $fileDirectory = 'business';

    public function fileDirectory()
    {
        return $this->fileDirectory;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getImageValueAttribute()
    {
        if ($this->image && Storage::disk('public')->exists($this->image))
            return Storage::url($this->image);
        else
            return asset(AdminHelper::getValueByKey('default_image'));
    }

    public function getLogoValueAttribute()
    {
        if ($this->logo && Storage::disk('public')->exists($this->logo))
            return Storage::url($this->logo);
        else
            return asset(AdminHelper::getValueByKey('default_image'));
    }
}
