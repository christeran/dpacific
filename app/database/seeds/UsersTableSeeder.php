<?php
 
class UsersTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->delete();
 
        User::create(array(
            'username' => 'christian',
            'password' => Hash::make('christian')
        ));
 
        User::create(array(
            'username' => 'dpacific',
            'password' => Hash::make('dpacific')
        ));
    }
 
}
