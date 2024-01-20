@extends('layouts.home')

@section('home-css')
    <link rel="stylesheet" href='{{ asset("build/assets/css/checkout.css") }}' xmlns="http://www.w3.org/1999/html">
    <style>
        #chartContainer {
            display: flex;
            max-width: 350px;
            gap: 3rem;
        }
        .modalData
        {
            font-weight: bold;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

@endsection
@section("nav")
@endsection
@section('content')
    <x-admin-link/>
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
                        <livewire:statistic-buttons
                        :order="$order"
                        />
                    </div>
                </div>


            @endforeach
            <livewire:show-customer-modal />
            <livewire:show-delivery-modal />

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
                <span disabled class="col" data-most data-method="{{$dish->DishName}}"
                      data-value="{{$dish->TotalOrders}}"></span>

            @endforeach
        </div>
        <div>
            @foreach($soFarBestMonth as $month)
                <span disabled class="col" data-month="{{$month->MonthName}}"
                      data-value="{{$month->TotalOrders}}"></span>

            @endforeach
        </div>
        @can('isAdmin')
            <div id="chartContainer">
                <canvas id="DeliveryChart"></canvas>
                <canvas id="MostOrderedDishChart"></canvas>
                <canvas id="SoFarBestThreeMonthsChart"></canvas>
            </div>
        @endcan


        @endsection
        @section("jss")
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const ctx = document.getElementById('DeliveryChart');
                const ctx2 = document.getElementById('MostOrderedDishChart');
                const ctx3 = document.getElementById('SoFarBestThreeMonthsChart');
                var spans = document.querySelectorAll('.col[data-delivery]');
                var spans2 = document.querySelectorAll('.col[data-most]');
                var spans3 = document.querySelectorAll('.col[data-month]');
                labels = [];
                values = [];
                labels2 = [];
                values2 = [];
                labels3 = [];
                values3 = [];
                spans.forEach(function (span) {
                    labels.push(span.getAttribute('data-method'));
                    values.push(span.getAttribute('data-value'));
                });
                spans2.forEach(function (span) {
                    labels2.push(span.getAttribute('data-method'));
                    values2.push(span.getAttribute('data-value'));
                });
                spans3.forEach(function (span) {
                    labels3.push(span.getAttribute('data-month'));
                    values3.push(span.getAttribute('data-value'));
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
                                display: false

                            },
                            x: {
                                display: false
                            }
                        },
                        responsive: true,
                    }
                });
                new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: labels2,
                        datasets: [{
                            label: 'Dishes with most orders',
                            data: values2,
                            borderWidth: 1
                        }]
                    },
                    options: {

                        plugins: {
                            legend: {
                                labels: {
                                    boxWidth: 60,


                                },
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                    }
                });
                new Chart(ctx3, {
                    type: 'doughnut',
                    data: {
                        labels: labels3,
                        datasets: [{
                            label: 'Dishes with most orders',
                            data: values3,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                display: false

                            },
                            x: {
                                display: false
                            }
                        },
                        plugins: {
                            legend: {
                                labels: {
                                    boxWidth: 60,
                                },
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                    }
                });
            </script>
            <script>

            window.addEventListener('openAddressModal', event => {
                    $("#addressModal").modal('show');
                })
            window.addEventListener('openCustomerModal', event => {
                $("#customerModal").modal('show');
            })

            </script>
@endsection
