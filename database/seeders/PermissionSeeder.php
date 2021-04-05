<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'slug' => 'add-data',
            'name' => 'Add data',
        ]);
        
        DB::table('permissions')->insert([
            'slug' => 'update-data',
            'name' => 'Update data',
        ]);
        
        DB::table('permissions')->insert([
            'slug' => 'read-data',
            'name' => 'Read data',
        ]);
       
        DB::table('permissions')->insert([
            'slug' => 'delete-data',
            'name' => 'Delete data',
        ]);
    }
}
