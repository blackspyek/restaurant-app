
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pizza List</div>
                <div class="card-body">
                    <div class="row">
                        @foreach($dishes as $dish)
                            <div wire:key="{{ $dish['id'] }}" class="col-md-4">
                                <div class="card">

                                    <h3 class="card-header">{{ $dish["dish_name"] }} </h3>
                                    <div wire:key="{{ $dish['id'] }}"class="card-body">
                                        <p>{{ $dish["dish_description"] }}</p>
                                        <p>Price: {{ $dish["dish_price"] }}$</p>
                                        <a href="{{route('editDish', $dish['id'])}}">
                                            <button class="btn btn-primary" >Edit</button>
                                        </a>

                                        <button type="button" wire:click="alertConfirm({{ $dish['id'] }})" class="btn btn-danger">Delete</button>
                                    </div>


                                </div>
                            </div>

                        @endforeach
                            <form wire:submit.prevent="save">
                                <label for="dish_name">Dish Name</label>
                                <input type="text" wire:model="name" class="form-control" id="dish_name" placeholder="Dish Name" minlength="6" required>
                                @error('name') <p class="error">{{ $message }}</p> @enderror

                                <label for="dish_description">Dish Description</label>
                                <input type="text" wire:model="description" class="form-control" id="dish_description" placeholder="Dish Description" minlength="6" required>
                                @error('description') <p class="error">{{ $message }}</p> @enderror

                                <label for="ingredients">Dish Ingredients</label>
                                <select id="ingredients" wire:model="type" class="form-control" required>
                                    @foreach($dishTypes as $dtype)
                                        <option value="{{ $dtype["id"] }}">{{ $dtype["dish_type_name"] }}</option>
                                    @endforeach
                                </select>
                                @error('type') <p class="error">{{ $message }}</p> @enderror

                                <label for="dish_price">Dish Price</label>
                                <input type="number" wire:model="price" class="form-control" id="dish_price" placeholder="Dish Price" min="0" required>
                                @error('price') <p class="error">{{ $message }}</p> @enderror

                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>



                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

