<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $menu = [
        [
          'name' => 'Nasi Goreng',
          'price' => 10000
        ],
        [
          'name' => 'Lele Goreng',
          'price' => 9000
        ],
        [
          'name' => 'Ayam Krispy',
          'price' => 10000
        ],
        [
          'name' => 'Pecel',
          'price' => 8000
        ]
      ];

      Menu::insert($menu);
    }
}
