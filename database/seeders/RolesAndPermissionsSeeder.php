<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        $permissions = [
            'view dashboard',
            'manage users',
            'edit profile'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $adminRole->givePermissionTo($permissions); // إعطاء جميع الصلاحيات لدور الـ admin
        $userRole->givePermissionTo('edit profile'); // إعطاء صلاحية معينة لدور الـ user

        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'], // استخدم بريد إلكتروني مميز
            [
                'name' => 'Admin User',
                'password' => bcrypt('password123')
            ]
        );
        $user = User::firstOrCreate(
            ['email' => 'user@example.com'], // استخدم بريد إلكتروني مميز
            [
                'name' => 'Regular User',
                'password' => bcrypt('password123')
            ]
        );

        $admin->assignRole($adminRole);
        $user->assignRole($userRole);

        $admin->givePermissionTo('view dashboard');
    }
}
