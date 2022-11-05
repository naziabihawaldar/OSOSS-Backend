<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'id'=>'0da2ac50-9e5a-4b56-8185-8a99549b2519',
            'name'=>'ABC Company',
            'address'=>'ABC Company',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('companies')->insert([
            'id'=>'67b77779-1c2b-45ae-b759-448087322b2d',
            'name'=>'XYZ Company',
            'address'=>'XYZ Company',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
