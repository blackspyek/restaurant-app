@extends('layouts.home')

@section('css')
    <link href="{{ asset('build/assets/css/menu.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container">
        <div class="row ">
            @unless(count($pizzas) == 0)
                <div class="col-sm ">
                    <h2 class="t-category text-center">Pizza</h2>
                    @foreach($pizzas as $item)
                        <div class="row  pb-3">
                            <div class="col-8 pt-1">
                                <h3>
                                    <img class="plus"
                                         data-type="Pizza"
                                         data-name="{{ $item['pizza_name'] }}"
                                         data-price="{{ $item['pizza_price'] }}"
                                         src="{{ asset('build/assets/img/global/plus.svg') }}"
                                         alt="plus">
                                    {{ $item['pizza_name'] }}

                                </h3>

                            </div>
                            <div class="col-4">
                                <span class="name ">{{ $item['pizza_price'] }}</span>
                            </div>
                            <span class="desc">
                                @foreach($item["ingredients"] as $ingredient)

                                    @if($loop->last)
                                        {{ $ingredient["pizza_ingredient_name"] }}
                                    @else
                                        {{ $ingredient["pizza_ingredient_name"] }},
                                    @endif
                                @endforeach

                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <h2>No menu items found</h2>
            @endunless
            @unless(count($pastas) == 0 )
                <div class="col-sm">
                    <h2 class="t-category text-center">Pasta</h2>
                    @foreach($pastas as $item)
                        <div class="row">
                            <div class="col-10 pt-1">
                                <h3>
                                    <img class="plus"
                                         data-type="Pasta"
                                         data-name="{{ $item['dish_name'] }}"
                                         data-price="{{ $item['dish_price'] }}"
                                         src="{{ asset('build/assets/img/global/plus.svg') }}"
                                         alt="plus">
                                    {{ $item['dish_name'] }}
                                </h3>
                            </div>
                            <div class="col-2">
                                <span class="name ">{{ $item['dish_price'] }}</span>
                            </div>
                            <span class="desc">
                                {{ $item['dish_description'] }}

                            </span>
                        </div>
                    @endforeach

                </div>
            @else
                <h2>No menu items found</h2>
            @endunless

            <div class="col-sm">
                <div class="row">
                    <div class="col-sm">
                        <h2 class="t-category text-center">Appetizers</h2>

                        @foreach($appetizers as $item)
                            <div class="row">
                                <div class="col-10 pt-1">
                                    <h3>
                                        <img class="plus"
                                             data-type="Appetizer"
                                             data-name="{{ $item['dish_name'] }}"
                                             data-price="{{ $item['dish_price'] }}"
                                             src="{{ asset('build/assets/img/global/plus.svg') }}"
                                             alt="plus">
                                        {{ $item['dish_name'] }}
                                    </h3>
                                </div>
                                <div class="col-2">
                                    <span class="name ">{{ $item['dish_price'] }}</span>
                                </div>

                                <span class="desc">
                                                {{ $item['dish_description'] }}

                                            </span>
                            </div>
                        @endforeach

                    </div>

                </div>
                <div class="row">
                    <div class="col-sm">
                        <h2 class="t-category text-center">Desserts</h2>

                        @foreach($desserts as $item)
                            <div class="row">
                                <div class="col-10 pt-1">
                                    <h3>
                                        <img class="plus"
                                             data-type="Dessert"
                                             data-name="{{ $item['dish_name'] }}"
                                             data-price="{{ $item['dish_price'] }}"
                                             src="{{ asset('build/assets/img/global/plus.svg') }}"
                                             alt="plus">
                                        {{ $item['dish_name'] }}
                                    </h3>
                                </div>
                                <div class="col-2">
                                    <span class="name ">{{ $item['dish_price'] }}</span>
                                </div>

                                <span class="desc">
                                                {{ $item['dish_description'] }}
                                            </span>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>


    </div>

@endsection
