<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonalInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'bio',
        'profile_picture_url',
        'mobile_number',
    ];
}
