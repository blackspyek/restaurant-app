<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Dish;
use App\Models\DishType;
use App\Models\Pizza;
use App\Models\PizzaIngredient;
use App\Models\PizzaIngredients;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Pizza Dummy Data
        Pizza::create([
            'pizza_name' => 'Pepperoni',
            'pizza_description' => 'Pepperoni, tomato sauce, mozzarella',
            'pizza_price' => 10.99,
        ]);
        Pizza::create([
            'pizza_name' => 'Margherita',
            'pizza_description' => 'Tomato sauce, mozzarella, basil',
            'pizza_price' => 9.99,
        ]);
        Pizza::create([
            'pizza_name' => 'Hawaiian',
            'pizza_description' => 'Tomato sauce, mozzarella cheese, ham, and pineapple chunks',
            'pizza_price' => 14.00,
        ]);
        Pizza::create([
            'pizza_name' => 'BBQ Chicken',
            'pizza_description' => 'BBQ sauce, mozzarella cheese, grilled chicken, and red onions.',
            'pizza_price' => 16.00,
        ]);
        Pizza::create([
            'pizza_name' => 'Veggie',
            'pizza_description' => 'Tomato sauce, mozzarella cheese, mushrooms, onions, bell peppers, and olives.',
            'pizza_price' => 15.00,
        ]);
        // Pizza Ingredient Dummy Data
        PizzaIngredient::create([
            'pizza_ingredient_name' => 'Pepperoni',
            'pizza_ingredient_description' => 'Pepperoni',
        ]);
        PizzaIngredient::create([
            'pizza_ingredient_name' => 'Tomato sauce',
            'pizza_ingredient_description' => 'Tomato sauce',
        ]);
        PizzaIngredient::create([
            'pizza_ingredient_name' => 'Mozzarella',
            'pizza_ingredient_description' => 'Mozzarella',
        ]);

        PizzaIngredient::create([
            'pizza_ingredient_name' => 'Basil',
            'pizza_ingredient_description' => 'Basil',
        ]);
        PizzaIngredient::create([
            'pizza_ingredient_name' => 'Ham',
            'pizza_ingredient_description' => 'Ham',
        ]);
        PizzaIngredient::create([
            'pizza_ingredient_name' => 'Pineapple chunks',
            'pizza_ingredient_description' => 'Pineapple chunks',
        ]);
        PizzaIngredient::create([
            'pizza_ingredient_name' => 'BBQ sauce',
            'pizza_ingredient_description' => 'BBQ sauce',
        ]);
        PizzaIngredient::create([
            'pizza_ingredient_name' => 'Grilled chicken',
            'pizza_ingredient_description' => 'Grilled chicken',
        ]);
        PizzaIngredient::create([
            'pizza_ingredient_name' => 'Red onions',
            'pizza_ingredient_description' => 'Red onions',
        ]);
        PizzaIngredient::create([
            'pizza_ingredient_name' => 'Mushrooms',
            'pizza_ingredient_description' => 'Mushrooms',
        ]);
        PizzaIngredient::create([
            'pizza_ingredient_name' => 'Bell peppers',
            'pizza_ingredient_description' => 'Bell peppers',
        ]);
        PizzaIngredient::create([
            'pizza_ingredient_name' => 'Olives',
            'pizza_ingredient_description' => 'Olives',
        ]);

        // Pizza Ingredients Pivot Table Dummy Data
        PizzaIngredients::create([
            'pizza_id' => 1,
            'pizza_ingredient_id' => 2,
        ]);
        PizzaIngredients::create([
            'pizza_id' => 1,
            'pizza_ingredient_id' => 3,
        ]);
        PizzaIngredients::create([
            'pizza_id' => 1,
            'pizza_ingredient_id' => 4,
        ]);

        PizzaIngredients::create([
            'pizza_id' => 2,
            'pizza_ingredient_id' => 2,
        ]);
        PizzaIngredients::create([
            'pizza_id' => 2,
            'pizza_ingredient_id' => 3,
        ]);
        PizzaIngredients::create([
            'pizza_id' => 2,
            'pizza_ingredient_id' => 1,
        ]);

        PizzaIngredients::create([
            'pizza_id' => 3,
            'pizza_ingredient_id' => 2,
        ]);
        PizzaIngredients::create([
            'pizza_id' => 3,
            'pizza_ingredient_id' => 3,
        ]);
        PizzaIngredients::create([
            'pizza_id' => 3,
            'pizza_ingredient_id' => 5,
        ]);
        PizzaIngredients::create([
            'pizza_id' => 3,
            'pizza_ingredient_id' => 6,
        ]);
        PizzaIngredients::create([
            'pizza_id' => 4,
            'pizza_ingredient_id' => 7,
        ]);
        PizzaIngredients::create([
            'pizza_id' => 4,
            'pizza_ingredient_id' => 3,
        ]);
        PizzaIngredients::create([
            'pizza_id' => 4,
            'pizza_ingredient_id' => 8,
        ]);
        PizzaIngredients::create([
            'pizza_id' => 4,
            'pizza_ingredient_id' => 9,
        ]);
        PizzaIngredients::create([
            'pizza_id' => 5,
            'pizza_ingredient_id' => 2,
        ]);
        PizzaIngredients::create([
            'pizza_id' => 5,
            'pizza_ingredient_id' => 3,
        ]);
        PizzaIngredients::create([
            'pizza_id' => 5,
            'pizza_ingredient_id' => 10,
        ]);
        PizzaIngredients::create([
            'pizza_id' => 5,
            'pizza_ingredient_id' => 9,
        ]);
        PizzaIngredients::create([
            'pizza_id' => 5,
            'pizza_ingredient_id' => 11,
        ]);
        PizzaIngredients::create([
            'pizza_id' => 5,
            'pizza_ingredient_id' => 12,
        ]);
        // Dish types Dummy Data
        DishType::create([
            'dish_type_name' => 'Pasta',
        ]);
        DishType::create([
            'dish_type_name' => 'Appetizers',
        ]);
        DishType::create([
            'dish_type_name' => 'Desserts',
        ]);

        // Dish Dummy Data
        Dish::create([
            'dish_type_id' => 1,
            'dish_name' => 'Bolognese',
            'dish_description' => 'Spaghetti pasta with tomato-based meat sauce.',
            'dish_price' => 12,
        ]);
        Dish::create([
            'dish_type_id' => 1,
            'dish_name' => 'Fettuccine Alfredo',
            'dish_description' => 'Fettuccine pasta with creamy parmesan sauce.',
            'dish_price' => 14,
        ]);
        Dish::create([
            'dish_type_id' => 1,
            'dish_name' => 'Lasagna',
            'dish_description' => 'Layers of pasta with tomato sauce, beef, and cheese.',
            'dish_price' => 16,
        ]);
        Dish::create([
            'dish_type_id' => 1,
            'dish_name' => 'Penne Arrabiata',
            'dish_description' => 'Penne pasta with spicy tomato sauce.',
            'dish_price' => 16,
        ]);
        Dish::create([
            'dish_type_id' => 1,
            'dish_name' => 'Carbonara',
            'dish_description' => 'Spaghetti pasta with bacon, egg, and parmesan cheese sauce.',
            'dish_price' => 14,
        ]);


        Dish::create([
            'dish_type_id' => 2,
            'dish_name' => 'Bruschetta',
            'dish_description' => 'Grilled bread with fresh tomatoes, garlic, basil, and olive oil.',
            'dish_price' => 8,
        ]);
        Dish::create([
            'dish_type_id' => 2,
            'dish_name' => 'Antipasto Platter',
            'dish_description' => 'Assortment of cured meats, cheeses, olives, and vegetables.',
            'dish_price' => 16,
        ]);
        Dish::create([
            'dish_type_id' => 3,
            'dish_name' => 'Panna Cotta',
            'dish_description' => 'Sweet cream gelatin topped with fresh fruit and/or caramel sauce.',
            'dish_price' => 7,
        ]);
        Dish::create([
            'dish_type_id' => 3,
            'dish_name' => 'Cannoli',
            'dish_description' => 'Crispy pastry shells filled with sweet ricotta cheese and chocolate chips.',
            'dish_price' => 7,
        ]);



    }
}
