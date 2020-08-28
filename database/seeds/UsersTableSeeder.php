<?php

use App\User;
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
        User::create([
            'name' => 'ziad',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'status' => true
        ]);
    }
}
