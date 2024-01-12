@extends('layouts.home')

@section('home-css')
    <link rel="stylesheet" href='{{ asset("build/assets/css/checkout.css") }}'>

@endsection

@section('nav')
    {{-- Your navigation content --}}
@endsection

@section('content')
    <div class="bg-color pad100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div role="tabpanel">
                            <div class="table-responsive">
                                <div class="container">
                                    <div class="row">
                                        <span class="col">Date</span>
                                        <span class="col">Order ID</span>
                                        <span class="col">Status</span>
                                        <span class="col">Items</span>
                                        <span class="col">Order Total</span>
                                        <span class="col">Payment Status</span>
                                        <span class="col">Delivery</span>
                                        <span class="col">Customer</span>
                                        <span class="col">Comment</span>
                                        <span class="col">Action</span>
                                    </div>

                                    <livewire:order-list/>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /col end-->
            </div>
            <!-- /row end-->
        </div>
    </div>
@endsection

@section('jss')

@endsection
