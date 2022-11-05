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
        DB::table('users')->insert([
            'id'=>'6ecb5269-51e1-4bd9-a9e7-9ec31dcbd3e',
            'name'=>'User 1',
            'email'=>'user1@demo.com',
            'password'=>bcrypt('user1'),

            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('users')->insert([
            'id'=>'94da3bca-1e2a-443e-9320-d2c0d72122fe',
            'name'=>'User 2',
            'email'=>'user2@demo.com',
            'password'=>bcrypt('user2'),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('users')->insert([
            'id'=>'9d34ffce-e15b-4420-a219-e9eec2b05b27',
            'name'=>'User 3',
            'email'=>'user3@demo.com',
            'password'=>bcrypt('user3'),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
