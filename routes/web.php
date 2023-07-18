<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\RepliesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ImageController;


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

Route::get('/', [ThreadsController::class, 'index'])->name('main');

Route::get('threads/create', [ThreadsController::class, 'create']);
Route::get('threads/{channel}/{thread}', [ThreadsController::class, 'show']);
Route::delete('threads/{channel}/{thread}', [ThreadsController::class, 'destroy']);
Route::post('threads', [ThreadsController::class, 'store']);
Route::get('threads/{channel}', [ThreadsController::class, 'showchannel']);



Route::get('channels/create', [ChannelsController::class, 'create']);
Route::post('channels', [ChannelsController::class, 'store']);

Route::post('/threads/{channel}/{thread}/replies', [RepliesController::class, 'store']);
Route::delete('/replies/{reply}', [RepliesController::class, 'destroy']);

Route::post('/replies/{reply}/favorites', [FavoritesController::class, 'store']);

Route::get('/user/{user}', [UserController::class, 'show'])->name('user');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');




Route::middleware('auth')->group(function () {
    Route::post('/profile/updateImage', [ProfileController::class, 'updateImage'])->name('profile.updateImage');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::delete('/channels/{id}', [ChannelsController::class, 'destroy'])->name('channels.destroy');


Route::post('/images/upload', [ImageController::class,'upload'])->name('images.upload');




Route::get('/rules', [RulesController::class,'rules'])->name('rules.index');

/*Route::post('dropzone/store',[ImageController::class, 'store']);*/

require __DIR__.'/auth.php';
