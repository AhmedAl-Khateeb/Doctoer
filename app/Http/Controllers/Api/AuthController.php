<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\reports;
use App\Models\Doctoers;
use App\Models\supplies;
use App\Models\questions;
use Illuminate\Http\Request;
use App\Http\Requests\userRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {
        // return UserResource::collection(User::query()->paginate(1));
        return UserResource::collection(User::all());
    }



    public function store(userRequest $request)
    {

        $validatedData = $request->validated();

        $model = User::create($validatedData);

        return new UserResource($model);

    }


    public function show($id)
    {
        $users = User::query()->findOrFail($id);
        return UserResource::make($users);
    }



    public function update(Request $request, $id)
{
    $users = User::find($id);

    if (!$users) {
        return response()->json([
            "message" => 'User not found'
        ], 404);
    }

    $users->name = $request->input('name', $users->name);
    $users->email = $request->input('email', $users->email);
    if ($request->filled('password')) {
        $users->password = Hash::make($request->password);
    }
    $users->save();

    return response()->json([
        "message" => 'Update Successfully',
        "data" => $users,
        "status" => 200
    ], 200);
}


    public function destroy($id)
{

    $users = User::find($id);

    if (!$users) {
        return response()->json(['message' => 'Item not found'], 404);
    }

    $users->delete();

    return response()->json(['message' => 'Item deleted successfully'], 200);
}






}
