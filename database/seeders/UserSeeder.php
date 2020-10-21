<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    /////////////////////
    // DATABASE SEEDER //
    /////////////////////

    /*
     * TO CREATE THE SEEDER
     * php artisan make:seeder UserSeeder
     *
     * TO EXECUTE SEEDER
     * php artisan db:seed ~ acquired to define in the DatabaseSeeder
     * php artisan db:seed --class=UserSeeder
     *
     * MIGRATE FRESH WITH SEEDING
     * php artisan migrate:fresh --seed
     *
     * FORCE SEEDING TO PRODUCTION
     * php artisan db:seed --force
     */

    public function run()
    {
      $data = [
      [
        'name' => 'Engku Nazri',
        'email' => 'engkunazri98@gmail.com',
        'password' => Hash::make('123'),
      ],
      [
        'name' => 'Engku Nazmi',
        'email' => 'nazmi@gmail.com',
        'password' => Hash::make('123'),
      ],
      [
        'name' => 'Engku Nurhanis',
        'email' => 'hanis@gmail.com',
        'password' => Hash::make('123'),
      ],
      [
        'name' => 'Engku Aatif',
        'email' => 'aatif@gmail.com',
        'password' => Hash::make('123'),
      ]
      ];

      DB::table('users')->insert($data);
    }
}
