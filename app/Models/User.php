<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'store',
        'unit',
        'verified',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static $ignoreChangedAttributes = ['password', 'updated_at'];

    protected static $logAttributes = ['name', 'email'];

    protected static $recordEvents = ['created'];

    // protected static $logOnlyDirty = true;

    protected static $logName = 'user';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "A new user has been {$eventName}";
    }

    public function stores(){

       return $this->belongsTo('App\Models\Store');
    }

    public function staffs(){

        return $this->hasMany('App\Models\Staff','user_id');
     }

     public function customers(){

        return $this->hasMany('App\Models\Customer','user_id');
     }
}
