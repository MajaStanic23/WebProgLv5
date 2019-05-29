<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@radovi.local',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Nastavnik',
            'email' => 'nastavnik@radovi.local',
            'password' => bcrypt('password'),
            'role' => 'nastavnik'
        ]);

        DB::table('users')->insert([
            'name' => 'Student',
            'email' => 'student@radovi.local',
            'password' => bcrypt('password'),
            'role' => 'student'
        ]);
    }
}
