<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Retail extends Model
{
    use HasFactory, LogsActivity;

    Protected $fillable = [
        'name',
        'phone',      
        'email',      
        'dob',        
        'invoice',    
        'product',    
        'unit', 
        'price',      
        'store',      
        'customer',   
        'address',    
        'payment',    
        'confirm',    
        'amount',     
        'visited',    
        'found',      
        'cash_hand',  
        'cash_bank',  
        'bank_paid',  
        'payslips',   
        // 'pro_details',
        'serial_no',
        // 'qty_sold',  
        'sys_qty',    
        'phy_qty',    
        'inv_paid',
        'user_id',
        'store_Serial',
        'sold_by',
        'store_code',
        'today_date'
    ];


    // protected static $ignoreChangedAttributes = ['password', 'updated_at'];

    protected static $logAttributes = ['created_at', 'updated_at'];

    protected static $recordEvents = ['created', 'updated'];

    // protected static $logOnlyDirty = true;

    protected static $logName = 'report';

    public function getDescriptionForEvent(string $eventName): string
    {        
        $user = auth()->user()->name;

        if($eventName == 'created'){

            return "{$user} recorded a sale";
        }else{

            return "{$user} has {$eventName} a sale";
        }
    }

    public function retails(){

        return $this->hasMany('App/Models/Store');
     }

}
