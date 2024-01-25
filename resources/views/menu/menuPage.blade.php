@extends('layouts.home')

@section('home-css')
    <link rel="stylesheet" href='{{ asset("build/assets/css/menu.css") }}'>

@endsection
@section("nav")
    <div class="position-relative">
        <livewire:basket-button/>
        <livewire:basket/>
    </div>
    <x-nav-items/>

@endsection
@section('content')
    <div class="container">
        <div class="row ">
            @unless(count($pizzas) == 0)
                <div class="col-sm ">
                    <h2 class="t-category text-center">Pizza</h2>
                    @foreach($pizzas as $item)
                        @if($item['status'] == 1)

                            <div class="row  pb-3">
                                <div class="col-8 pt-1">
                                    <h3>
                                        <livewire:add-to-basket-button
                                            :dishId="$item['id']"
                                        />

                                        {{ $item['dish_name'] }}
                                    </h3>

                                </div>
                                <div class="col-4 price">
                                    <p class="name ">{{ $item['dish_price'] }}</p>
                                </div>
                                <span class="desc">
                                @foreach($item['ingredients'] as $ingredient)
                                        @if($loop->last)
                                            {{ $ingredient }}
                                        @else
                                            {{ $ingredient }},
                                        @endif

                                    @endforeach
                            </span>
                            </div>
                        @endif

                    @endforeach
                </div>
            @else
                <h2>No menu items found</h2>
            @endunless
            @unless(count($pastas) == 0 )
                <div class="col-sm">
                    <h2 class="t-category text-center">Pasta</h2>
                    @foreach($pastas as $item)
                        @if($item->status == 1)
                            <div class="row">
                                <div class="col-10 pt-1">
                                    <h3>
                                        <livewire:add-to-basket-button
                                            :dishId="$item['id']"
                                        />
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
                        @endif
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
                            @if($item->status == 1)
                                <div class="row">
                                    <div class="col-10 pt-1">
                                        <h3>
                                            <livewire:add-to-basket-button
                                                :dishId="$item['id']"
                                            />
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
                            @endif
                        @endforeach

                    </div>

                </div>
                <div class="row">
                    <div class="col-sm">
                        <h2 class="t-category text-center">Desserts</h2>

                        @foreach($desserts as $item)
                            @if($item->status == 1)
                                <div class="row">
                                    <div class="col-10 pt-1">
                                        <h3>
                                            <livewire:add-to-basket-button
                                                :dishId="$item['id']"
                                            />
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
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>

        </div>


    </div>

@endsection
