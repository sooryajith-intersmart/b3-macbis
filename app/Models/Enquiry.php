<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enquiry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message'
    ];

    protected static function booted()
    {
        static::saving(function ($data) {
            $data->name     = preg_replace('/\s+/', ' ', ucwords(strtolower($data->name)));
            $data->phone    = preg_replace('/\s+/', ' ', $data->phone);
        });
    }
}
