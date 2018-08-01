<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'name' => 'Alejandro Cayssials',
            'email' => 'alejandro.cayssials@gmail.com',
            'password' => bcrypt('secret'),
            'admin' => true
        ]);
    }
}
