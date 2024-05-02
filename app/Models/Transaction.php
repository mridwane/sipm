<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    protected $table = 'transactions';
    use HasFactory;

    protected $fillable = [
        'car_id',
        'date_start',
        'date_end',
        'total',
        'user_id',
    ];
}
