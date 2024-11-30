<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$user = User::create([
'name' => 'Ahmed AlKhateeb',
'email' => 'ahmed838526@gmail.com',
'password' => bcrypt('123456'),
'phone' => '01092951734',
'address' => 'Fayoum',
'roles_name'=> ["Admin"],
'status' => 'مفعل'

]);
$role = Role::create(['name' => 'Admin']);
$permissions = Permission::pluck('id','id')->all();
$role->syncPermissions($permissions);
$user->assignRole([$role->id]);
}
}
