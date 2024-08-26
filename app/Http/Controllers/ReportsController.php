<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\reports;
use Illuminate\Http\Request;
use App\Http\Requests\reportsRequest;

class ReportsController extends Controller
{

    public function index()
    {
        $reports = reports::all();
        return view('admin.Reports.index',compact('reports'));
    }


    public function create()
    {
        $user = User::all();
        return view('admin.Reports.create',compact('user'));
    }


    public function store(reportsRequest $request)
    {
        dd($request->all());
        $reports = new reports();
        $reports->name = $request->name;
        $reports->email = $request->email;
        $reports->phone = $request->phone;
        $reports->gender = $request->gender;
        $reports->age = $request->age;
        $reports->weight = $request->weight;
        $reports->height = $request->height;
        $reports->address = $request->address;

        $reports->user_id = $request->user_id;
        $reports->save();

        return redirect()->route('admin.reports.index')->with('Add','Insert Successffully');
    }





    public function edit(reports $reports,$id)
    {
        $reports = reports::find($id);
        return view('admin.Reports.edit',compact('reports'));
    }


    public function update(Request $request, $id)
    {

        $reports = reports::find($id);


        if (!$reports) {
            return redirect()->route('admin.reports.index')->with('Error', 'Report not found');
        }

        // تحديث الحقول
        $reports->name = $request->input('name');
        $reports->email = $request->input('email');
        $reports->phone = $request->input('phone');
        $reports->gender = $request->input('gender');
        $reports->age = $request->input('age');
        $reports->weight = $request->input('weight');
        $reports->height = $request->input('height');
        $reports->address = $request->input('address');

        if ($request->has('user_id')) {
            $reports->user_id = $request->input('user_id');
        }


        $reports->save();


        return redirect()->route('admin.reports.index')->with('edit', 'Updated Successfully');
    }



    public function destroy(reports $reports,$id)
    {
        $reports = reports::where('id',$id)->first();
        $reports->delete();

        return redirect()->route('admin.reports.index')->with('delete','The question has been removed');
    }
}
