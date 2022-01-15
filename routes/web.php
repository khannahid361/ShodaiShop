<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customer.index');
});

//Category

Route::get('/category', [CategoryController::class, 'index']);

Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

Route::post('/category', [CategoryController::class, 'store'])->name('category.store');

Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('editCategory');

Route::get('/category/{id}', [CategoryController::class, 'show'])->name('showCategory');

Route::post('/category/{id}', [CategoryController::class, 'update'])->name('updateCatgory');

Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('deleteCategory');

//Brand

Route::get('/brand', [BrandController::class, 'index']);

Route::get('/brand/create', [BrandController::class, 'create'])->name('createBrand');

Route::post('/brand', [BrandController::class, 'store'])->name('storeBrand');

Route::get('/brand/{id}', [BrandController::class, 'show'])->name('showBrand');

Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('editBrand');

Route::get('/brand/delete/{id}', [BrandController::class, 'destroy'])->name('deleteBrand');

Route::post('/brand/{id}', [BrandController::class, 'update'])->name('updateBrand');

//subcategory

Route::get('/subcategory', [SubcategoryController::class, 'index']);

Route::get('/subcategory/create', [SubcategoryController::class, 'create'])->name('createSubcategory');

Route::post('/subcategory', [SubcategoryController::class, 'store'])->name('storeSubcategory');

Route::get('/subcategory/edit/{id}', [SubcategoryController::class, 'edit'])->name('editSubcategory');

Route::get('/subcategory/{id}', [SubcategoryController::class, 'show'])->name('showSubcategory');

Route::post('/subcategory/{id}', [SubcategoryController::class, 'update'])->name('updateSubcatgory');

Route::get('/subcategory/delete/{id}', [SubcategoryController::class, 'destroy'])->name('deleteSubcategory');

//Slider 

Route::get('/slider', [SliderController::class, 'index']);

Route::get('/slider/create', [SliderController::class, 'create'])->name('createSlider');

Route::post('/slider', [SliderController::class, 'store'])->name('storeSlider');

Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('editSlider');

Route::get('/slider/{id}', [SliderController::class, 'show'])->name('showSlider');

Route::post('/slider/{id}', [SliderController::class, 'update'])->name('updateSlider');

Route::get('/slider/delete/{id}', [SliderController::class, 'destroy'])->name('deleteSlider');

//Show slider

Route::get('/', [PageController::class, 'showAll']);

//Product

Route::get('/product/create', [ProductController::class, 'create'])->name('productCreate');

Route::get('/product/getSubcategory/{id}', [ProductController::class, 'getSubcategory']);

Route::post('/product', [ProductController::class, 'store'])->name('productStore');

Route::get('/product', [ProductController::class, 'index']);

Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('destroyProduct');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('showProduct');

Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('editProduct');

Route::post('/product/{id}', [ProductController::class, 'update'])->name('updateProduct');

//stock

Route::get('/stock', [StockController::class, 'index']);

Route::get('/stock/create', [StockController::class, 'create'])->name('stockCreate');

Route::post('/stock', [StockController::class, 'store'])->name('storeStock');

Route::get('/stock/{id}', [StockController::class, 'details'])->name('stockDetails');

Route::get('/stock/{id}/{stockId}/delete', [StockController::class, 'destroy'])->name('destroyStock');

Route::post('/stock/{id}/{stockId}', [StockController::class, 'update'])->name('updateStock');

Route::get('/stock/{id}/{stockId}/edit', [StockController::class, 'edit'])->name('editStock');

//User & Admin
Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {

    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'PreventBackHistory']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('adminDashboard');

    Route::get('/profile', [AdminController::class, 'profile'])->name('adminProfile');
});
Route::group(['prefix' => 'user', 'middleware' => ['isUser', 'auth', 'PreventBackHistory']], function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('userDashboard');

    Route::get('/profile', [UserController::class, 'profile'])->name('userProfile');
});

//Customer
Route::get('/product/description/{productId}', [PageController::class, 'productDescription'])->name('productDescription');

Route::group(['middleware' => ['auth', 'isUser']], function () {
    Route::post('/wishlist/{productId}', [WishlistController::class, 'addProduct'])->name('addWishlist');

    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');

    Route::post('/wishlist/delete/{wishlistId}', [WishlistController::class, 'destroy'])->name('deleteWishlist');

    Route::get('/cart', [CartController::class, 'cart'])->name('cart');

    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');

    Route::get('/deletecart/{id}', [CartController::class, 'remove'])->name('removeCart');

    Route::post('/update-cart/{id}', [CartController::class, 'updateCart'])->name('update.cart');

    Route::get('/go-to-checkout', [CartController::class, 'checkout'])->name('checkOut');

    Route::post('/cart/checkout/confirm', [CartController::class, 'confirmCheckout'])->name('confirmCheckout');

    Route::get('/myOrder', [CartController::class, 'myOrder'])->name('myOrder');

    Route::get('/view/order/{id}', [CartController::class, 'viewOrder'])->name('viewOrder');
});
