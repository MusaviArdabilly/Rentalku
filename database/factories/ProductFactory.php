<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

// $autoIncrement = autoIncrement();

$factory->define(Product::class, function (Faker $faker) use ($autoIncrement) {
    return [
        'id_user' => $this->faker->randomElement([1, 2]),
        'id_vehicle' => $autoIncement->current(),
        'title' => $this->faker->randomElement(['2500000', '3000000']),
        'description' => $this->faker->randomElement(['Di sewakan mobil rubicon warna hitam, plat genap, bensin', 'Di sewakan mobil fortuner warna putih, plat ganjil, solar']),
        'location' => $this->faker->randomElement(['Surabaya', 'Malang']),
        'price' => $this->faker->randomElement(['1500000', '2500000', '3000000']),
    ];
});

// function autoIncrement()
// {
//     for ($i = 1; $i < 1000; $i++) {
//         yield $i;
//     }
// }