@extends('layouts.home')

@section('home-css')
    <link rel="stylesheet" href='{{ asset("build/assets/css/checkout.css") }}' xmlns="http://www.w3.org/1999/html">
    <style>
        #chartContainer
        {
            display: flex;
            max-width: 350px;
        }
    </style>
@endsection
@section("nav")

@endsection
@section('content')
    <div class="container">
        <div class="row gap-3">
            <div class="row">
                <span class="col">Date</span>
                <span class="col">Order ID</span>
                <span class="col">Status</span>
                <span class="col">Order Total</span>
                <span class="col">Payment Method</span>
                <span class="col">Delivery</span>
                <span class="col">Comment</span>
                <span class="col">GateWay Code</span>
                <span class="col">Company Name</span>
                <span class="col">Action</span>
            </div>
            @foreach($orders as $order)
                <div class="row">
                    <div class="col">
                        <p>{{$order->CreatedAt}}</p>
                    </div>
                    <div class="col">
                        <p>{{ $order->OrderId}}</p>
                    </div>
                    <div class="col">
                        <p>{{$order->OrderStatusName}}</p>
                    </div>
                    <div class="col">
                        <p>{{ $order->TotalPrice}}</p>
                    </div>
                    <div class="col">
                        <p>{{$order->PaymentMethodName}}</p>
                    </div>
                    <div class="col">
                        <p>{{$order->DeliveryTypeName}}</p>
                    </div>
                    <div class="col">
                        <p>{{$order->Note}}</p>
                    </div>
                    <div class="col">
                        <p>{{ $order->GatewayCode}}</p>
                    </div>
                    <div class="col">
                        <p>{{$order->CompanyName}} </p>
                    </div>
                    <div class="col">
                        <i class="fa-solid fa-user p-2" type="button" data-mdb-ripple-init data-mdb-modal-init
                           data-mdb-target="#customerModal{{$order->OrderId}}"></i>
                        <i class="fa-solid fa-map"></i>
                    </div>
                </div>
                <x-customer-modal
                    :name="$order->CustomerName"
                    :lastname="$order->CustomerSurname ?? 'blank'"
                    :phone="$order->CustomerPhoneNumber ?? 'blank'"
                    :email="$order->CustomerEmail ?? 'blank'"
                    :orderId="$order->OrderId"
                />
            @endforeach

        </div>
        {{ $orders->links("pagination::bootstrap-5") }}
        <div>
            @foreach($deliveryStats as $delivery)
                <span style="display: none" disabled class="col" data-delivery
                      data-method="{{$delivery->Delivery_method_name}}"
                      data-value="{{$delivery->count}}"></span>

            @endforeach
        </div>
        <div>
            @foreach($mostOrderedDish as $dish)
                <span  disabled class="col" data-most data-method="{{$dish->DishName}}"
                      data-value="{{$dish->TotalOrders}}"></span>

            @endforeach
        </div>
        <div>

        </div>
        <div id="chartContainer">
            <canvas id="DeliveryChart"></canvas>
            <canvas id="MostOrderedDishChart"></canvas>

        </div>
       

        @endsection
        @section("jss")
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const ctx = document.getElementById('DeliveryChart');
                const ctx2 = document.getElementById('MostOrderedDishChart');
                var spans = document.querySelectorAll('.col[data-delivery]');
                var spans2 = document.querySelectorAll('.col[data-most]');
                labels = [];
                values = [];
                labels2 = [];
                values2 = [];
                spans.forEach(function (span) {
                    labels.push(span.getAttribute('data-method'));
                    values.push(span.getAttribute('data-value'));
                });
                spans2.forEach(function (span) {
                    labels2.push(span.getAttribute('data-method'));
                    values2.push(span.getAttribute('data-value'));
                });
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: '# of Orders with Delivery Method',
                            data: values,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
                new Chart(ctx2, {
                    type: 'doughnut',
                    data: {
                        labels: labels2,
                        datasets: [{
                            label: 'Dishes with most orders',
                            data: values2,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>

@endsection
