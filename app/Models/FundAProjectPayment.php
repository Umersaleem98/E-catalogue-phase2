<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundAProjectPayment extends Model
{
    use HasFactory;
    protected $table = 'fund_a_project_payment';

    protected $fillable = [
        'project_name',
        'donor_name',
        'donor_email',
        'phone',
        'amount_for',
        'amount',
    ];
}
