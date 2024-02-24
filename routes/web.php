<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesertadidikController;
use App\Http\Controllers\DataPesertadidikController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\ProviderController;

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

Route::get('/', [BerandaController::class, 'index']);

Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('/auth/{provider}/redirect',[ProviderController::class, 'redirect']);
    Route::get('/auth/{provider}/callback',[ProviderController::class, 'callback']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/pesertadidik', [PesertadidikController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('datapesertadidik', DataPesertadidikController::class)->except(['show']);
});

Route::get('/home', function () {
    if(Auth::check()) {
        if(Auth::user()->role == 'admin'){
            return redirect('dashboard');
        } else {
            return redirect('/pesertadidik');
        }
    } else {
        return redirect('/login')->with('error', 'Silakan login untuk mengakses halaman ini.');
    }
});