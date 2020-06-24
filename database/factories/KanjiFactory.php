<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kanji;
use Faker\Generator as Faker;

$factory->define(Kanji::class, function (Faker $faker) {
    return [
        //
        'kanji' => mb_substr($faker->name, 0, 1),
        'onyomi' => $faker->country,
        'konyomi' => $faker->city,
        'example' => $faker->company.$faker->address
    ];
});
