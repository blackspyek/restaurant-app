@extends('layouts.home')

@section('home-css')
    <link rel="stylesheet" href='{{ asset("build/assets/css/checkout.css") }}'>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
            integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
@endsection

@section('nav')
    {{-- Your navigation content --}}
@endsection

@section('content')
    <x-admin-link/>

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
                                    <div wire:ignore>
                                        <livewire:show-order-management-modal />
                                    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        window.addEventListener('swal:showCustomer', event => {
            swal({
                text: event.detail.text,
                icon: "info",
            });
        });
        window.addEventListener('swal:confirmOrder', event => {
            swal({
                title: "Are you sure",
                text: "Please enter how much time to proceed the order:", // Optional text shown above the input
                content: {
                    element: "input", // Type of HTML element
                    attributes: {
                        placeholder: "Type time in minutes", // Placeholder text for the input
                        type: "number", // Specify the type as text
                    },
                },
                buttons: true,
                dangerMode: true,
            })
                .then((willAccept) => {
                    if (willAccept) {
                        const time = willAccept; // The text input value is stored in willAccept
                        Livewire.dispatch("acceptOrder", {id: event.detail.id, time: time, employeeId: {{$user->id}}});
                    }
                });
        });

    </script>
    <script>
        window.addEventListener('openManagementModal', event => {
            $("#managementModal").modal('show');
        })
        window.addEventListener('closeManagementModal', event => {
            $("#managementModal").modal('hide');
        });
    </script>

@endsection
