<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\keliones;
use App\Http\Controllers\vairuotojai;
use App\Http\Controllers\transportas;
use App\Http\Controllers\uzsakymai;
use App\Http\Controllers\filtruotoskeliones;
use App\Http\Controllers\vairuotkeliones;
use App\Http\Controllers\VairuotRegister;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ivykKelionController;
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

Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');

Route::get('/', function () {
    if(Auth::check())
    {
        if(Auth::user()->tipas == 2)
        {
            return redirect()->route('vairuotkeliones.index');
        }
    }
    return redirect()->route('keliones.index');
});

Route::resource('/ivykkelione',ivykKelionController::class);
Route::resource('/keliones', keliones::class);
Route::resource('/vairuotregister', VairuotRegister::class);
Route::resource('/vairuotojai', vairuotojai::class);
Route::resource('/transportas', transportas::class);
Route::resource('/uzsakymai', uzsakymai::class);
Route::resource('/filtras', filtruotoskeliones::class);
Route::resource('/vairuotkeliones', vairuotkeliones::class);

Route::get('/dashboard', function () {
    return redirect()->route('keliones.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
