<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\reviewController;
use App\Http\Controllers\VendorController;
use App\Models\ProductImage;

// Route::get('/', [HomeController::class, 'index']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/detail/{product}', [HomeController::class, 'productDetail'])->name('detail');

Route::post('/search', [HomeController::class, 'search'])->name('search');
Route::get('/search', [HomeController::class, 'search'])->name('searchget');
Route::get('/roles', [HomeController::class, 'roles'])->name('roles');

Route::get('/registerVandor', function () {
    return view(' auth.registerVandor');
});

Route::get('/order-success', function () {
    return view('orderSuccess');
})->name('orderSuccess');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/updateStatus', [HomeController::class, 'updateStatus'])->name('updateStatus');


Route::get('/cart', function () {
    return view('cart');
});
// Route::get('/chekout/{id}', function () {
//     return view('checkout');
// });
Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::match(['get', 'post'], 'order/{id}', [HomeController::class, 'order'])->name('order');
Route::match(['get', 'post'], 'myOrder', [HomeController::class, 'myOrder'])->name('myOrder');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['AuthMiddleware']], function () {
    Route::match(['get', 'post'], '/checkout/{id}', [HomeController::class, 'checkout'])->name('checkout');
    Route::get('/Account', [App\Http\Controllers\UserController::class, 'edit'])->name('Account');
    Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('update');
});

Route::middleware('auth')->group(function () {

    //user route
    Route::get('resetPassword', [AuthController::class, 'index'])->name('resetPassword');
    Route::post('updatePassword', [AuthController::class, 'updatePassword'])->name('updatePassword');
    Route::get('review/{product_id}/{order_id}', [ReviewController::class, 'review'])->name('review');
    Route::post('saveReview', [ReviewController::class, 'saveReview'])->name('saveReview');



    // Admin routes
    Route::prefix('admin/')->name('admin.')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('Category', [AdminController::class, 'Category'])->name('Category');
        Route::get('Brand', [AdminController::class, 'Brand'])->name('Brand');
        Route::get('Color', [AdminController::class, 'Color'])->name('Color');

        Route::post('addCategory', [AdminController::class, 'addCategory'])->name('addCategory');
        Route::post('addBrand', [AdminController::class, 'addBrand'])->name('addBrand');
        Route::post('addColor', [AdminController::class, 'addColor'])->name('addColor');

        Route::get('deleteCategory/{id}',[AdminController::class,'deleteCategory'])->name('deleteCategory');
        Route::get('deleteBrand/{id}',[AdminController::class,'deleteBrand'])->name('deleteBrand');
        Route::get('deleteColor/{id}',[AdminController::class,'deleteColor'])->name('deleteColor');

        Route::get('ChangeStatus/{id}',[AdminController::class,'ChangeStatus'])->name('ChangeStatus');
        Route::get('getProduct',[AdminController::class,'getProduct'])->name('getProduct');
        Route::get('ChangeProductStatus/{id}',[AdminController::class,'ChangeProductStatus'])->name('ChangeProductStatus');
        Route::get('changeCategoryStatus/{id}',[AdminController::class,'changeCategoryStatus'])->name('changeCategoryStatus');
        Route::get('changeBrandStatus/{id}',[AdminController::class,'changeBrandStatus'])->name('changeBrandStatus');

    });
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});


Route::middleware('auth')->group(function () {

    // vendor routes
        Route::prefix('vendor/')->name('vendor.')->group(function () {
        Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
        Route::get('products', [VendorController::class, 'products'])->name('products');
        Route::get('addProducts', [VendorController::class, 'addProducts'])->name('addProducts');
        Route::get('profile', [VendorController::class, 'profile'])->name('profile');
        Route::post('insertProduct', [VendorController::class, 'insertProduct'])->name('insertProduct');
        Route::get('deleteProduct/{id}', [VendorController::class, 'deleteProduct'])->name('deleteProduct');
        Route::get('editProduct/{id}', [VendorController::class, 'editProduct'])->name('editProduct');
        Route::post('updateProduct/{id}', [VendorController::class, 'updateProduct'])->name('updateProduct');
        Route::get('changeStatus/{id}', [VendorController::class, 'changeStatus'])->name('changeStatus');
    });
    Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
});
