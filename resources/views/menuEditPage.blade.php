@extends('layouts.home')
@section('home-css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Pizza Update</div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('updatePizza', $pizza["id"]) }}">
                            @csrf
                            <label for="pizza_name">Pizza Name</label>
                            <input name="pizza_name" type="text" class="form-control" id="pizza_name" value="{{$pizza["pizza_name"]}}" >
                            <label for="pizza_description">Pizza Description</label>
                            <input name="pizza_description" type="text" class="form-control" id="pizza_description" value="{{$pizza["pizza_description"]}}">
                            <label for="ingredients">Pizza Ingredients</label>

                            <select name="pizza_ingredients[]" id="ingredients" class="form-control" multiple>
                                @foreach($piizzas_ingredients as $ingredient)
                                    <option {{in_array($ingredient["id"], $OnPizzaIngredients) ? 'selected="selected"' : "" }} value="{{ $ingredient["id"] }}">{{ $ingredient["pizza_ingredient_name"] }} </option>
                                @endforeach
                            </select>

                            <label for="pizza_price">Pizza Price</label>
                            <input name="pizza_price" type="number"  class="form-control" id="pizza_price" value="{{$pizza["pizza_price"]}}">
                            <a href="{{route("changeMenu")}}"><button type="submit" class="btn btn-danger">Back</button></a>
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
