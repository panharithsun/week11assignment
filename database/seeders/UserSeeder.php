<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => 'admin',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$OvTTSx1eSa3Z07djrzmave0pZvUM4lxpRIyhOHPpj5doNkxm92jSa',
        ]);
    }
}
