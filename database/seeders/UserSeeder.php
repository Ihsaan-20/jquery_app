<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            User::create([
                'name' => 'Dummy User ' . $i,
                'email' => 'dummyemail' . $i . '@gmail.com',
                'password' => Hash::make('1234'), 
                'profile' => 'https://dummyimage.com/200x200/000/fff',
            ]);
        }
    }
}
