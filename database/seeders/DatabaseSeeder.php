<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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

        User::create([
            'name' => 'Abi Noval Fauzi',
            'username' => 'anf612',
            'email' => 'novalabi612@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt("anf12345678"),
            'avatar' => 'https://source.unsplash.com/random/' . mt_rand(1000,9999),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Eko Setyono Wibowo',
            'username' => 'esw123',
            'email' => 'bowo1120@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt("esw12345678"),
            'avatar' => 'https://source.unsplash.com/random/' . mt_rand(1000,9999),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Mada Dwi Saputra',
            'username' => 'mds123',
            'email' => 'madadwisaputra203@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt("mds12345678"),
            'avatar' => 'https://source.unsplash.com/random/' . mt_rand(1000,9999),
            'remember_token' => Str::random(10),
        ]);
    }
}
