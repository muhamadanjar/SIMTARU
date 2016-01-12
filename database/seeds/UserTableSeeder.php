<?php

class UserTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('Users')->delete();
    
    User::create(array(
    	'namalengkap'     => 'Muhamad Anjar',
        'username' => 'admin',
        'email'    => 'arvanria@gmail.com',
        'password' => Hash::make('admin'),
    ));
  }
}