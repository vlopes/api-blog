<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Vinicius',
                'email' => 'teste1@teste.com',
                'password' => bcrypt('secret'),
                'remember_token' => '123',
                'premium' => true,
                'featured' => false,
            ],
            [
                'name' => 'Ricardo',
                'email' => 'teste2@teste.com',
                'password' => bcrypt('secret'),
                'remember_token' => '465',
                'premium' => false,
                'featured' => false,
            ],
            [
                'name' => 'Bruna',
                'email' => 'teste3@teste.com',
                'password' => bcrypt('secret'),
                'remember_token' => '789',
                'premium' => false,
                'featured' => true,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
