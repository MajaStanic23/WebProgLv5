<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$nastavnik = DB::table('users')->where('role', 'nastavnik')->first();
    	$nastavnik_id = $nastavnik->id;

    	for ($i = 1; $i <= 10; $i++) {
    		DB::table('tasks')->insert([
    		    'nastavnik_id' => $nastavnik_id,
    		    'naziv_rada' => "Rad $i",
    		    'naziv_rada_na_engleskom' => "English title $i",
    		    'zadatak_rada' => str_random($length = 16)
    		]);
    	}
        
    }
}
