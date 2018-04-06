<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=1; $i < 31; $i++) {
	    	DB::table('wismas')->insert([
	            'nama_wisma' => $i,
              'status' => 1,
	        ]);
    	}
        // $this->call(UsersTableSeeder::class);
    }
}
