<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }






    public function home()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        if ($user->usertype === 'admin') {
            return redirect()->route('dashboard');
        }

        return redirect()->route('front.user');
    }


    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::attempt($credentials)) {
    //         return redirect()->route('dashboard');
    //     }
    //     return redirect()->route('admin.auth.login')->with('error', 'Invalid credentials');
    // }




    public function index()
    {
        $total_revenue = 0;
        $total_delivered = 0;
        $total_processing = 0;

        $order = Order::all();
        foreach ($order as $order) {
            $total_revenue += $order->price;
        }

        $total_delivered = Order::where('delivery_status', 'Delivered')->count();
        $total_processing = Order::where('delivery_status', 'processing')->count();

        return view('admin.dashboard', compact('total_revenue', 'total_delivered', 'total_processing'));
    }




    public function products_details($id) {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'المنتج غير موجود.');
        }

        return view('front.products_details', compact('product'));
    }


    public function add_cart(Request $request ,$id)
    {
        if (Auth::id()) {

            $user = Auth::user();

            $product = Product::findOrFail($id);

            $cart = new Cart();
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_name = $product->name;
            $cart->price = $product->price;
            $cart->weight = $product->weight;
            $cart->quantity = $request->input('quantity', 1);
            if ($request->hasFile('photo')) {

                $product->addMediaFromRequest('photo')->toMediaCollection('photo');
            }
            $cart->product_id = $product->id;
            $cart->save();



            return redirect()->back()->with('Add', 'تم اضافة الطلب الى السله بنجاح');
        } else {
            return redirect('auth.login')->with('error', 'يرجى تسجيل الدخول لإضافة المنتج إلى السلة.');
        }
    }


    public function show_cart(){

        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id','=',$id)->get();

            $shippingCost = 0;

            return view('front.include.showcart',compact('cart', 'shippingCost'));

        }else{
            return redirect('auth.login');
        }
    }


    public function remove_cart($id){

        $cart = Cart::findOrFail($id);

        $cart->delete();

        return redirect()->back();
    }







}
