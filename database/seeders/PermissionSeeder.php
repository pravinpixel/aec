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
           Permission::create(['name' => 'enquiry_index']);
           Permission::create(['name' => 'enquiry_add']);
           Permission::create(['name' => 'enquiry_edit']);
           Permission::create(['name' => 'enquiry_delete']);

           Permission::create(['name' => 'project_index']);
           Permission::create(['name' => 'project_add']);
           Permission::create(['name' => 'project_edit']);
           Permission::create(['name' => 'project_delete']);

           Permission::create(['name' => 'task_index']);
           Permission::create(['name' => 'task_add']);
           Permission::create(['name' => 'task_edit']);
           Permission::create(['name' => 'task_delete']);

           Permission::create(['name' => 'contract_index']);
           Permission::create(['name' => 'contract_add']);
           Permission::create(['name' => 'contract_edit']);
           Permission::create(['name' => 'contract_delete']);

           Permission::create(['name' => 'employee_index']);
           Permission::create(['name' => 'employee_add']);
           Permission::create(['name' => 'employee_edit']);
           Permission::create(['name' => 'employee_delete']);
   
           // create roles and assign existing permissions
           $role1 = Role::create(['name' => 'admin','status' => 1, 'slug' => 'admin']);
           $role2 = Role::create(['name' => 'technical estimate','status' => 1, 'slug' => 'technical_estimate']);
           $role3 = Role::create(['name' => 'cost estimate','status' => 1, 'slug' => 'cost_estimate']);
        

           $role1->givePermissionTo('enquiry_index');
           $role1->givePermissionTo('enquiry_add');
           $role1->givePermissionTo('enquiry_edit');
           $role1->givePermissionTo('enquiry_delete');
           // create demo users

           $user = Employee::find(1);
           $user->assignRole($role1);

    }
    
}
