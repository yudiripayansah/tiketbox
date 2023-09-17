<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $data = [
      [
        'username' => 'admin',
        'email' => 'admin@tiketbox.com',
        'name' => 'Admin',
        'password' => Hash::make('adminTiketbox'),
        'phone' => '08123456789',
        'address' => 'Address',
        'gender' => 'Laki-Laki',
        'dob' => '1990-01-01',
        'domicile' => 'Jakarta',
        'status' => 'active',
        'type' => 'admin',
      ],
      [
        'username' => 'promotor',
        'email' => 'promotor@tiketbox.com',
        'name' => 'Promotor',
        'password' => Hash::make('promotorTiketbox'),
        'phone' => '08123456789',
        'address' => 'Address',
        'gender' => 'Laki-Laki',
        'dob' => '1990-01-01',
        'domicile' => 'Jakarta',
        'status' => 'active',
        'type' => 'promotor',
      ],
      [
        'username' => 'user',
        'email' => 'user@tiketbox.com',
        'name' => 'User',
        'password' => Hash::make('userTiketbox'),
        'phone' => '08123456789',
        'address' => 'Address',
        'gender' => 'Laki-Laki',
        'dob' => '1990-01-01',
        'domicile' => 'Jakarta',
        'status' => 'active',
        'type' => 'user',
      ],
      [
        'username' => 'scanner',
        'email' => 'scanner@tiketbox.com',
        'name' => 'Scanner',
        'password' => Hash::make('scannerTiketbox'),
        'phone' => '08123456789',
        'address' => 'Address',
        'gender' => 'Laki-Laki',
        'dob' => '1990-01-01',
        'domicile' => 'Jakarta',
        'status' => 'active',
        'type' => 'scanner',
      ]  
    ];
    foreach($data as $data) {
      User::create($data);
    }
  }
}
