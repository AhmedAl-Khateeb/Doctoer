<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;

class OrderPlaced extends Notification
{
    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['database']; // إرسال الإشعار في قاعدة البيانات والبريد الإلكتروني
    }

    public function toDatabase($notifiable)
    {
        return [
            'order_id' => $this->order->id,
            'product_name' => $this->order->product_name,
            'quantity' => $this->order->quantity,
            'price' => $this->order->price,
            'message' => 'تم استلام طلبك بنجاح وسوف نتواصل معك.',
            'user' => Auth::user()->name
        ];
    }

    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //         ->subject('تم استلام طلبك بنجاح')
    //         ->line('شكراً لك على طلبك!')
    //         ->line('تفاصيل الطلب: ' . $this->order->product_name)
    //         ->action('عرض الطلب', url('/orders/' . $this->order->id));
    // }
}
