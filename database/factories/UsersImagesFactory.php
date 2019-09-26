<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\UserImage;
use Faker\Generator as Faker;

$factory->define(UserImage::class, function (Faker $faker) {
    return [
        'image' => $faker->imageUrl(),
        'user_id' => $faker->numberBetween(1, 30)
    ];
});
