<?php

use App\Http\Controllers\DropdownController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});
 
Route::get('user',[UserController::class,'index'])->name('user');
Route::post('store',[UserController::class,'store'])->name('store');
Route::get('table',[UserController::class,'table'])->name('table');
Route::get('edit/{id}',[UserController::class,'edit'])->name('edit');
Route::post('update/{id}',[UserController::class,'update'])->name('update');
Route::get('delete/{id}',[UserController::class,'delete'])->name('delete');



// Route::get('dropdown', [UserController::class, 'index1']);
Route::post('api/fetch-states', [UserController::class, 'fetchState']);
Route::post('api/fetch-cities', [UserController::class, 'fetchCity']);