<?php

namespace App\Http\Controllers;

use App\Livewire\DishList;
use App\Models\Dish;
use App\Models\DishType;
use App\Models\Pizza;
use App\Models\PizzaIngredient;
use App\Models\PizzaIngredients;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use function Laravel\Prompts\error;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allDishes = Dish::getDishInfo();
        $allPastas = $allDishes->where('dish_type_id', 1);
        $allAppetizers = $allDishes->where('dish_type_id', 2);
        $allDesserts = $allDishes->where('dish_type_id', 3);
        return view('menuPage', [
            'pizzas' => PizzaIngredients::getPizzaWithIngridients(),
            'pastas' => $allPastas,
            'appetizers' => $allAppetizers,
            'desserts' => $allDesserts,
            'session' => session()->all(),
        ]);
    }

    public function changeMenu()
    {
        return view('menuManagementPage');
    }

    public function changeMenuPizza()
    {
        return view('menuAdminPage');
    }

    public function changeMenuDish()
    {
        return view('dishAdminPage');
    }

    public function changeMenuDishType()
    {
        return view('dishTypeAdminMenu');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function editPizza(string $id)
    {
        return view('menuEditPage', [
            'OnPizzaIngredients' => PizzaIngredients::getArrayOfIngredients($id),
            'pizza' => Pizza::find($id),
            'piizzas_ingredients' => PizzaIngredient::all("id", "pizza_ingredient_name"),
        ]);
    }

    public function editDish(string $id)
    {
        return view('dishEditPage', [
            'dish' => Dish::find($id),
            'dish_types' => DishType::all("id", "dish_type_name"),
        ]);
    }

    public function editDishType(string $id)
    {
        return view('dishTypeEditPage', [
            'dishType' => DishType::find($id),
            'dish_types' => DishType::all("id", "dish_type_name"),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePizza(Request $request, string $id)
    {
        $tempPizza = Pizza::find($id);
        if ($tempPizza) {
            $validated = $request->validate([
                'pizza_name' => 'required|min:6',
                'pizza_price' => 'required|numeric|min:0',
                'pizza_description' => 'required|min:6',
            ]);
            $tempPizza->pizza_name = $request->pizza_name;
            $tempPizza->pizza_price = $request->pizza_price;
            $tempPizza->pizza_description = $request->pizza_description;
            $tempPizza->save();
            $pizza_ingredients = PizzaIngredients::where('pizza_id', $id)->get();

            $tempDish = Dish::where('pizza_id', $id)->first();
            $tempDish->dish_type_id = 4;
            $tempDish->dish_name = $request->pizza_name;
            $tempDish->dish_price = $request->pizza_price;
            $tempDish->dish_description = $request->pizza_description;
            $tempDish->save();
            foreach ($pizza_ingredients as $pizza_ingredient) {
                $pizza_ingredient->delete();
            }

            foreach ($request->pizza_ingredients as $pizza_ingredient) {
                PizzaIngredients::create([
                    'pizza_id' => $id,
                    'pizza_ingredient_id' => $pizza_ingredient,
                ]);
            }
        }
        return redirect()->route('changeMenuPizza');
    }

    public function updateDish(Request $request, string $id)
    {
        $validated = $request->validate([
            'dish_name' => 'required|min:6',
            'dish_price' => 'required|numeric|min:0',
            'dish_type_id' => 'required',
            'dish_description' => 'required|min:6',
        ]);
        $tempDish = Dish::find($id);
        $tempDish->dish_type_id = $request->dish_type_id;
        $tempDish->dish_name = $request->dish_name;
        $tempDish->dish_price = $request->dish_price;
        $tempDish->dish_description = $request->dish_description;

        $tempDish->save();


        return redirect()->route('changeMenuDish');
    }

    public function updateDishType(Request $request, string $id)
    {
        $validated = $request->validate([
            'dish_type_name' => 'required',
        ]);
        $tempDishType = DishType::find($id);
        $tempDishType->dish_type_name = $request->dish_type_name;

        $tempDishType->save();

        return redirect()->route('changeMenuDishType');
    }

}
