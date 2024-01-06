<?php

namespace App\Livewire;

use App\Models\Dish;
use App\Models\Pizza;
use App\Models\PizzaIngredient;
use App\Models\PizzaIngredients;
use Livewire\Attributes\On;
use Livewire\Component;

class PizzaList extends Component
{
    public Pizza $model;

    public $pizzas;

    public $piizzas_ingredients;

    public $name;

    public $price;

    public $description;

    public $ingredients;

    public $edit_pizza_data=[];
    public function __construct()
    {

        $this->model = new Pizza();

        $this->pizzas = $this->model->all();

        $this->piizzas_ingredients = PizzaIngredient::all("id","pizza_ingredient_name");



    }
    protected $rules = [
        'name' => 'required|min:6',
        'price' => 'required|numeric|min:0',
        'description' => 'min:6',
        'ingredients' => 'required',
    ];

    public function render()
    {
        return view('livewire.pizza-list');
    }

    #[On('deletePizza')]
    public function delete($id)
    {
        $pizza = Pizza::find($id);
        $dish = Dish::first()->where('pizza_id', $id);
        $pizza_ing = PizzaIngredients::where('pizza_id', $id)->get();
        if ($pizza) {

            foreach ($pizza_ing as $item) {
                $item->delete();
            }
            $dish->delete();
            $pizza->delete();
            $this->pizzas = $this->model->all();
        }
    }
    public function edit($id)
    {
        $pizza = Pizza::find($id);
        if ($pizza) {
            $pizza->update([
                'pizza_name' => $this->name,
                'pizza_price' => $this->price,
                'pizza_description' => $this->description,
            ]);
            $this->pizzas = $this->model->all();
        }
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        $this->validate();
// Execution doesn't reach here if validation fails.
        $pizza = Pizza::create([
            'pizza_name' => $this->name,
            'pizza_price' => $this->price,
            'pizza_description' => $this->description,
        ]);
        foreach ($this->ingredients as $ingredient) {
            PizzaIngredients::create([
                'pizza_id' => $pizza->id,
                'pizza_ingredient_id' => $ingredient,
            ]);
        }
        $dish =  Dish::create([
            'pizza_id' => $pizza->id,
            'dish_type_id' => 4,
            'dish_name' => $this->name,
            'dish_description' => $this->description,
            'dish_price' => $this->price,
        ]);
        $this->pizzas = $this->model->all();
    }

    public function alertSuccess()
    {
        $this->dispatch('swal:modal', type: 'success',message: 'User Created Successfully!',text: 'It will list on users table soon.');

    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function editConfirm($id) : void
    {
        $this->dispatch('swal:edit', id: $id);

    }
    public function alertConfirm($id) : void
    {
        $this->dispatch('swal:confirm',id: $id, type: 'warning',message: 'Are you sure?',text: 'If deleted, you will not be able to recover this pizza entry!');

    }

}
