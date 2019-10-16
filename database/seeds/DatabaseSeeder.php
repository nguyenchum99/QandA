<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([

            'name' => 'nguyen',
            'email'=> 'nguyen@gmail.com',
            'password'=>bcrypt('111'),
            'level'=> 1
        ]);

        DB::table('users')->insert([

            'name' => 'hoang',
            'email'=> 'hoang@gmail.com',
            'password'=>bcrypt('123'),
            'level'=> 1
        ]);
        DB::table('users')->insert([

            'name' => 'quynh',
            'email'=> 'quynh@gmail.com',
            'password'=>bcrypt('123'),
            'level'=> 1
        ]);
        DB::table('users')->insert([

            'name' => 'nhat',
            'email'=> 'nhat@gmail.com',
            'password'=>bcrypt('123'),
            'level'=> 1
        ]);
    }
}
