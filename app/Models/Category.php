<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Table Name
    protected $table = 'categories';
    //Primary Key
     public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

   public function products(){

       return $this->hasMany('App\Models\Product','cat_id');
   }
}
