<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    // protected $table = 'students';
    protected $table = 'openfund_students';

    protected $fillable = [
        'qalam_id',
        'student_name',
        'father_name',
        'institutions',
        'discipline',
        'contact_no',
        'home_address',
        'scholarship_name',
        'nust_trust_fund_donor_name',
        'province',
        'domicile',
        'gender',
        'program',
        'degree',
        'year_of_admission',
        'father_status',
        'father_profession',
        'monthly_income',
        'statement_of_purpose',
        'remarks',
        'images'

    ];
    // protected $fillable = [
    //     'name',
    //     'father_name',
    //     'institution',
    //     'discipline',
    //     'scholarship_name',
    //     'donor_name',
    //     'province',
    //     'city',
    //     'gender',
    //     'program',
    //     'degree',
    //     'year_of_admission',
    //     'father_status',
    //     'father_profession',
    //     'monthly_income',
    //     'statement_of_purpose',
    //     'images',
    //     'make_pledge',
    //     'payment_approved'

    // ];
}
