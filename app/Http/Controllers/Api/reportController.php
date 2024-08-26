<?php

namespace App\Http\Controllers\Api;

use App\Models\reports;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\reportsRequest;
use App\Http\Resources\ReportResource;

class reportController extends Controller
{
    public function index(){

        return ReportResource::collection(reports::all());
    }

    public function store(reportsRequest $request){

        $validatedData = $request->validated();

        $reports = reports::create($validatedData);
        return new ReportResource($reports);
    }

    public function show($id){
        $reports = reports::query()->findOrFail($id);
        return ReportResource::make($reports);
    }

    public function update(Request $request ,$id){

        $report = reports::find($id);
        if (!$report) {
            return response()->json([
            "Message"=>'Report not found'
            ],404);
        };

        $report->name = $request->input('name', $report->name);
        $report->email = $request->input('email', $report->email);
        $report->phone = $request->input('phone', $report->phone);
        $report->gender = $request->input('gender', $report->gender);
        $report->age = $request->input('age', $report->age);
        $report->weight = $request->input('weight', $report->weight);
        $report->height = $request->input('height', $report->height);
        $report->address = $request->input('address', $report->address);
        $report->user_id = $request->input('user_id', $report->user_id);
        $report->save();

        return response()->json([
            "message" => 'Update Successfully',
            "data" => new ReportResource($report),
            "status" => 200
        ], 200);
    }


    public function destroy($id){
       $reports = reports::find($id);

       if (!$reports) {
        return response()->json([
           "Message"=>"Not found"
        ],404);
       }
       $reports->delete();

       return response()->json([
        "Message"=>'Deleted Successflly'
       ],200);
    }
}
