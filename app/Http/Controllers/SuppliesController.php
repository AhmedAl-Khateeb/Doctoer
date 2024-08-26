<?php

namespace App\Http\Controllers;

use App\Models\supplies;
use Illuminate\Http\Request;
use App\Http\Requests\suppliesRequest;

class SuppliesController extends Controller
{

    public function index()
    {
        $supplies = supplies::all();

        return view('admin.Supplies.index',compact('supplies'));
    }


    public function create()
    {
        return view('admin.Supplies.create');
    }


    public function store(suppliesRequest $request)
    {
        $supplies = new supplies();
        $supplies->supplies = $request->supplies;
        $supplies->state = $request->state;
        $supplies->street = $request->street;
        $supplies->PLZcode = $request->PLZcode;
        $supplies->yourWhatsApp = $request->yourWhatsApp;
        $supplies->save();

        return redirect()->route('admin.supplies.index')->with('Add','Insert Successffully');
    }



    public function edit(supplies $supplies,$id)
    {
        $supplies = supplies::find($id);
        return view('admin.Supplies.edit',compact('supplies'));
    }


    public function update(Request $request, $id)
    {
        $supplies = supplies::find($id);

        if (!$supplies) {
            return redirect()->route('admin.supplies.index')->with('Error', 'Report not found');
        }

        $supplies->supplies = $request->supplies;
        $supplies->state = $request->state;
        $supplies->street = $request->street;
        $supplies->PLZcode = $request->PLZcode;
        $supplies->yourWhatsApp = $request->yourWhatsApp;
        $supplies->save();

        return redirect()->route('admin.supplies.index')->with('edit', 'Updated Successfully');
    }


    public function destroy($id)
    {
        $supplies = supplies::where('id',$id)->first();
        $supplies->delete();

        return redirect()->route('admin.supplies.index')->with('delete','The request has been successfully deleted.');
    }
}
