<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'customer_phone','customer_email','sales_unit','customer_address','user_id','customer_birthday'];

    public function users(){

        return $this->belongsTo(Customer::class,'id');
    }
}
