<?php

namespace App\Models;

use App\Helpers\AdminHelper;
use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class About extends Model
{
    use HasFactory, FileTrait;

    protected $fillable = [
        'title',
        'description',
        'image'
    ];

    protected $fileDirectory = 'about';

    public function fileDirectory()
    {
        return $this->fileDirectory;
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
