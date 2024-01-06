@extends('layouts.home')

@section('home-css')

    <link rel="stylesheet" href='{{ asset("build/assets/css/checkout.css") }}'>

@endsection
@section("nav")


@endsection
@section('content')
    <div class=" bg-color pad100">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">

                    <div>
                        <div role="tabpanel">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Date</th>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Items</th>
                                        <th class="text-center" scope="col">Order Total</th>
                                        <th class="text-center" scope="col">Payment Status</th>
                                        <th class="text-center" scope="col">Delivery</th>
                                        <th class="text-center" scope="col">Customer</th>
                                        <th class="text-center" scope="col">Comment</th>
                                        <th class="text-center" scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="inner-box">
                                        <th scope="row">
                                            <div>
                                                <span>13:30</span>
                                                <p></p>
                                            </div>
                                        </th>
                                        <td>
                                            <div>
                                                <span>#5314124</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="event-wrap">
                                                <div class="meta">
                                                    <div>
                                                        <span class="text-warning">Pending</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="r-no">
                                                <p>Pizza Margheritta</p>
                                                <p>Pasta Bolognese</p>
                                                <p>Panna Cotta</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <p>25.00 $</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="text-success">Confirmed</span>

                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span >Yes</span>

                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <p class="btn btn-info">Data</p>

                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span >Second floor</span>

                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <i class="fa-solid fa-gear"></i>
                                                <i class="fa-solid fa-map"></i>
                                                <i class="fa-solid fa-ban"></i>
                                            </div>
                                        </td>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>




                                    </tbody>
                                </table>
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
