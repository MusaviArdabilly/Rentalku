<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Schedule;
use Faker\Generator as Faker;

// $autoIncrement = autoIncrement();

$factory->define(Schedule::class, function (Faker $faker) use ($autoIncrement) {
    return [
        'id_user' => $this->faker->randomElement([1, 2]),
        'id_vehicle' => $autoIncrement->current(),
        'time_start' => $this->faker->dateTime($max = 'now', $timezone = null),
        'time_finish' => $this->faker->dateTimeInInterval($startDate = 'now', $interval = '+ 3 days', $timezone = null),
    ];
});

// function autoIncrement()
// {
//     for ($i = 1; $i < 1000; $i++) {
//         yield $i;
//     }
// }