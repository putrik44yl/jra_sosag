<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'role'     => 'admin',
            'password' => Hash::make('123456'),
        ]);

        User::create([
            'name'     => 'anggota',
            'email'    => 'anggota@gmail.com',
            'role'     => 'anggota',
            'password' => Hash::make('123456'),
        ]);
    }
}