<?php

use Illuminate\Database\Seeder;
use App\Role;
// use App\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
        	[
        		'name' => 'Pemilik',
        		'display_name' => 'Pemilik',
        		'description' => 'User adalah pemilik yang dapat melihat'
        	],
        	[
        		'name' => 'Admin',
        		'display_name' => 'User Administrator',
        		'description' => 'User diperbolehkan mengelola dan mengedit user lain'
        	]
        ];
        foreach ($role as $key => $value) {
            Role::create($value);
        }
    }
}