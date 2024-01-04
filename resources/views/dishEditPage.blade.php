@extends('layouts.home')
@section('home-css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dish Update</div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('updateDish', $dish["id"]) }}">
                            @csrf
                            <label for="dish_name">Dish Name</label>
                            <input name="dish_name" type="text" class="form-control" id="dish_name" value="{{$dish["dish_name"]}}" minlength="6" required>

                            <label for="pizza_description">Pizza Description</label>
                            <input name="dish_description" type="text" class="form-control" id="dish_description" value="{{$dish["dish_description"]}}" required>
                            <label for="dish_type_id">Dish Ingredients</label>
                            <select name="dish_type_id" id="dish_type_id" class="form-control" required>
                                @foreach($dish_types as $type)
                                    <option {{$dish['dish_type_id'] == $type['id'] ? 'selected="selected"' : "" }} value="{{ $type["id"] }}">{{ $type["dish_type_name"] }} </option>
                                @endforeach
                            </select>

                            <label for="dish_price">Dish Price</label>
                            <input name="dish_price" type="number"  class="form-control" id="dish_price" value="{{$dish["dish_price"]}}" required>
                            <a href="{{route("changeMenuDish")}}"><button type="submit" class="btn btn-danger">Back</button></a>
                            <button type="submit" class="btn btn-primary">Save</button>

                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
@section("jss")

@endsection
