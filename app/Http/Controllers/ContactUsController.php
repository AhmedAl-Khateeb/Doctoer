<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{



    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(ContactUsRequest $request)
    {
        $contact = $request->validated();
        ContactUs::create($request->all());

        return redirect()->back()->with(['Message'=>'تم ارسال سؤالك بنجاح']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
