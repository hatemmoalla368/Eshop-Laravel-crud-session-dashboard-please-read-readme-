<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExerciceController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserordersController;


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



/*Route::get('/test', function () {
    return view('test');
});*/

Route::get('/test2', function () {
    return "<h1>bonsoir</h1>";
});

Route::get('/acceuil/{x}',[HomeController::class,"acceuil"])->name("home.acceuil");
Route::get('/contact',[HomeController::class,"contact"])->name("home.contact");
Route::get('/{date}/{num}', [OrderController::class,"show"])->name("order.show")
->where(["num"=>"[0-9]{1,8}","date"=>"[0-9]{2}-[0-9]{2}-[0-9]{4}"]);
Route::get('/form',[OrderController::class,"form"])->name('order.form');
Route::post('/form',[OrderController::class,"post"])->name("order.post");


Route::get('/',[ExerciceController::class,"acceuil"])->name("exercice.acceuil");
Route::get('/admin',[ExerciceController::class,"admin"])->name("exercice.admin");
Route::get('/about',[ExerciceController::class,"about"])->name("exercice.about");
Route::get('/produits/{id?}',[ExerciceController::class,"produits"])->name("exercice.produits");
Route::get('/contact',[ExerciceController::class,"contact"])->name("exercice.contact");
Route::post('/contact/save',[ExerciceController::class,"post"])->name("exercice.post");

Route :: middleware (['auth']) -> group (function () {

Route::resource('categories',CategoriesController::class);

Route::resource('products', ProductsController::class);
Route::resource('orders', OrdersController::class);
Route::get('/orders/{id}/details',[ExerciceController::class,"showDetails"])->name("orders.details");
Route::resource('users', UsersController::class);


});

//route panier
Route::post('/panier/addtocard',[ExerciceController::class,"addtocard"])->name("exercice.addtocard");
Route::post('/panier/removeproduct',[ExerciceController::class,"removeproduct"])->name("exercice.removeproduct");
Route::get('/panier/cart',[ExerciceController::class,"cart"])->name("exercice.cart");
Route::get('/panier/checkout',[ExerciceController::class,"checkout"])->name("exercice.checkout");
Route::get('/panier/addorder',[ExerciceController::class,"addorder"])->name("exercice.addorder");
Route::get('/panier/nouser',[ExerciceController::class,"nouser"])->name("exercice.nouser");
Route::get('/contactus',[ExerciceController::class,"contactus"])->name("exercice.contactus");







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('userorders', UserordersController::class);
Route::get('/search',[ProductController::class,"search"])->name('products.search');


