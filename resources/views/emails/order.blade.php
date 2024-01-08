<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
    <style>
        .container {
            width: 100%;
            max-width: 600px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            background-color: #4b5563;
            font-family: 'Inter', sans-serif;
        }

        .container h1 {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .container p {
            font-size: 16px;
            font-weight: 400;
            margin-bottom: 10px;
        }

        .container div {
            margin-bottom: 20px;
        }

        .container div p {
            margin-bottom: 5px;
        }

        .row {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            max-width: 80%;
            border-radius: 12px;
            background-color: white;
            padding: 1rem;
            margin: 1rem;
        }

        .item {
            display: flex;
            flex-direction: column;
            align-items: center;
            border-top: 1px solid rgba(0, 0, 0, 0.25);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        @if($order["order_status_Id"] == 7)
            <h1>Order Cancellation</h1>
            <p>Unfortunately, your order has been cancelled.</p>
            <p>But thank you though for your order!</p>
        @else
            <h1>Order Confirmation</h1>
            <p>Thank you for your order!</p>
        @endif
        <p>Order ID: #{{ $order["order_header_id"] }}</p>
        <p>Order FirstName: {{ $order["First_name"] }}</p>
        @if($order["delivery_type_name"] != "Pickup" )
            <p>Order
                Address: {{ $order["city_name"] }} {{ $order["street_name"] }} {{ $order["building_number"] }} {{ $order["apartment_number"] }}</p>
        @endif
        <p>Order Phone: {{ $order["Phone_number"] }}</p>
        @foreach($order["items"] as $item)
            <div class="item">
                <p>Item Name: {{ $item["dish_name"] }}</p>
                <p>Item Price: {{ $item["dish_price"] }}</p>
                <p>Item Quantity: {{ $item["quantity"] }}</p>
            </div>
        @endforeach


        <h2>Order Price: {{$order["total_price"]}}$</h2>
    </div>

</div>
</body>
