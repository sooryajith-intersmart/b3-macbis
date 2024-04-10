<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MetaTag extends Model
{
    use HasFactory;

    public function getPageValueAttribute()
    {
        return str_replace('_', ' ', Str::title($this->page));
    }
}
