<?php

namespace App\Http\Controllers\Api;

use App\Models\questions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\questionRequest;
use App\Http\Resources\QuestionResource;

class questionsController extends Controller
{
    public function index()
    {

        return QuestionResource::collection(questions::all());
    }



    public function store(questionRequest $request)
    {

        $validatedData = $request->validated();

        $model = questions::create($validatedData);

        return new QuestionResource($model);
    }


    public function show($id)
    {
        $users = questions::query()->findOrFail($id);
        return QuestionResource::make($users);
    }



    public function update(Request $request, $id)
{
    $users = questions::find($id);

    if (!$users) {
        return response()->json([
            "message" => 'User not found'
        ], 404);
    }

    $users->name = $request->input('name', $users->name);
    $users->email = $request->input('email', $users->email);
    $users->save();

    return response()->json([
        "message" => 'Update Successfully',
        "data" => $users,
        "status" => 200
    ], 200);
}


    public function destroy($id)
{

    $users = questions::find($id);

    if (!$users) {
        return response()->json(['message' => 'Item not found'], 404);
    }

    $users->delete();

    return response()->json(['message' => 'Item deleted successfully'], 200);
}
}
