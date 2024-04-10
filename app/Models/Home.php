<?php

namespace App\Models;

use App\Helpers\AdminHelper;
use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Home extends Model
{
    use HasFactory, FileTrait;

    protected $fillable = [
        'section_one_title',
        'section_two_title',
        'section_two_title_two',
        'section_three_title',
        'section_three_description',
        'section_four_subtitle',
        'section_four_title',
        'section_five_title',
    ];
    
    protected $fileDirectory = 'home';

    public function fileDirectory()
    {
        return $this->fileDirectory;
    }

    public function getSectionThreeImageValueAttribute()
    {
        if ($this->section_three_image && Storage::disk('public')->exists($this->section_three_image))
            return Storage::url($this->section_three_image);
        else if ($this->section_three_image && file_exists($this->section_three_image))
            return asset($this->section_three_image);
        else
            return asset(AdminHelper::getValueByKey('default_image'));

    }
}