<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
    	'profile_pic' => 'assets/img/gakusei.jpg',
        'firstname' => mb_substr($faker->name, 0, 2),
        'lastname' => mb_substr($faker->name, 0, 2),
        'email' => $faker->unique()->safeEmail,
        'dateofbirth' => $faker->dateTimeBetween($startDate = '-50 years', $endDate = 'now', $timezone = 'Asia/Yangon'),
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'batch_no' => $faker->numberBetween($min = 1, $max = 100),
        'roll_no' => $faker->numberBetween($min = 1, $max = 100),
        'email_verified_at' => now(),
        'password' => '$2y$10$nG66aRptZI8cdVAsN/BK5e4ZknbQVBwm4V7dPDpqIrGTT5nUMjfxy', // password
        'remember_token' => Str::random(10),
    ];
});
