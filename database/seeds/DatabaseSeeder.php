<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // DB::table('users')->insert([

        //     'name' => 'nguyen',
        //     'email'=> 'nguyen710@gmail.com',
        //     'password'=>bcrypt('123'),
        //     'level'=> 1
        // ]);
        
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
