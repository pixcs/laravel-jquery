<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\User;

class SeederName extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'super admin',
            'display_name' => 'Super Admin',
            'description' => 'Challenger'
        ]);

        Role::create([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'grand master '
        ]);

        Role::create([
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'master'
        ]);

        $superAdmin = Role::where('name', 'super admin')->first();
        $admin = Role::where('name', 'admin')->first();
        $user = Role::where('name', 'user')->first();
    
        $user1 = User::find(1); 
        $user1->attachRole($superAdmin);

        $user2 = User::find(2); 
        $user2->attachRole($admin);

        $user3 = User::find(3); 
        $user3->attachRole($user);
        
    }
}
