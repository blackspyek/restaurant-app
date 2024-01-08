@extends('layouts.home')

@section('home-css')
    <link rel="stylesheet" href='{{ asset("build/assets/css/checkout.css") }}' xmlns="http://www.w3.org/1999/html">

@endsection
@section("nav")

@endsection
@section('content')


    <livewire:order-checkout/>
    <script>
        import { Modal, Ripple, initMDB } from "mdb-ui-kit";

        initMDB({ Modal, Ripple });

    </script>
@endsection
@section("jss")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        window.addEventListener('swal:confirm', event => {
            swal({
                title: event.detail.message,
                text: event.detail.text,
                icon: event.detail.type,
                buttons: true,
                dangerMode: true,
            })
                .then((submitOrder) => {
                    if (submitOrder) {
                        Livewire.dispatch("submitOrder");
                    }
                });
        });



    </script>
@endsection
