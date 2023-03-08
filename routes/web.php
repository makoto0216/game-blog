<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GamepostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Requests\CommentRequest;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(GamepostController::class)->middleware(['auth'])->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/gameposts/create','create')->name('create'); 
    Route::get('/gameposts/{gamepost}','show')->name('show');
    Route::post('/gameposts','store')->name('store'); 
    Route::delete('/gameposts/delete/{gamepost}','delete')->name('delete');
});

Route::controller(UserController::class)->middleware(['auth'])->group(function(){
    Route::get('/gameposts/user/{user}','mypage')->name('mypage');
    Route::get('/gameposts/usermypage/{user}','usermypage')->name('usermypage');
});

Route::controller(CommentController::class)->middleware(['auth'])->group(function(){
    Route::get('/gameposts/comments/create','commentcreate')->name('commentcreate');
    Route::post('/gameposts/comments', 'commentstore')->name('commentstore');
   
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
