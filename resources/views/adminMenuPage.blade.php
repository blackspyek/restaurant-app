@extends('layouts.home')

@section('home-css')
    <link href="{{ asset('build/assets/css/menu.css') }}" rel="stylesheet">

@endsection
@section("nav")
    <x-logout-button></x-logout-button>
@endsection
@section('content')

    <h2>Hello,<br> {{ $user->name }}</h2>
    @can('isAdmin')
        <div class="card" style="width: 18rem;">

            <div class="card-body">
                <h5 class="card-title">Change Menu</h5>
                <p class="card-text">This panel allows you to customize and modify the menu options for your
                    restaurant</p>
                <a href="{{route("changeMenu")}}" class="btn btn-primary">Take me</a>
            </div>
        </div>
    @endcan
    <div class="card text-left" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Orders</h5>
            <p class="card-text">This panel allows you to manage and modify the orders for your restaurant</p>
            <a href="{{ route("showList") }}" class="btn btn-primary">Take me</a>
        </div>
    </div>

    <div class="card text-right" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Raport</h5>
            <p class="card-text">This panel allows you to generate statistical raport and statisctial graphs, or check orders</p>
            <a href="{{ route("showStatistics") }}" class="btn btn-primary">Take me</a>
        </div>
    </div>
    @can('isAdmin')
        <div class="card text-right" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">User List</h5>
                <p class="card-text">This panel allows you to manage users across the system.</p>
                <a href="{{ route("userList") }}" class="btn btn-primary">Take me</a>
            </div>
        </div>
    @endcan
@endsection
