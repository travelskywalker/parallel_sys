<?php

use Illuminate\Database\Seeder;

class AccessesTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accesrights = ['admin','schooladmin','teacher','student'];

    	for($x = 0; $x==count($accesrights)-1;$x++){
	        DB::table('users')->insert([
	            'name' => $accesrights[$x];
	        ]);
	     }
    }
}
