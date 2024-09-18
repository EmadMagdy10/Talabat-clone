<?php

use App\Models\Menu;
use App\Models\OrderItem;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\auth\SocialAuthController;
use App\Models\Cart;

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

Route::get('/', [CategoryController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    #---------Cart Items---------#
    Route::get('cart', [CartController::class, 'showCart'])->name('cart.show');
    #---------Add Cart Items---------#
    Route::post('cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
    #---------Delete From Cart Items---------#
    Route::delete('cart/delete/{id}', [CartController::class, 'delete'])->name('delete.item.cart');
    #---------Update From Cart Items---------#
    Route::put('cart/update/{id}', [CartController::class, 'update_item'])->name('update.item.cart');
});
#---------Admin---------#

Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/login/form', 'admin.admin-login')->name('login.form');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'index'])->name('dashboard');
        Route::get('menue/{id}', [MenuController::class, 'admin_show'])->name('menue.show');
        Route::delete('/delete/{id}', [MenuController::class, 'delete'])->name('delete');
        Route::post('/add.product/{restaurant_id?}', [MenuController::class, 'add_product'])->name('add-product');
        Route::get('/add.product/{restaurant_id}', [MenuController::class, 'show_add_product'])->name('add-product.show');
    });
});



#---------GOOGLE LOGIN ---------#

Route::get('auth/{provider}/redirect', [SocialAuthController::class, 'redirect'])->name('auth.socialitelogin.redirect');
Route::get('auth/{provider}/callback', [SocialAuthController::class, 'call_back'])->name('auth.socialitelogin.callback');


#---------resturant ---------#
Route::get('food', [RestaurantController::class, 'show'])->name('food.show');
#---------show menue ---------#
Route::get('menue/{id}', [MenuController::class, 'show'])->name('menue.show');







require __DIR__ . '/auth.php';
