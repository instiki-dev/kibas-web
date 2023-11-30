z<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesandPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => "Admin"]);
        $pembaca = Role::create(['name' => "Pembaca Meter"]);
        $pelanggan = Role::create(['name' => "Pelanggan"]);

        Permission::create(['name' => 'admin-page-access']);
        Permission::create(['name' => 'employee-access']);
        Permission::create(['name' => 'reader-access']);
        Permission::create(['name' => 'customer-access']);
        $admin -> givePermissionTo([
            'admin-page-access',
            'employee-access'
        ]);

        $pembaca -> givePermissionTo([
            'employee-access',
            'reader-access'
        ]);

        $pelanggan -> givePermissionTo([
            "customer-access"
        ]);
    }
}
