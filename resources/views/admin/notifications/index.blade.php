@extends('admin.include.master')

@section('styles')
    <style>
        body {
            overflow-x: hidden;
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            color: #333;
        }

        .row {
            margin-right: 0;
            margin-left: 0;
            display: flex;
            flex-wrap: wrap;
        }

        .notification-card {
    border: 1px solid #dcdcdc;
    background-color: #ffffff;
    transition: transform 0.2s ease-in-out, box-shadow 0.2s, background-color 0.3s;
    width: 100%;
    box-sizing: border-box;
    border-radius: 50px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}


        .notification-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            background-color: #e0e0e0;
        }

        .icon-bg {
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
        }

        .notification-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
        }

        .notification-timestamp {
            font-size: 0.9rem;
            color: #888;
        }

        .notification-details li {
            font-size: 0.95rem;
            color: #555;
        }

        .btn-outline-primary {
            color: #007bff;
            border-color: #007bff;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
        }

        @media (min-width: 768px) {
            .notification-card {
                width: 48%;
            }
        }

        @media (min-width: 992px) {
            .notification-card {
                width: 31%;
            }
        }

        .notification-content {
            display: flex;
            flex-direction: row-reverse;
            align-items: center;
        }

        .notification-icon {
            order: 1;
            margin-left: 10px;
        }
    </style>
@endsection

@section('content')
    <h1 class="text-center mb-4">All Notifications</h1>

    @if (auth()->user()->unreadNotifications->count() > 0)
        @foreach (auth()->user()->unreadNotifications->chunk(3) as $chunk)
            <div class="container">
                <div class="row justify-content-center mb-4">
                    @foreach ($chunk as $notification)
                        <div class="col-md-4 mb-4">
                            <div class="notification-card p-4 border rounded shadow-sm h-100">
                                <div class="d-flex align-items-start mb-3">
                                    <div class="notification-content">
                                        <div class="notification-icon">
                                            <div class="icon-bg p-3 rounded-circle">
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="notification-title mb-2">{{ $notification->data['message'] }}</h5>
                                            <p class="notification-timestamp text-muted mb-2">
                                                {{ $notification->created_at->format('Y-m-d H:i') }}
                                            </p>
                                            <ul class="notification-details list-unstyled mb-3">
                                                <li><strong>الاسم :</strong> : {{ $notification->data['user_name'] }}</li>
                                                <li><strong>التليفون :</strong> : {{ $notification->data['phone'] }}</li>
                                                <li><strong>اسم المنتج :</strong> : {{ $notification->data['product_name'] }}</li>
                                                <li><strong>الكميه :</strong> : {{ $notification->data['quantity'] }}</li>
                                                <li><strong>السعر :</strong> : {{ $notification->data['price'] }}</li>
                                            </ul>
                                            <a href="{{ route('order.showall', $notification->data['order_id']) }}" class="btn btn-outline-primary">
                                                View Order
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @else
        <p class="text-center">No new orders</p>
    @endif
@endsection
