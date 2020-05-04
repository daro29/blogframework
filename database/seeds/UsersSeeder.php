<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 29)->create();

        User::create([
            'name'  => 'darinel',
            'email' =>  'darinelcigarroa97@gmail.com',
            'password'  =>  bcrypt('123123'),
        ]);
    }
}
