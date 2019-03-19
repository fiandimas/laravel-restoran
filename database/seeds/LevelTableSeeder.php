<?php

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $level = [
        [
          'name' => 'Admin'
        ],
        [
          'name' => 'Kasir'
        ]
      ];

      Level::insert($level);
    }
}
