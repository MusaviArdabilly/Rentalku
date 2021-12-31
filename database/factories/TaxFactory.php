<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tax;
use Faker\Generator as Faker;

// $autoIncrement = autoIncrement();

$factory->define(Tax::class, function (Faker $faker) use ($autoIncrement) {
    return [
        'id_user' => $this->faker->randomElement([1, 2]),
        'id_vehicle' => $autoIncrement->current(),
        'cost' => $this->faker->randomElement(['2500000', '3000000']),
    ];
});

// function autoIncrement()
// {
//     for ($i = 1; $i < 1000; $i++) {
//         yield $i;
//     }
// }