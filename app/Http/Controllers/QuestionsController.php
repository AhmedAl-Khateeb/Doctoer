<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\questions;
use Illuminate\Http\Request;
use App\Http\Requests\questionRequest;

class QuestionsController extends Controller
{

    public function index()
    {
        $questions = questions::all();
        return view('admin.Question.index',compact('questions'));
    }


    public function create()
    {
        $user = User::all();
        return view('admin.Question.create',compact('user'));
    }


    public function store(questionRequest $request)
    {
        $questions = new questions();
        $questions->title = $request->title;
        $questions->body = $request->body;
        $questions->user_id = $request->user_id;
        $questions->save();
        return redirect()->route('admin.Question.index')->with('Add','Your question has been sent successfully');
    }



    public function edit(questions $questions,$id)
    {
        $questions = questions::find($id);
        return view('admin.Question.edit',compact('questions'));
    }


    public function update(Request $request, $id)
    {
        // العثور على السؤال بواسطة المعرف
        $questions = questions::find($id);
        if (!$questions) {
            return redirect()->route('admin.Question.index')->with('Error', 'Question not found');
        }

        // تحديث الحقول
        $questions->title = $request->input('title');
        $questions->body = $request->input('body');

        // إذا كان user_id موجوداً في الطلب
        if ($request->has('user_id')) {
            $questions->user_id = $request->input('user_id');
        }

        // حفظ التحديثات
        $questions->save();

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.Question.index')->with('edit', 'Update Successfully');
    }



    public function destroy($id)
    {
        $questions = questions::where('id',$id)->first();
        $questions->delete();

        return redirect()->route('admin.Question.index')->with('delete','The question has been removed');
    }
}
