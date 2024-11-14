<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultPackageFullDegree extends Model
{
    use HasFactory;
    protected $table = 'default_package_full_degree';

    protected $fillable = [
        'program_type',
        'degree',
        'seats',
        'totalAmount',
        'donor_name',
        'donor_email',
        'phone',
        'about_partner',
        'philanthropist_text',
        'country',
        'year',
        'payments_status',
        'prove',
    ];
}
