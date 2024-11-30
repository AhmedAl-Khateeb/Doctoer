

<style>
    @media print {
    body {
        margin: 0;
        padding: 0;
        font-size: 12px; /* Adjust font size for print */
    }

    h1 {
        font-size: 20px; /* Adjust heading size for print */
    }

    .customer-details {
        margin: 0;
        padding: 10px;
    }
}

</style>


<<h1 class="text-center">Order Details</h1>

<div class="customer-details" style="max-width: 800px; margin: auto;">
    <p style="margin-bottom: 15px;"><strong>Customer Name:</strong> <span class="h2">   {{ $order->name }}</span></p>
    <p style="margin-bottom: 15px;"><strong>Customer Email:</strong> <span class="h2">  {{ $order->email }}</span></p>
    <p style="margin-bottom: 15px;"><strong>Customer Phone:</strong> <span class="h2"> {{ $order->phone }}</span></p>
    <p style="margin-bottom: 15px;"><strong>Customer Address:</strong> <span class="h2">  {{ $order->address }}</span></p>
    <p style="margin-bottom: 15px;"><strong>Product Name:</strong> <span class="h2">  {{ $order->product_name }}</span></p>
    <p style="margin-bottom: 15px;"><strong>Price:</strong> <span class="h2">EGP:  {{ number_format($order->price, 2, '.', '') }}</span></p>
    <p style="margin-bottom: 15px;"><strong>Quantity:</strong> <span class="h2">  {{ $order->quantity }}</span></p>


</div>








