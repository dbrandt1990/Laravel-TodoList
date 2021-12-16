<?php

use App\Http\Controllers\TodosController;
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

Route::get('/', [TodosController::class, 'index'])->name('index');
Route::post('/', [TodosController::class, 'create'])->name('create');
Route::get('/todo:id', [TodosController::class, 'destroy'])->name('destroy');