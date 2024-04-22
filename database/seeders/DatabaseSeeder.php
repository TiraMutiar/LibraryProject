<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $dataSimpan = [
            'name'          => 'tira mutiar',
            'email'         => 'tiramutiar@gmail.com',
            'role'          => 'pengelola',
            'jenis_kelamin' => 'perempuan',
            'pictures'      => 'default.jpg',
            'password'      => Hash::make('123123')
        ];
        User::create($dataSimpan);
    }
}
