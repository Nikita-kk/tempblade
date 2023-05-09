<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Mime\Part\Multipart\FormDataPart;

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

Route::get('/k', function () {
    return view('layouts.master');
});

// Route::get('/', function () {
//     return view('welcome');
// });




// blog
Route::get('blog/form',[BlogController::class,'form'])->name('blog.form');
Route::post('blog/store',[BlogController::class,'store'])->name('blog.store');
Route::get('blog/table',[BlogController::class,'table'])->name('blog.table');
Route::get('blog/edit/{id}',[BlogController::class,'edit'])->name('blog.edit');
Route::post('blog/update/{id}',[BlogController::class,'update'])->name('blog.update');
Route::get('blog/delete/{id}',[BlogController::class,'delete'])->name('blog.delete');


// category
Route::get('category/form',[CategoryController::class,'form'])->name('category.form');
Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('category/table',[CategoryController::class,'table'])->name('category.table');
Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');



//  form home page
Route::get('/contact',[FormController::class,'contact'])->name('contact');
Route::get('/home',[FormController::class,'home'])->name('home');
Route::get('/about',[FormController::class,'about'])->name('about');


// welcome for category
Route::get('/',[FormController::class,'welcome'])->name('/');


//for detail (ReadMore)
Route::get('detail/{id}',[FormController::class,'detail'])->name('detail');


// admin/dashboard
Route::get('/admin/dashboard',[FormController::class,'dashboard'])->name('admin/dashboard');
