<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Subscription;
use Faker\Generator as Faker;

$factory->define(Subscription::class, function (Faker $faker) {
    $date = \Carbon\Carbon::now();
    return [
        'company' =>$faker->word,
        'frequency_id'=> function(){
            return factory('App\Frequency')->create()->id;
        },
        'subscription_date' => $date,
        'user_id' => function(){
            return factory('App\User')->create()->id;
        }

    ];
});
