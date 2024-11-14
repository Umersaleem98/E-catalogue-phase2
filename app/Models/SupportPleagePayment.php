<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportPleagePayment extends Model
{
    use HasFactory;
    protected $table = 'support_pleage_payment';

    protected $fillable = [
        'student_name',
        'donor_name',
        'donor_email',
        'phone',
        'donation_percent',
        'donation_for',
        'pledge_approved',
    ];

}
