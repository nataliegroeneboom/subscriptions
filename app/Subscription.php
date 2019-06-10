<?php

namespace App;

use \Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = [];

    public function frequency(){
        return $this->belongsTo(Frequency::class);
    }

    public function nextPayment(){
        if($this->frequency->name == 'monthly'){
        return Carbon::parse($this->subscription_date)->addMonth();
        }else{
        return Carbon::parse($this->subscription_date)->addYear();
        }
        
    }
}
