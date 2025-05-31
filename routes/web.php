<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[AppController::class,'index'])->name('index');
Route::get('/add',[AppController::class,'add'])->name('add.new');
Route::post('/store',[AppController::class,'store'])->name('store.new');
Route::get('/details/{id}',[AppController::class,'details'])->name('details');
Route::get('/edit/{id}',[AppController::class,'edit'])->name('edit');
Route::post('/update/{id}',[AppController::class,'update'])->name('update.new');
Route::delete('/delete/{id}',[AppController::class,'delete'])->name('delete');