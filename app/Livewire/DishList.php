<?php

namespace App\Livewire;

use App\Models\Dish;
use App\Models\DishType;
use App\Models\Pizza;
use App\Models\PizzaIngredient;
use App\Models\PizzaIngredients;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
class DishList extends Component
{

    public Dish $model;

    public $dishes;
    public $dishTypes;

    public $dish_types_id;

    public $type;

    public $name;

    public $description;

    public $price;

    public function __construct()
    {

        $this->model = new Dish();

        $this->dishes = $this->model->all();

        $this->dishTypes = DishType::all("id","dish_type_name");

        $this->dish_types_id = $this->dishTypes->pluck('id')->toArray();
    }

    protected $rules = [
        'name' => 'required|min:6',
        'price' => 'required|numeric|min:0',
        'type' => 'required',
        'description' => 'required|min:6',
    ];

    public function render()
    {
        return view('livewire.dish-list')->with('types', $this->dish_types_id);
    }
    #[On('deleteDish')]
    public function delete($id)
    {
        $dish = Dish::find($id);
        if ($dish) {
            $dish->delete();
            $this->dishes = $this->model->all();
        }
    }
    public function save()
    {
        $this->validate();
// Execution doesn't reach here if validation fails.

        $dish = Dish::create([
            'dish_type_id' => $this->type,
            'dish_name' => $this->name,
            'dish_price' => $this->price,
            'dish_description' => $this->description,
        ]);

        $this->dishes = $this->model->all();
    }
    public function alertConfirm($id) : void
    {
        $this->dispatch('swal:confirm',id: $id, type: 'warning',message: 'Are you sure?',text: 'If deleted, you will not be able to recover this Dish entry!');

    }

}
