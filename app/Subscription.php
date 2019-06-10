<?php

namespace App;

use \Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = [];

    public static function boot()
    {
        parent::boot(); 
     
        
        static::saving(function($subscription){
            $subscription->user_id = $subscription->user_id ?:auth()->id(); 
        });
    }

    public function nextPayment(){
        if($this->frequency == 'monthly'){
        return Carbon::parse($this->subscription_date)->addMonth();
        }else{
        return Carbon::parse($this->subscription_date)->addYear();
        }
        
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
