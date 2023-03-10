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
        // \App\Models\User::factory(10)->create();
        $this->call(SettingSeeder::class);
        $this->call(Tree1Seeder::class);
        $this->call(Tree2Seeder::class);
        $this->call(Tree3Seeder::class);
        $this->call(Tree4Seeder::class);
        $this->call(AdminSeed::class);
        $this->call(TypeProcess::class);
    }
}