<?php

namespace App\Http\Controllers;

use App\Models\Doctoers;
use Illuminate\Http\Request;
use App\Http\Requests\doctoersRequest;

class DoctoersController extends Controller
{

    public function index()
    {
        $doctoers = Doctoers::all();
        return view('admin.Doctoers.index',compact('doctoers'));
    }


    public function create()
    {
        return view('admin.Doctoers.create');
    }


    public function store(doctoersRequest $request)
    {
        $doctoers = new Doctoers();
        $doctoers->name = $request->name;
        $doctoers->specialization = $request->specialization;
        $doctoers->address = $request->address;
        $doctoers->price = $request->price;
        $doctoers->appointments = $request->appointments;
        $doctoers->languages = $request->languages;

        $doctoers->save();

        return redirect()->route('admin.doctoers.index')->with('Add','Insert successfully');
    }





    public function edit($id)
{
    $doctoers = Doctoers::find($id);

    if (!$doctoers) {

        return redirect()->route('admin.doctoers.index')->with('Error', 'Doctor not found');
    }

    return view('admin.doctoers.edit', compact('doctoers'));
}


public function update(Request $request, $id)
{
    $doctoers = Doctoers::find($id);

    if (!$doctoers) {

        return redirect()->route('admin.doctoers.index')->with('Error', 'Doctor not found');
    }


    $doctoers->update($request->all());

    return redirect()->route('admin.doctoers.index')->with('edit', 'Doctor updated successfully');
}


    public function destroy($id)
    {
        $doctoers = Doctoers::where('id',$id)->first();
        $doctoers->delete();

        return redirect()->route('admin.doctoers.index')->with('delete','Deleted successfully');
    }
}
