<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addData = Permission::where('slug','add-data')->first();
        $updateData = Permission::where('slug','update-data')->first();
        $readData = Permission::where('slug','read-data')->first();
        $deleteData = Permission::where('slug','delete-data')->first();

        $admin = new Role();
        $admin->name = 'Admin';
        $admin->slug = 'admin';
        $admin->save();
        $admin->permissions()->attach($addData);
        $admin->permissions()->attach($updateData);
        $admin->permissions()->attach($readData);
        $admin->permissions()->attach($deleteData);

        $manager = new Role();
        $manager->name = 'Manager';
        $manager->slug = 'manager';
        $manager->save();
        $manager->permissions()->attach($addData);
        $manager->permissions()->attach($updateData);
        $manager->permissions()->attach($readData);

        $user = new Role();
        $user->name = 'User';
        $user->slug = 'user';
        $user->save();
        $user->permissions()->attach($readData);
    }
}
