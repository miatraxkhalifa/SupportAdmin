<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\RoleUsers;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => '1',
                'title' => 'Admin'
            ],
            [
                'id' => '2',
                'title' => 'Level 1'
            ],
            [
                'id' => '3',
                'title' => 'Level 2'
            ]

        ];

        foreach ($roles as $role) {
            Roles::create($role);
        }

        $user = new User;
        $user->name = 'Wendell Segundo';
        $user->email = 'wendell.segundo@engagis.com';
        $user->password = Hash::make('test123!');
        $user->save();

        $role = new RoleUsers;
        $role->roles_id = '3';
        $role->users_id = $user->id;
        $role->save();
    }
}
