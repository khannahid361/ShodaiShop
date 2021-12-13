<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
