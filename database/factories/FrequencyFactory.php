<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Frequency;
use Faker\Generator as Faker;

$factory->define(Frequency::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
