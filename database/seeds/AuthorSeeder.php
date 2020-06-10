<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 10; $i++ ) { 
    	    DB::table('authors')->insert([
                'name' => Str::random(10),
                'surname' => Str::random(10),
            ]);
    	}
    }
}
