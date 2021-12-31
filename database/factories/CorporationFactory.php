<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Corporation;
use Faker\Generator as Faker;

$autoIncrement = autoIncrement();

$factory->define(Corporation::class, function (Faker $faker) use ($autoIncrement) {
    return [
        'id_user' => $this->faker->randomElement([1, 2]),
        'name' => $this->faker->userName,
        'address' => $this->faker->address,
        'cover' => 'default_ava.png',
        'description' => 'deskripsi',
        'whatsapp' => $this->faker->phoneNumber,
        'verify' => $this->faker->randomElement([null, 'yes']),
        'status' => $this->faker->randomElement(['open', 'close', 'temporary_ban', 'ban']),
    ];
});

function autoIncrement()
{
    for ($i = 1; $i < 1000; $i++) {
        yield $i;
    }
}