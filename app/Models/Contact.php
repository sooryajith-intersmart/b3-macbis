<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'registered_address',
        'registered_address_map_link',
        'head_office_address',
        'head_office_address_map_link',
        'phone',
        'email',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'linkedin_link',
        'pinterest_link',
        'youtube_link',
        'map_link',
    ];
}