@extends('layouts.home')

@section('home-css')
    <link rel="stylesheet" href='{{ asset("build/assets/css/checkout.css") }}'>

@endsection

@section('nav')
    {{-- Your navigation content --}}
@endsection

@section('content')
    <x-admin-link/>
    <livewire:users-list />
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
                .then((willDelete) => {
                    if (willDelete) {
                        Livewire.dispatch("deleteUser", {id: event.detail.id});
                    }
                });
        });



    </script>
@endsection
