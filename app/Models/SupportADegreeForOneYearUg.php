<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportADegreeForOneYearUg extends Model
{
    use HasFactory;
    protected $table = 'support_a_degree_for_one_year_ug';

    protected $fillable = [
        'program',
        'degree',
        'fee',
    ];
}
