@extends('layouts.home')

@section('home-css')
    <link rel="stylesheet" href='{{ asset("build/assets/css/checkout.css") }}'>

@endsection
@section("nav")

@endsection
@section('content')
    <form>
        <div class="container">
            <div id="mainRow" class="row gap-2">
                <div class="col-8">
                    <div class="row gap-3 mb-3">
                        <div class="d-flex align-items-center gap-3 border rounded p-3 ">
                            <div>
                                <i class="fa-solid fa-truck"></i>
                            </div>
                            <div class="card gap-0">
                                <h5 class="card-title mb-0 fw-bolder">Delivery method</h5>
                                <p class="card-text">Select delivery method</p>

                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 border rounded p-3">
                            <div>
                                <i class="fa-solid fa-money-bill"></i>
                            </div>
                            <div class="card">
                                <h5 class="card-title mb-0 fw-bolder">Payment method</h5>
                                <p class="card-text">Select payment method</p>

                            </div>
                        </div>
                    </div>

                    <div class="container orderData">
                        <h4 class="mb-3">Delivery Address</h4>

                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="streetName">Street</label>
                                    <input type="text" class="form-control" id="streetName"
                                           aria-describedby="streetHelp" placeholder="Enter street name"
                                           maxlength="250"
                                           required pattern="^[A-Za-z0-9\s.'-]{2,}$">
                                </div>
                            </div>
                            <div class="col colGap">
                                <div class="form-group">
                                    <label for="buildingNumber">Building number</label>
                                    <input type="text" class="form-control" id="buildingNumber"
                                           aria-describedby="buildingNumberHelp" placeholder="Enter building number"
                                           required
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="gatewayCode">Gateway code (optional)</label>
                                    <input type="text" class="form-control" id="gatewayCode"
                                           aria-describedby="gatwayCode" placeholder="Enter gateway code"
                                           maxlength="25"
                                    >

                                </div>
                            </div>
                            <div class="col ">

                            </div>
                        </div>
                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city"
                                           aria-describedby="citylHelp" placeholder="Enter city"
                                           maxlength="250"
                                           required
                                    >
                                </div>
                            </div>
                            <div class="col colGap">
                                <div class="form-group">
                                    <label for="apartamentNumber">Apartment number (optional)</label>
                                    <input type="text" class="form-control" id="apartamentNumber"
                                           aria-describedby="apartamentlHelp" placeholder="Enter apartment number"
                                           maxlength="10"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="floor">Floor (optional)</label>
                                    <input type="text" class="form-control" id="floor"
                                           aria-describedby="floorHelp" placeholder="Enter floor"
                                           maxlength="10"
                                           pattern="[a-zA-Z0-9]+"
                                    >

                                </div>
                            </div>
                            <div class="col colGap">
                                <div class="form-group">
                                    <label for="zipCode">Zip code</label>
                                    <input type="text" class="form-control" id="zipCode"
                                           aria-describedby="zipCodeHelp" placeholder="Enter zip code"
                                           minlength="5"
                                           pattern="[0-9]{2}-[0-9]{3}"
                                           required
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="companyName">Company name (optional)</label>
                                    <input type="text" class="form-control" id="companyName"
                                           aria-describedby="emailHelp" placeholder="Enter company name"
                                           maxlength="100"
                                    >
                                </div>
                            </div>
                            <div class="col colGap">
                                <div class="form-group">
                                    <label for="note">Add a note (optional)</label>
                                    <input type="text" class="form-control" id="note"
                                           aria-describedby="noteHelp" placeholder="
e.g.: Please do not use the bell. The baby is sleeping."
                                           maxlength="250"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container orderData">
                        <h4 class="mb-3 mt-3 ">Personal data</h4>

                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="name">First and Last name</label>
                                    <input type="text" class="form-control" id="name"
                                           aria-describedby="nameHelp" placeholder="Enter your first and last name"
                                           maxlength="150"
                                           required
                                    >
                                </div>
                            </div>
                            <div class="col colGap">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email"
                                           aria-describedby="emailHelp" placeholder="youremail@email.com"
                                           maxlength="150"
                                           required
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="phoneNumber">Phone number</label>
                                    <input type="tel" class="form-control" id="phoneNumber"
                                           aria-describedby="phoneNumberHelp" placeholder="Enter your phone number"
                                           pattern="[0-9]{9}"
                                           required
                                    >
                                </div>
                            </div>
                            <div class="col">

                            </div>
                        </div>
                        <div class="d-flex formBtns">
                            <button type="submit" class="btn btn-light">Cancel</button>

                            <button type="submit" class="btn btn-warning">Order</button>
                        </div>
                    </div>


                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Order</h5>
                            <div class="card-text">
                                <ul class="list-group list-group-light">
                                    <li class="list-group-item">
                                        <div class=" d-flex gap-3">
                                            <p class="qty">2</p>
                                            <p class="name">Pizza Margherita</p>
                                            <p class="price">20.00 $</p>
                                        </div>
                                        <p class="m-1">Sos, ser</p>

                                    </li>
                                    <li class="list-group-item">
                                        <div class=" d-flex gap-3">
                                            <p class="qty">1</p>
                                            <p class="name">Pasta Carbonara</p>
                                            <p class="price">15.00 $</p>
                                        </div>

                                    </li>
                                </ul>


                            </div>
                            <p>Summary: 35.00 $</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </form>
@endsection
