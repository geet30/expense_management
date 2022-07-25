<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         $permissions = [
           'dashboard',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'category-list',
           'category-create',
           'category-edit',
           'category-delete',
           'expense-list',
           'expense-create',
           'expense-edit',
           'expense-delete',
           'bank-list',
           'bank-create',
           'bank-edit',
           'bank-delete',
           'resume-list',
           'resume-create',
           'resume-edit',
           'resume-delete',
           'resume-category-list',
           'resume-category-create',
           'resume-category-edit',
           'resume-category-delete',
        ];

    // DB::table('permissions')->truncate();
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
