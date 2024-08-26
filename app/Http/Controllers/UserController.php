<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\userRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        return view('admin.Users.index',compact('user'));
    }


    public function create()
    {
        return view('admin.Users.create');
    }


    public function store(userRequest $request)
{
    
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->status = $request->status;
    $user->password = Hash::make($request->password);
    $user->save();
    return redirect()->route('admin.users.index')->with('Add', 'Create Successfully');
}





    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.Users.edit',compact('user'));
    }


    public function update(userRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;

        // تحديث كلمة المرور فقط إذا كانت موجودة فقط
        if (!empty('password')) {
            $user->password = Hash::make($request['password']);
        }
        $user->save();
        return redirect()->route('admin.users.index')->with('edit','Your details have been updated now');

    }



    public function destroy($id)
    {

        try {
            $user = User::where('id',$id)->first();
            $user->delete();
            return redirect()->route('admin.users.index')->with('delete','Deleted successfully');
        } catch (\Exception $ex) {
            return redirect()->route('admin.users.index')->with('Error','Error try again');
        }
    }


    public function changStatus($id)
    {

        $user = User::find($id);
        if ($user->status == 'patient') {
            $user->status = 'doctoer';
            $user->save();

            return redirect()->back()->with("Done","Welcome");
        } else {
            $user->status = 'patient';
            $user->save();

            return redirect()->back()->with("Done","Welcome");
        }
    }
}
