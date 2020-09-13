<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => "admin",
            'display_name' => 'Admin',
            'description' => 'This is Admin of This is App'
        ]);
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => 'admin@gmail.com',
            'password' => bcrypt('pass'),
            'email_verified_at'=>now(),
            'status' => 1
        ]);
        DB::table('role_user')->insert([
            'user_id' =>1,
            'role_id' =>1
        ]);
    }
}