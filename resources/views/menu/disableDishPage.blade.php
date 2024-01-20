@extends('layouts.home')

@section('home-css')
    <link rel="stylesheet" href='{{ asset("build/assets/css/checkout.css") }}' xmlns="http://www.w3.org/1999/html">

@endsection
@section("nav")

@endsection
@section('content')
        <x-admin-link/>
        <livewire:disable-dish/>
@endsection
@section("jss")

@endsection
