@extends('layouts.home')

@section('home-css')
    <link rel="stylesheet" href='{{ asset("build/assets/css/checkout.css") }}' xmlns="http://www.w3.org/1999/html">
    <style>
        #deliveryGuy{
            max-width: 200px;
        }
    </style>
@endsection
@section("nav")

@endsection
@section('content')
    <div class="d-flex flex-column acceptedInfo">
        @if($params["orderStatus"] == 2)
        <h1 class="acceptedInfoHeader">Great news! Your order has been successfully accepted! 🎉</h1>
        <div class="acceptedInfoChild">
            <p class="acceptedInfoParagraph">Our team is now busy preparing your items for dispatch. </p>
            <p class="acceptedInfoParagraph">You will
                receive a confirmation email
                shortly
                with all the details</p>
            <p class="acceptedInfoParagraph">
                We appreciate your trust in our service. If you have any questions or need further assistance,
                don't
                hesitate to contact our customer support. </p>
            <p class="acceptedInfoParagraph">
                Thank you for choosing us, and we look forward to
                delighting
                you with your purchase!
            </p>
        </div>
        <div id="deliveryGuy">
            <img src="{{ asset('build/assets/img/global/pizza_delivery.jpg') }}" class="img-fluid" alt="Pizza guy"/>
        </div>
        @elseif($params["orderStatus"] == 7)
            <h1 class="acceptedInfoHeader">We are sorry, but your order has been declined. 😔</h1>
            <div class="acceptedInfoChild">
                <p class="acceptedInfoParagraph">
                    We appreciate your trust in our service. If you have any questions or need further assistance,
                    don't
                    hesitate to contact our customer support. </p>
                <p class="acceptedInfoParagraph">
                    Thank you for choosing us, and we look forward to
                    delighting
                    you with your purchase!
                </p>
            </div>
            <div id="deliveryGuy">
                <img src="{{ asset('build/assets/img/global/pizza_delivery.jpg') }}" class="img-fluid" alt="Pizza guy"/>
            </div>
        @endif

    </div>

@endsection

