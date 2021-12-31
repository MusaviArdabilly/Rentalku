<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Maintenance;
use Faker\Generator as Faker;

// $autoIncrement = autoIncrement();

$factory->define(Maintenance::class, function (Faker $faker) use ($autoIncrement) {
    return [
        'id_user' => $this->faker->randomElement([1, 2]),
        'id_vehicle' =>  $autoIncrement->current(),
        'maintenance' => $this->faker->randomElement(['ganti oli', 'cat ulang', 'ganti ban']),
        'cost' => $this->faker->randomElement(['500000', '300000']),
    ];
});

// function autoIncrement()
// {
//     for ($i = 1; $i < 1000; $i++) {
//         yield $i;
//     }
// }
