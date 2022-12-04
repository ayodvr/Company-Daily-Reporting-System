<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_name',
        'account_phone',
        'account_email',
        'account_address',
        'account_birthday',
        'account_type',
        'date',
        'product_detail',
        'status',
        'product',
        'price',
        'unit',
        'amount',
        'user_id',
        'store_serial',
        'sold_by',
        'store_code'
    ];

}
