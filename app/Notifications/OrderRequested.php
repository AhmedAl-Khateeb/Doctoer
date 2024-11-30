<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;

class OrderRequested extends Notification
{
    private $orderId;
    private $productName;
    private $quantity;
    private $price;
    private $userName;
    private $phone;

    public function __construct($orderId, $productName, $quantity, $price, $userName, $phone)
    {
        $this->orderId = $orderId;
        $this->productName = $productName;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->userName = $userName;
        $this->phone = $phone;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'user_name' => $this->userName,
            'phone' => $this->phone,
            'order_id' => $this->orderId,
            'product_name' => $this->productName,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'message' => 'تم استلام طلب جديد من ',
        ];
    }

}
