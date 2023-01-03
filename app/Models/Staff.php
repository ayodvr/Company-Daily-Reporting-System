<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = ['fullname', 'phone','email','user_id','store','unit','daily_target','weekly_target','monthly_target'];

    public function users(){

        return $this->belongsTo(User::class,'user_id');
    }
}
