<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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

        User::create([
            'username' => 'myadminsibiara',
            'level' => 'admin',
            'password' => bcrypt('23117027'),
        ]);
        User::create([
            'username' => 'semry',
            'level' => 'admin',
            'password' => bcrypt('23117027'),
        ]);
    }
}
