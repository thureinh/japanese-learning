<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\KanjiWord;

$factory->define(KanjiWord::class, function (Faker $faker) {
    return [
       'word' => $faker->name,
       'yomikata' => $faker->name,
       'meaning' => $faker->word 
    ];
});
