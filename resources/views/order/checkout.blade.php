@extends('layouts.home')

@section('home-css')
    <link rel="stylesheet" href='{{ asset("build/assets/css/checkout.css") }}' xmlns="http://www.w3.org/1999/html">

@endsection
@section("nav")

@endsection
@section('content')


    <livewire:delivery-modal/>
    <livewire:payment-modal/>
    <form>
        <div class="container">
            <div id="mainRow" class="row gap-2">
                <div class="col-8">
                    <livewire:order-modal/>

                    <livewire:order-client-data/>


                </div>

                <livewire:order-listing/>

            </div>

        </div>
    </form>
    <script>
        import { Modal, Ripple, initMDB } from "mdb-ui-kit";

        initMDB({ Modal, Ripple });

    </script>
@endsection
