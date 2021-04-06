<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('slug','admin')->first();
        $manager = Role::where('slug', 'manager')->first();
        $user = Role::where('slug', 'user')->first();
        
        $addData = Permission::where('slug','add-data')->first();
        $updateData = Permission::where('slug','update-data')->first();
        $readData = Permission::where('slug','read-data')->first();
        $deleteData = Permission::where('slug','delete-data')->first();

        $user1 = new User();
        $user1->name = 'Admin';
        $user1->email = 'admin@mail.com';
        $user1->password = Hash::make('12345678');
        $user1->position_id = rand(1,10);
        $user1->save();
        $user1->roles()->attach($admin);
        $user1->permissions()->attach($addData);
        $user1->permissions()->attach($updateData);
        $user1->permissions()->attach($readData);
        $user1->permissions()->attach($deleteData);

        $user2 = new User();
        $user2->name = 'Manager';
        $user2->email = 'manager@mail.com';
        $user2->password = Hash::make('12345678');
        $user2->position_id = rand(1,10);
        $user2->save();
        $user2->roles()->attach($manager);
        $user2->permissions()->attach($addData);
        $user2->permissions()->attach($updateData);
        $user2->permissions()->attach($readData);
        
        $user3 = new User();
        $user3->name = 'User';
        $user3->email = 'user@mail.com';
        $user3->password = Hash::make('12345678');
        $user3->position_id = rand(1,10);
        $user3->save();
        $user3->roles()->attach($user);
        $user3->permissions()->attach($readData);
    }
}
