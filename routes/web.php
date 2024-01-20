<?php

use App\Http\Controllers\GroupsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestingController;
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



Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/post/status/{id}', [PostController::class, 'checkStatus'])->name('check.status');
Route::get('/posts/filter/{value}', [PostController::class, 'filter'])->name('posts.filter');



Route::get('/jquery',[GroupsController::class, 'create'])->name('group.create'); 
Route::post('/create-group',[GroupsController::class, 'store'])->name('group.store'); 


Route::get('/get-users',function(){
    return view('user.index');
}); 

Route::get('/users',[UserController::class, 'index'])->name('getUsers'); 

Route::get('/user/edit/{id}',[UserController::class, 'edit'])->name('user.edit'); 
Route::post('/user/update',[UserController::class, 'update'])->name('user.update'); 

Route::resource('/products', ProductController::class);

Route::resource('testing', TestingController::class);

Route::get('/data', [\App\Http\Controllers\DataController::class, 'getData']);
Route::get('/show-data', [\App\Http\Controllers\DataController::class, 'showDataView']);

Route::get('/show-data', [\App\Http\Controllers\ProductController::class, 'showData']);
