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
            'name' => 'admin',
            'password' => Hash::make('asdf1234'),
            'email' => 'admin@localhost',
            'salt' => str_random(8)
        ]);
    }
}
