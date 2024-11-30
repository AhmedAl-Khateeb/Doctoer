<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function index()
    {
        $messages = ContactUs::latest()->paginate(10);
        return view('admin.ContactUs.index',compact('messages'));
    }


    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    ContactUs::create($request->only(['name', 'email', 'phone', 'subject', 'message']));

    return redirect()->back()->with('success', 'Your message has been sent successfully!');
}




    public function show($id)
    {
        $message = ContactUs::findOrFail($id);
        return view('admin.ContactUs.show',compact('message'));
    }


    public function destroy($id)
    {
        $message = ContactUs::findOrFail($id);

        if ($message) {
            $message->delete();
            return redirect()->route('contact.index')->with('delete', 'Message deleted successfully.');
        }

        return redirect()->route('contact.index')->with('error', 'Message not found.');
    }

}
