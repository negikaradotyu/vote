<?php

use Illuminate\Support\Facades\Route;
use App\Models\Kenlists;
use App\Models\Kouhos;

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

Route::get('/page_{kenname}', function ($kenname) {
    $kenroma=Kenlists::where('kenroma', $kenname)->first();
    $kenkanji=$kenroma['kenkanji'];
    $senkyos=Kouhos::where('ken', $kenkanji)->get();

    return view('page', compact('kenname','kenkanji', 'senkyos'));
}); 

Route::get('/online-vote', [App\Http\Controllers\HomeController::class, 'index'])->name('vote');
Route::get('/senkyo/{id}', [App\Http\Controllers\HomeController::class, 'senkyo'])->name('senkyo');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
