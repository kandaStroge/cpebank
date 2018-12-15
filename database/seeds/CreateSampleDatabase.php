<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateSampleDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = DB::table('user')->insertGetId([
            'id' => null,
            'email' => str_random(10) . '@gmail.com',
            'fname' => 'NameTester',
            'lname' => 'adminLastName',
            'password' => bcrypt('admintest'),
            'dob' => date_create(),
            'phone' => '0899999999',
            'home_addr' => '123456456',
            'work_addr' => 'rrrr',
            'gender' => 1
        ]);
        DB::table('officer')->insert([
            'type' => 1,
            'user_id' => $id
        ]);

        $id = DB::table('user')->insertGetId([
            'id' => null,
            'email' => str_random(10) . '@gmail.com',
            'fname' => 'CustomerTest1',
            'lname' => 'CustomerTestLname',
            'password' => bcrypt('test'),
            'dob' => date_create(),
            'phone' => '0899998999',
            'home_addr' => '123456456',
            'work_addr' => '',
            'gender' => 2
        ]);
        DB::table('customer')->insert([
            'user_id' => $id
        ]);
    }
}
