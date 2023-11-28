<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class SuperUserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Super User',
            'email' => 'superuser@example.com',
            'password' => Hash::make('passwordkuat'),
        ]);

        // Optional: Assign role
        // $user->assignRole('superuser');
    }
}
