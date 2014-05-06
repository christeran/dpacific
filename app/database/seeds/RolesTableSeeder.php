<?php
 
class RolesTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('roles')->delete();
 
        Role::create(array(
            'name' => 'user'
        ));
 
        Role::create(array(
            'name' => 'pacific'
        ));
    }
 
}
