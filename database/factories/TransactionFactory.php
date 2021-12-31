<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;

// $autoIncrement = autoIncrement();

$factory->define(Transaction::class, function (Faker $faker) use ($autoIncrement) {
    return [
        'id_user' => $this->faker->randomElement([1, 2]),
        'id_schedule' => $autoIncrement->current(),
        'income' => $this->faker->randomElement(['2500000', '3000000']),
    ];
});

// function autoIncrement()
// {
//     for ($i = 1; $i < 1000; $i++) {
//         yield $i;
//     }
// }
