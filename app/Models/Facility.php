<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Facility extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'item_details',
        'availability',
        'condition',
        'status',
        'comments',
        'user_id',
        'store_id',
        'today_Date',
        'store_serial'
    ];

    // protected static $ignoreChangedAttributes = ['password', 'updated_at'];

    protected static $logAttributes = ['created_at', 'updated_at'];

    protected static $recordEvents = ['created', 'updated'];

    // protected static $logOnlyDirty = true;

    protected static $logName = 'facility report';

    public function getDescriptionForEvent(string $eventName): string
    {
        $user = auth()->user()->name;

        if($eventName == 'created'){

            return "{$user} created a new facility report";
        }else{

            return "{$user} has {$eventName} a new facility report";
        }
    }
}
