<?php
 
class UserRolesTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users_roles')->delete();
 
        UserRole::create(array(
            'user_id' => 1,
            'role_id' => 1
        ));
 
        UserRole::create(array(
            'user_id' => 2,
            'role_id' => 2
        ));
    }
 
}
