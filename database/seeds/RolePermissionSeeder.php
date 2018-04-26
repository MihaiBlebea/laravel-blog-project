<?php

use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    private $relationships = [
        [
            'role_id'       => 1,
            'permission_id' => 1
        ],
        [
            'role_id'       => 1,
            'permission_id' => 2
        ],
        [
            'role_id'       => 1,
            'permission_id' => 3
        ],
        [
            'role_id'       => 3,
            'permission_id' => 2
        ],
        [
            'role_id'       => 4,
            'permission_id' => 1
        ],
        [
            'role_id'       => 4,
            'permission_id' => 3
        ]
    ];

    public function run()
    {
        foreach($this->relationships as $relationship)
        {
            DB::table('role_permissions')->insert([
                'role_id'       => $relationship['role_id'],
                'permission_id' => $relationship['permission_id']
            ]);
        }
    }
}
