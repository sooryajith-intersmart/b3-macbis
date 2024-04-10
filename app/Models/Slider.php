<?php

namespace App\Models;

use App\Helpers\AdminHelper;
use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    use HasFactory, FileTrait, SoftDeletes;
    
    protected $fillable = [
        'title',
        'image',
        'link',
        'sort_order',
        'status',
    ];
    
    protected $fileDirectory = 'slider';

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
}
