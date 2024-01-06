<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditMenu;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\NotificationSweetAlert;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('homePage');
})->name('homePage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/menu',[MenuController::class, 'index'])->name('menu');

Route::get('/order/checkout',[OrderController::class, 'showCheckout'])->name('showCheckout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/order/list',[OrderController::class, 'showList'])->name('showList');

    Route::get('/admin',[AdminController::class, 'show'])->name('adminMenu');

    Route::middleware(['can:isAdmin'])->group(function (){
        Route::get('/admin/changemenu/pizza',[MenuController::class, 'changeMenuPizza'])->name('changeMenuPizza');
        Route::get('/admin/changemenu/dish',[MenuController::class, 'changeMenuDish'])->name('changeMenuDish');
        Route::get('/admin/changemenu/',[MenuController::class, 'changeMenu'])->name('changeMenu');

        Route::get('/admin/changemenu/edit/pizza/{pizza}',[MenuController::class, 'editPizza'])->name('editPizza');
        Route::post('/admin/changemenu/edit/pizza/{pizza}',[MenuController::class, 'updatePizza'])->name('updatePizza');

        Route::get('/admin/changemenu/edit/dish/{dish}',[MenuController::class, 'editDish'])->name('editDish');
        Route::post('/admin/changemenu/edit/dish/{dish}',[MenuController::class, 'updateDish'])->name('updateDish');



    });



});


require __DIR__.'/auth.php';
