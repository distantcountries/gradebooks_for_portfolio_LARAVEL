<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->text(255),
        'user_id' => $faker->numberBetween(1, 50),
        'gradebook_id' => $faker->numberBetween(1, 30)
    ];
});
