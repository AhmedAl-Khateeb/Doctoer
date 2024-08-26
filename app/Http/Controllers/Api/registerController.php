<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\registerRequest;

class registerController extends Controller
{
    public function register(registerRequest $request){

        $data = $request->validated();
        $user = User::create([
         "name" =>$data['name'],
         "email"=>$data['email'],
         "password"=>bcrypt($data['password'])

        ]);

        return $user->createToken('mytoken',['server:update'])->plainTextToken;

        $response = [
          "Message"=>"Welcome",
          "User"=>$user,
          "Status"=>201
        ];
        return response($request,201);
    }
}
