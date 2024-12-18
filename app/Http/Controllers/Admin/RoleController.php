<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/


// function __construct()
// {

// $this->middleware('permission:عرض صلاحية', ['only' => ['index']]);
// $this->middleware('permission:اضافة صلاحية', ['only' => ['create','store']]);
// $this->middleware('permission:تعديل صلاحية', ['only' => ['edit','update']]);
// $this->middleware('permission:حذف صلاحية', ['only' => ['destroy']]);

// }





public function index(Request $request)
{

  $roles = Role::all();
  return view('admin.Role.index',compact('roles'));

}



public function create()
{
$permission = Permission::get();
return view('roles.create',compact('permission'));
}



public function store(Request $request)
{
$this->validate($request, [
'name' => 'required|unique:roles,name',
'permission' => 'required',
]);
$role = Role::create(['name' => $request->input('name')]);
$role->syncPermissions($request->input('permission'));
return redirect()->route('roles.index')
->with('success','Role created successfully');
}



public function show($id)
{
$role = Role::find($id);
$rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
->where("role_has_permissions.role_id",$id)
->get();
return view('admin.Role.show',compact('role','rolePermissions'));
}



public function edit($id)
{
$role = Role::find($id);
$permission = Permission::get();
$rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
->all();
return view('admin.Role.edit',compact('role','permission','rolePermissions'));
}


public function update(Request $request, $id)
{
$this->validate($request, [
'name' => 'required',
'permission' => 'required',
]);
$role = Role::find($id);
$role->name = $request->input('name');
$role->save();
$role->syncPermissions($request->input('permission'));
return redirect()->route('roles.index')
->with('success','Role updated successfully');
}



public function destroy($id)
{
DB::table("roles")->where('id',$id)->delete();
return redirect()->route('roles.index')
->with('success','Role deleted successfully');
}
}
