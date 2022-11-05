<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => '6ecb5269-51e1-4bd9-a9e7-9ec31dcbd3e',
            'user_type' => 'App\Models\User',
        ]);
        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => '94da3bca-1e2a-443e-9320-d2c0d72122fe',
            'user_type' => 'App\Models\User',

        ]);
        DB::table('role_user')->insert([
            'role_id' => 3,
            'user_id' => '9d34ffce-e15b-4420-a219-e9eec2b05b27',
            'user_type' => 'App\Models\User',
        ]);
    }
}
