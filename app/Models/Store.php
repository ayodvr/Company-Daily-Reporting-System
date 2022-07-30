<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['store_name', 'store_code'];

    public function users(){

        return $this->hasMany('App/Models/User');
     }

     public function stores(){

        return $this->belongsTo('App/Models/Retail');
     }
}
