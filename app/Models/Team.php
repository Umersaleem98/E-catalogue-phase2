<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'teams';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'name',
        'email',
        'designation',
        'gender',
        'image',
        'phone',
        'department',
        'status',
        'social_media',
        'introduction',
    ];
}
