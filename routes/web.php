<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/",[PageController::class,"home"])->name('page.home');
Route::get("/multi/{x}/{y}",function($x,$y){
    return $x.$y;
})->name("multi");

// Route::prefix("inventory")->controller(ItemController::class)->group(function(){

//     Route::get("/","index")->name('item.index');

//     // Route::get("/inventory/create",ItemController::class,"create"])->name('item.create');
//     Route::get("/create","create")->name('item.create');
//     Route::post("",'store')->name("item.store");

//     Route::get("/{id}",'show')->name("item.show");

//     Route::delete('/{id}', 'destroy')->name("item.destroy");

//     Route::get("/{id}/edit",'edit')->name("item.edit");
//     Route::put("/{id}",'update')->name("item.update");

// })

Route::resource('item', ItemController::class);

Route::resource('category', CategoryController::class);


