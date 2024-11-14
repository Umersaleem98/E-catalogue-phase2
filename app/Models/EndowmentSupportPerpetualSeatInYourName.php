<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndowmentSupportPerpetualSeatInYourName extends Model
{
    use HasFactory;
    protected $table = 'endowment_support_perpetual_seat_in_your_name';

    protected $fillable = [
        'program',
        'degree',
        'seats',
        'degree_name',
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
