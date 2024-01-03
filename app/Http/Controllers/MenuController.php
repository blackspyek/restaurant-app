<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Pizza;
use Illuminate\Http\Request;

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
        return view('menuPage',[
            'pizzas' => Pizza::getPizzasWithIngredientsArray(),
            'pastas' => $allPastas,
            'appetizers' => $allAppetizers,
            'desserts' => $allDesserts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
