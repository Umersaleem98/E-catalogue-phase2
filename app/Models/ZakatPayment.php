<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZakatPayment extends Model
{
    use HasFactory;
    protected $table = 'zakat_payments';

    protected $fillable = [
        'payment_type',
        'donor_name',
        'donor_email',
        'phone',
        'duration',
        'amount',
    ];
}
