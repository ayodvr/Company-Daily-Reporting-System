<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegister extends Model
{
    use HasFactory;

    Protected $fillable = [
        'firstname',
        'lastname',
        'matric_no',
        'image',
        'id_card'
    ];


}
