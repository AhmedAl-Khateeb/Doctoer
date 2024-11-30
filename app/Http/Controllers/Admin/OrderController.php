<?php

namespace App\Http\Controllers\Admin;

use App\Events\NotificationSent;
use  PDF;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderPlaced;
use App\Notifications\OrderRequested;

class OrderController extends Controller
{


    public function cash_order(Request $request)
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = Cart::where('user_id', '=', $userid)->get();

        foreach ($data as $item) {
            $order = new Order();
            $order->name = $item->name;
            $order->email = $item->email;
            $order->phone = $item->phone;
            $order->address = $item->address;
            $order->quantity = $item->quantity;
            $order->product_name = $item->product_name;
            $order->price = $item->price;
            $order->product_id = $item->product_id;
            $order->delivery_status = 'processing';
            $order->user_id = $item->user_id;

            if ($request->hasFile('photo')) {
                $order->addMediaFromRequest('photo')->toMediaCollection('photo');
            }
            $order->save();

            $cart = Cart::find($item->id);
            $cart->delete();
        }

        $order = Order::latest()->first();

        if ($order) {
            $user = User::find($order->user_id);

            $admins = User::where('usertype', 'admin')->get();

            foreach ($admins as $admin) {
                $productName = $order->product_name;
                $quantity = $order->quantity;
                $price = $order->price;
                $userName = $user->name;
                $phone = $user->phone;

                $admin->notify(new OrderRequested($order->id, $productName, $quantity, $price, $userName, $phone));
            }

            $unreadCount = auth()->user()->unreadNotifications->count();
            event(new NotificationSent($unreadCount));
        }

        return redirect()->back()->with('Add', 'تم استلام طلبك بنجاح وسوف نتواصل معك');
    }






    public function showall()
    {
        $orders = Order::with('product.media')->get();
        return view('admin.orders.order', compact('orders'));
    }





    public function delivered(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->delivery_status = "Delivered";
        $order->save();
        return redirect()->back();
    }





    public function print_pdf($id)
    {
        $order = Order::findOrFail($id);
        $pdf = PDF::loadView('admin.orders.pdf', compact('order'));

        return $pdf->download('order_' . $id . '.pdf');
    }




    public function show_order()
    {
        if (Auth::id()) {

            $user = Auth::user();
            $userid = $user->id;

            $order = Order::where('user_id', '=', $userid)->get();

            return view('front.ShowOrder', compact('order'));
        } else {
            return redirect()->back()->with('error', 'يرجى تسجيل الدخول لعرض الطلب.');
        }
    }




    public function processOrder(Request $request)
    {
        $user = Auth::user();
        $productName = $request->input('product_name');
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $userName = $user->name;
        $phone = $user->phone;

        $user->notify(new OrderRequested($request->order_id, $productName, $quantity, $price, $userName, $phone));

        $admins = User::where('usertype', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new OrderRequested($request->order_id, $productName, $quantity, $price, $userName, $phone));
        }

        return response()->json(['success' => true, 'message' => 'تم استلام الطلب بنجاح']);
    }






    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('order.showall')->with('delete', 'تم حذف الطلب بنجاح');
    }

    public function send_email($id)
    {

        $order = Order::findOrFail($id);

        return view('admin.orders.email_info', compact('order'));
    }


    public function send_user_email(Request $request, $id)
    {
        $request->validate([
            'greeting' => 'required|string',
            'firstline' => 'required|string',
            'body' => 'required|string',
            'button' => 'nullable|string',
            'url' => 'nullable|url',
            'lastline' => 'nullable|string',
        ]);

        $order = Order::findOrFail($id);

        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];

        Notification::send($order, new SendEmailNotification($details));

        return redirect()->back()->with('success', 'تم إرسال البريد الإلكتروني بنجاح.');
    }



    public function cancel_order($id)
    {

        $order = Order::findOrFail($id);
        $order->delivery_status = 'تم الغاء الطلب';
        $order->save();
        return redirect()->back();
    }



    public function MarkAsRead_all(Request $request)
    {

        $userUnreadNotification = auth()->user()->unreadNotifications;

        if ($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return back();
        }
    }


    public function sendNotification(Request $request)
{
    $user = User::find($request->user_id);
    $user->notify(new YourNotification());

    return response()->json(['message' => 'Notification sent successfully.']);
}
}
