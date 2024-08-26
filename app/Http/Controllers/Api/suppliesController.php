<?php

namespace App\Http\Controllers\Api;

use App\Models\supplies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\suppliesRequest;
use App\Http\Resources\SupplyResource;

class suppliesController extends Controller
{

    public function index(){

        return SupplyResource::collection(supplies::all());
    }


    public function store(suppliesRequest $request){

        $validatedData = $request->validated();
        $supplies = supplies::create($validatedData);

        return new SupplyResource($supplies);
    }


    public function show($id){

        $supplies = supplies::query()->findOrFail($id);
        return SupplyResource::make($supplies);
    }

    public function update(Request $request,$id){
         $supplies = supplies::find($id);
         if (!$supplies) {
            return response()->json([
               "Message"=> "Not Found"
            ],404);
         }

         $supplies->supplies = $request->input('supplies',$supplies->supplies);
         $supplies->state = $request->input('state',$supplies->state);
         $supplies->street = $request->input('street',$supplies->street);
         $supplies->PLZcode = $request->input('PLZcode',$supplies->PLZcode);
         $supplies->yourWhatsApp = $request->input('yourWhatsApp',$supplies->yourWhatsApp);
         $supplies->save();

         return response()->json([
          "Message"=>'Update Succesfully',
          'Data'=>$supplies,
          "Status"=>200
         ],200);


    }

    public function destroy($id){
        $supplies = supplies::find($id);

        if (!$supplies) {
            return response()->json([
                "Message"=>'Not Found'
            ],404);
        }

        $supplies->delete();

        return response()->json([
          "Message"=>'Deleted Successfully'
        ],200);
    }
}
