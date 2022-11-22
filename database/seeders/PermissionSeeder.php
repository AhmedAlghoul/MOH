<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ModelsPermission::create(['name' => 'إنشاء-', 'guard_name' => 'admin']);
        ModelsPermission::create(['name' => 'عرض-', 'guard_name' => 'admin']);
        ModelsPermission::create(['name' => 'تعديل-', 'guard_name' => 'admin']);
        ModelsPermission::create(['name' => 'حذف-', 'guard_name' => 'admin']);

        // ModelsPermission::create(['name' => 'إنشاء-', 'guard_name' => 'web']);
        // ModelsPermission::create(['name' => 'عرض-', 'guard_name' => 'web']);
        // ModelsPermission::create(['name' => 'تعديل-', 'guard_name' => 'web']);
        // ModelsPermission::create(['name' => 'حذف-', 'guard_name' => 'web']);
    }
}
