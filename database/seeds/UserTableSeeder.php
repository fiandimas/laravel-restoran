<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = [
        [
          'name' => 'Scarlet',
          'username' => 'scarlet',
          'password' => Hash::make('scarlet'),
          'id_level' => 1
        ],
        [
          'name' => 'Alfian',
          'username' => 'alfian',
          'password' => Hash::make('alfian'),
          'id_level' => 2
        ]
      ];

      User::insert($user);
    }
}
