@extends('layouts.home')
@section("home-css")
    <link href="{{ asset('build/assets/css/home.css') }}" rel="stylesheet">

@endsection
@section("nav")
    <x-nav-items/>
@endsection
@section('content')
    <section id="info" class="ps-4 ">
        <h1 id="m_h">Italian Restaurant</h1>
        <p id="m_txt">Welcome to "Amore di Pasta", an authentic Italian restaurant located in the heart of downtown. We
            pride ourselves on serving delicious, home-style Italian cuisine made with the freshest ingredients. Our
            menu
            features a wide variety of classic Italian dishes, including homemade pasta, wood-fired pizza, and fresh
            seafood. Our cozy and inviting atmosphere is perfect for a romantic evening, a family dinner, or a night out
            with friends. Our experienced staff is dedicated to providing excellent service and ensuring that your
            dining
            experience is a memorable one. Join us for a taste of Italy and discover why "Amore di Pasta" is one of the
            most popular Italian restaurants in town.</p>
    </section>

    <section id="bg-gads" class="text-center">
        <h2 id="nav_baner">What We Offer</h2>

        <div id="carousel" class="carousel slide" data-mdb-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-mdb-interval="2000">
                    <img src="./static/img/smartphone/nav_1.png" alt="Pizza">
                </div>
                <div class="carousel-item">
                    <img src="./static/img/smartphone/nav_2.png" data-mdb-interval="2000" alt="Italian Food">
                </div>
                <div class="carousel-item">
                    <img src="./static/img/smartphone/nav_3.png" data-mdb-interval="2000" alt="Pasta">
                </div>
            </div>
        </div>
        <div id="offers" class="d-flex justify-content-evenly m-5">
            <div>
                <img src="{{ asset('build/assets/img/computer/nav_1.png') }}" class="img-fluid" alt="Pizza">
            </div>
            <div>
                <img src="{{ asset('build/assets/img/computer/nav_2.png') }}" class="img-fluid" alt="Italian Food">
            </div>
            <div>
                <img src="{{ asset('build/assets/img/computer/nav_3.png') }}" class="img-fluid" alt="Pasta">
            </div>
        </div>
        <a class="btn btn-rounded text-white nav-btn" style="background-color: #06C167" href="{{route("menu")}}" role="button">
            <span style="color: black;">Menu</span>
        </a>
    </section>

    <section class="c_bg">
        <div class="grid_item">
            <h2 class="text-center" id="opening_time_h">Check Us Out!</h2>
            <div>
                <table>
                    <tbody>
                    <tr>
                        <td>Monday</td>
                        <td>12am - 8pm</td>
                    </tr>
                    <tr>
                        <td>Tuesday</td>
                        <td>12am - 8pm</td>
                    </tr>
                    <tr>
                        <td>Wednesday</td>
                        <td>12am - 8pm</td>
                    </tr>
                    <tr>
                        <td>Thursday</td>
                        <td>12am - 8pm</td>
                    </tr>
                    <tr>
                        <td>Friday</td>
                        <td>8am - 11pm</td>
                    </tr>
                    <tr>
                        <td>Saturday</td>
                        <td>12am - 12pm</td>
                    </tr>
                    <tr>
                        <td>Sunday</td>
                        <td>8am - 10pm</td>
                    </tr>
                    </tbody>


                </table>
                <div class="text-center">
                    <a id="btn-menu" class=" btn btn-rounded text-white nav-btn m-3" style="background-color: #000000"
                       href="{{route("menu")}}" role="button">
                        <span style="color: #06C167;">Order</span>
                    </a>
                </div>
            </div>
        </div>
        <div id="map" class="grid_item">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2497.977751109396!2d22.547119415083255!3d51.23790463819359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x472257708e39ab21%3A0x3bcc91491891bf3e!2sNadbystrzycka%2021B%2C%2020-618%20Lublin!5e0!3m2!1sen!2spl!4v1681158513293!5m2!1sen!2spl"
                style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Special Offer</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modal-body" class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <a href="#map" class="btn btn-primary">Yes!!</a>
                </div>
            </div>
        </div>
    </div>
@endsection
