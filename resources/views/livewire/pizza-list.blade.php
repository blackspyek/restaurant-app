
<div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pizza List</div>
                <div class="card-body">
                    <div class="row">
                        @foreach($pizzas as $pizza)
                            <div wire:key="{{ $pizza['id'] }}" class="col-md-4">
                                <div class="card">

                                    <h3 class="card-header">{{ $pizza["pizza_name"] }} </h3>
                                    <div wire:key="{{ $pizza['id'] }}"class="card-body">
                                        <p>{{ $pizza["pizza_description"] }}</p>
                                        <p>Price: {{ $pizza["pizza_price"] }}$</p>
                                        <a href="{{route('editPizza', $pizza['id'])}}">
                                            <button class="btn btn-primary" >Edit</button>
                                        </a>

                                        <button type="button" wire:click="alertConfirm({{ $pizza['id'] }})" class="btn btn-danger">Delete</button>
                                    </div>


                                </div>
                            </div>

                        @endforeach


                            <form wire:submit.prevent="save">
                                <label for="pizza_name">Pizza Name</label>
                                <input type="text" wire:model="name" class="form-control" id="pizza_name" placeholder="Pizza Name" required>
                                @error('name') <p class="error">{{ $message }}</p> @enderror

                                <label for="pizza_description">Pizza Description</label>
                                <input type="text" wire:model="description" class="form-control" id="pizza_description" placeholder="Pizza Description" required>
                                @error('description') <p class="error">{{ $message }}</p> @enderror

                                <label for="ingredients">Pizza Ingredients</label>
                                <select id="ingredients" wire:model="ingredients" class="form-control" multiple required>
                                    @foreach($piizzas_ingredients as $ingredient)
                                        <option value="{{ $ingredient["id"] }}">{{ $ingredient["pizza_ingredient_name"] }}</option>
                                    @endforeach
                                </select>
                                @error('ingredients') <p class="error">{{ $message }}</p> @enderror

                                <label for="pizza_price">Pizza Price</label>
                                <input type="text" wire:model="price" class="form-control" id="pizza_price" placeholder="Pizza Price" required>
                                @error('price') <p class="error">{{ $message }}</p> @enderror

                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

