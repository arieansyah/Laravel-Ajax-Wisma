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
        $this->call(Wisma1::class);
        $this->call(Wisma2::class);
        $this->call(Wisma3::class);
        $this->call(Wisma4::class);
        $this->call(UsersTableSeeder::class);
    }
}


class Wisma1 extends Seeder
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
              'nomor_kamar' => $i,
              'wisma' => 1,
              'status' => 1,
          ]);
      }
    }

}

class Wisma2 extends Seeder
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
              'nomor_kamar' => $i,
              'wisma' => 2,
              'status' => 1,
          ]);
      }
    }

}

class Wisma3 extends Seeder
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
              'nomor_kamar' => $i,
              'wisma' => 3,
              'status' => 1,
          ]);
      }
    }

}

class Wisma4 extends Seeder
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
              'nomor_kamar' => $i,
              'wisma' => 4,
              'status' => 1,
          ]);
      }
    }

}
