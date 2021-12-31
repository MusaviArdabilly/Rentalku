<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     UserSeeder::class,
        //     VehicleSeeder::class,
        //     ScheduleSeeder::class,
        //     TransactionSeeder::class,
        //     TaxSeeder::class,
        //     MaintenanceSeeder::class,
        //     CorporationSeeder::class,
        //     ProductSeeder::class,
        //     IndoRegionSeeder::class,
        // ]);

        // $this->call(UserSeeder::class);
        // $this->call(VehicleSeeder::class);
        // $this->call(ScheduleSeeder::class);
        // $this->call(TransactionSeeder::class);
        // $this->call(TaxSeeder::class);
        // $this->call(MaintenanceSeeder::class);
        // $this->call(CorporationSeeder::class);
        // $this->call(ProductSeeder::class);
        $this->call(IndoRegionSeeder::class);
    }
}
