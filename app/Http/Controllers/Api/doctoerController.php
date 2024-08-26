<?php

namespace App\Http\Controllers\Api;

use App\Models\Doctoers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\doctoersRequest;
use App\Http\Resources\DoctoerResource;

class doctoerController extends Controller
{
    public function index(){

                // return DoctoerResource::collection(Doctoers::query()->paginate());

        return DoctoerResource::collection(Doctoers::all());
    }


    public function store(doctoersRequest $request)
    {

        $validatedData = $request->validated();

        $model = Doctoers::create($validatedData);

        return new DoctoerResource($model);
    }


    public function show($id)
    {
        $users = Doctoers::query()->findOrFail($id);
        return DoctoerResource::make($users);
    }



    public function update(Request $request, $id)
{
    $users = Doctoers::find($id);

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

    $users = Doctoers::find($id);

    if (!$users) {
        return response()->json(['message' => 'Item not found'], 404);
    }

    $users->delete();

    return response()->json(['message' => 'Item deleted successfully'], 200);
}

}
