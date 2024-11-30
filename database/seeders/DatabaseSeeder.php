<?php

namespace Database\Seeders;

use RolesAndPermissionsSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // public function run()
    // {
        // \App\Models\User::factory(10)->create();
    // }

    public function run()
{
    $this->call(RolesAndPermissionsSeeder::class);
}

}
