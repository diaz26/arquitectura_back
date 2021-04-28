<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create( [
            'name' => 'Jeff Diaz',
            'email' => 'jeff@gmail.com',
            'password' => \Hash::make('12345')
        ]);
    }
}
