<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    private $users = [
        [
            'role_id'    => 1,
            'first_name' => 'Serban',
            'last_name'  => 'Blebea',
            'email'      => 'mihaiserban.blebea@gmail.com',
            'password'   => 'intrex',
            'verified'   => 1
        ],
        [
            'role_id'    => 2,
            'first_name' => 'Horia',
            'last_name'  => 'Blebea',
            'email'      => 'horia@gmail.com',
            'password'   => 'intrex',
            'verified'   => 1
        ],
        [
            'role_id'    => 3,
            'first_name' => 'Cristina',
            'last_name'  => 'Aliman',
            'email'      => 'cristinaliman@gmail.com',
            'password'   => 'intrex',
            'verified'   => 1
        ]
    ];

    public function run()
    {
        foreach($this->users as $user)
        {
            User::create([
                'role_id'    => $user['role_id'],
                'first_name' => $user['first_name'],
                'last_name'  => $user['last_name'],
                'email'      => $user['email'],
                'password'   => bcrypt($user['password']),
                'verified'   => $user['verified']
            ]);
        }
    }
}
