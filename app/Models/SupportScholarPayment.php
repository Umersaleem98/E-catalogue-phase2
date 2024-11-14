<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportScholarPayment extends Model
{
    use HasFactory;
    protected $table = 'support_scholar_payment';

    protected $fillable = [
        'student_name',
        'donor_name',
        'donor_email',
        'duration',
        'amount',
        'prove',
        'payment_approved',
    ];
}
