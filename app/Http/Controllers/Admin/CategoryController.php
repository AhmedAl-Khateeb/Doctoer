<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }




    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(CategoryRequest $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);


        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index')->with('Add', 'Category added successfully.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }





    public function update(Request $request, $id)
    {
    $category = Category::find($id);

    if (!$category) {
        return redirect()->route('category.index')->with('error', 'فئة غير موجودة');
    }

    $category->update($request->only('name'));

    return redirect()->route('category.index')->with('edit', 'تم التحديث بنجاح');
   }



    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('category.index')->with('delete','تم حذف العنصر بنجاح');
    }

}
