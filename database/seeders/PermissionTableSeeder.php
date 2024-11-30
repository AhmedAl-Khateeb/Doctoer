<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{




public function run()
{
$permissions = [

    // 'categories',
    // 'Your_Products',
    // 'Orders',
    // 'Role_Permission',
    // 'dashboard',
    // 'home',
    // 'front.user',
    // 'create.products',


    // 'Add-category',
    // 'show-All',
    // 'Add-Product',
    // 'Show-Product',
    // 'Show-Orders',
    // 'User List',
    // 'Permission'




];
foreach ($permissions as $permission) {
Permission::create(['name' => $permission]);
}
}
}
