<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\VocabDetail;

$factory->define(VocabDetail::class, function (Faker $faker) {
    return [
        //
        'word' => $faker->name,
        'meaning' => $faker->word,
        'created_at' => now()
    ];
});
