<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{





    public function index()
    {
        $products = Product::with(['photo', 'category'])->paginate(3);
        $categories = Category::all();

        return view('admin.products.index', compact('products', 'categories'));
    }



    public function create()
    {
            $categories = Category::all();
        return view('admin.products.index',compact('categories'));
    }


    public function store(ProductRequest $request)
    {

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->weight = $request->weight;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        if ($request->hasFile('photo')) {

            $product->addMediaFromRequest('photo')->toMediaCollection('photo');
        }

        $product->save();

        return redirect()->route('products.index')->with('Add',"تم اضافة المنتج بنجاح");

    }


    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.show',compact('product'));
    }


    public function edit($id)
    {

        $categories = Category::all();

        $product = Product::findOrFail($id);

        return view('admin.products.edit',compact('product','categories'));
    }


    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'weight' => 'required|numeric',
        'category_id' => 'required|integer',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $product->update($request->except('photo'));

    if ($request->hasFile('photo')) {
        $product->clearMediaCollection('photo');
        $product->addMediaFromRequest('photo')->toMediaCollection('photo');
    }

    return redirect()->route('products.index')->with('edit', "تم التحديث بنجاح");
}




    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return redirect()->back()->with("delete", "تم ازالة العنصر بنجاح");
        } else {
            return redirect()->back()->with("error", "Category not found");
        }
    }


    public function product(){
        $products = Product::paginate(10);
        return view('front.AllProduct',compact('products'));
    }
}
