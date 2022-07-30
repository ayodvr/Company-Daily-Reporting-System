<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_details', 
        'availability',
        'condition',
        'comments', 
        'user_id',
        'store_id',
        'today_Date',
        'store_serial'
    ];
}
