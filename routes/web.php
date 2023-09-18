<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TextController;
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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [TextController::class, 'index'])->name('index');
//Route::get('/', [TextController::class, 'show'])->middleware(['auth', 'verified'])->name('afterlogin');
//Route::post('/', [TextController::class, 'store'])->middleware(['auth', 'verified'])->name('store');
Route::post('/texts', [TextController::class, 'store'])->middleware(['auth', 'verified'])->name('texts.store');
Route::get('/texts', [TextController::class, 'show'])->middleware(['auth', 'verified'])->name('texts.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
