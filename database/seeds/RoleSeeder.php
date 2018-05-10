<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    private $roles = [
        [
            'name'        => 'admin',
            'description' => 'This is the admin role'
        ],
        [
            'name'        => 'guest',
            'description' => 'This is the guest role'
        ],
        [
            'name'        => 'editor',
            'description' => 'This is the editor role'
        ],
        [
            'name'        => 'writer',
            'description' => 'This is the writer role'
        ],
        [
            'name'        => 'user',
            'description' => 'This is the user role'
        ],
    ];

    public function run()
    {
        foreach($this->roles as $role)
        {
            Role::create([
                'name'        => $role['name'],
                'description' => $role['description']
            ]);
        }
    }
}
