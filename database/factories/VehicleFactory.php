<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(Vehicle::class, function (Faker $faker) use ($autoIncrement) {
        return [
            'id_user' => $this->faker->randomElement([1, 2]),
            'vehicle' => $this->faker->randomElement(['car', 'bike']),
            'license_plate' => $this->faker->randomElement(['S 1234 DD', 'F 4443 G', 'M 7756 QQ']),
            'brand' => $this->faker->randomElement(['toyota', 'daihatsu', 'jeep']),
            'type' => $this->faker->randomElement(['rubicon', 'fortuner']),
            'color' => $this->faker->randomElement(['red', 'black', 'silver', 'white']),
            'transmision' => $this->faker->randomElement(['automatic', 'manual']),
            'chair_amount' => $this->faker->randomElement(['2', '4', '8']),
            'fuel_type' => $this->faker->randomElement(['bensin', 'solar']),
            'price' => $this->faker->randomElement(['250000', '300000', '350000']),
            'tax_payment_date' => $this->faker->dateTimeBetween($startDate = '+3 years', $endDate = '+5 years', $timezone = 'GMT'),
            'license_plate_type' => $this->faker->randomElement(['ganjil', 'genap']),
            'license_plate_expiration_date' => $this->faker->dateTimeBetween($startDate = '+3 years', $endDate = '+5 years', $timezone = 'GMT'),
        ];
    }
}
