<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Subscription;
use Faker\Generator as Faker;

$factory->define(Subscription::class, function (Faker $faker) {
    $date = \Carbon\Carbon::now();
    return [
        'company' =>$faker->word,
        'frequency'=> 'yearly',
        'subscription_date' => $date,
        'cost' => $faker->randomFloat(2,20,200),
        'user_id' => function(){
            return factory('App\User')->create()->id;
        }

    ];
});
