<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MoreUserSeeder extends Seeder
{
    public function run(): void
    {
        $userRole = Role::where('name', 'user')->first();

        $names = [
            'John Doe',
            'Jane Smith',
            'Militsa Mia',
            'Cressida Ryousuke',
            'Halkyone Julia',
            'Rahel Sissinnguaq',
            'Megan Aeschylus',
            'Nelli Wiljahelmaz',
            'Julija Vidya',
            'Kasper Bos',
            'Shalev Bjartr',
            'Jaakob Olamide',
            'Henny Loek',
            'Francisca Jansen',
            'Norbert Judocus',
            'Harm de Boer',
            'Danny de Leeuw',
            'Pepijn Tjeerd',
            'Liselotte Kapper',
            'Maximiliaan Everts',
            'Emma White',
            'Mia Walker',
            'Ava Young',
            'Sophia Anderson',
            'Ryan Lewis',
        ];

        foreach ($names as $name) {
            $email = Str::of($name)->lower()->replace(' ', '')->append('@example.com');

            $password = Str::password(12);

            User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => $password,
                    'role_id' => $userRole->id,
                ]
            );
        }
    }
}
