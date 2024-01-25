@extends('layouts.home')
@section('home-css')
    <style>
        .card-text{
            min-height: 60px;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">

@endsection
@section('content')

    <div style="position: relative;top: 15px">
        <x-admin-link/>
    </div>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        @can('isAdmin')
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img class="card-img-top" src="{{ asset('build/assets/img/global/pizza.jpg') }}" alt="Pizza">
                    <div class="card-body">
                        <h5 class="card-title">Pizza</h5>
                        <p class="card-text">UI for modyfing pizzas in the menu</p>
                        <a href="{{route('changeMenuPizza')}}" class="btn btn-primary">Take me</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <img class="card-img-top" src="{{ asset('build/assets/img/global/pasta.jpg') }}" alt="Pasta">
                    <div class="card-body">
                        <h5 class="card-title">Dish</h5>
                        <p class="card-text">UI for modyfing dishes in the menu</p>
                        <a href="{{route('changeMenuDish')}}" class="btn btn-primary">Take me</a>
                    </div>
                </div>
            </div>
            @endcan
            <div class="col-md-4">
                <div class="card mb-4">
                    <img class="card-img-top" src="{{ asset('build/assets/img/global/pasta.jpg') }}" alt="Pasta">
                    <div class="card-body">
                        <h5 class="card-title">Disable Dish</h5>
                        <p class="card-text">UI for setting dishes as unavailable</p>
                        <a href="{{route('disableDish')}}" class="btn btn-primary">Take me</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
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
                        Livewire.dispatch("deletePizza", {id: event.detail.id});
                        console.log("willDelete");
                    }
                });
        });



    </script>
@endsection
