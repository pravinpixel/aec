<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           // Reset cached roles and permissions
        //    app()[PermissionRegistrar::class]->forgetCachedPermissions();

           // create permissions
           Permission::create(['name' => 'enquiry-index']);
           Permission::create(['name' => 'enquiry-add']);
           Permission::create(['name' => 'enquiry-edit']);
           Permission::create(['name' => 'enquiry-delete']);
   
           // create roles and assign existing permissions
           $role1 = Role::create(['name' => 'admin','status' => 1, 'slug' => 'admin']);
           $role1->givePermissionTo('enquiry-index');
           $role1->givePermissionTo('enquiry-add');
           $role1->givePermissionTo('enquiry-edit');
           $role1->givePermissionTo('enquiry-delete');
           // create demo users

           $user = Employee::find(1);
           $user->assignRole($role1);

    }
    
}
