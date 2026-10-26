<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registAdminController;
use App\Http\Controllers\logcontroller;
use App\Http\Controllers\locat;
use App\Http\Controllers\batimentController;
use App\Http\Controllers\appartController;
use App\Http\Controllers\occupedController;
use App\Http\Controllers\factureController;
use App\Http\Controllers\PaymentController;



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
Route::resource('/regadmin', registAdminController::class);

Route::resource('/login', logcontroller::class);
Route::get('/login', [logcontroller::class, 'create'])->name('login');


Route::post('/detruire', [logcontroller::class,'destroy'])->name('detruire')->middleware('auth');

route::resource('/home',locat::class)->middleware('auth');

route::resource('/batiment',batimentController::class)->middleware('auth');

route::resource('/appart',appartController::class)->middleware('auth');

route::resource('/occuped',occupedController::class)->middleware('auth');

route::resource('/facture',factureController::class)->middleware('auth');
//not found
Route::fallback(function () {
    return response()->view('notfound', [], 404);
});

//end
route::get('/',function()
{
    return view('home');
})->name('hello');

route::get('/layout',function()
{
    return view('layout');
});

route::resource('/payment',PaymentController::class)->middleware('auth');