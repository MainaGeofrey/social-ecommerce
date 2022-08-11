<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'manage_products']);

        Permission::create(['name' => 'vendor_access']);

        Permission::create(['name' => 'user_access']);

      $superAdmin =  Role::create(['name' => 'super_admin']);
      $vendorAdmin =  Role::create(['name' => 'vendor_admin']);
      $user =  Role::create(['name' => 'user']);

      $vendorAdmin->givePermissionTo('vendor_access');
      $user->givePermissionTo('user_access');

      $user = User::first();
      



    }
}
