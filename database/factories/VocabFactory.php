<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Vocab;

$factory->define(Vocab::class, function (Faker $faker) {
    return [
       	'topic' => $faker->name,
       	'created_at' => now()
    ];
});
