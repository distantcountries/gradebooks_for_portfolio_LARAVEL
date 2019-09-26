<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Gradebook;
use Faker\Generator as Faker;

$factory->define(Gradebook::class, function (Faker $faker) {
    return [
        'name' => $faker->text(30),
        'user_id' => $faker->numberBetween(1, 30)
    ];
});
