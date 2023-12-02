<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use function Ramsey\Uuid\v1;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::prefix('')->group(function () {

            Route::get('/clear', [HomeController::class, 'clear']);

            Route::middleware(['auth'])->group(function () {
                Route::get('/dashboard', [HomeController::class, 'index']);
                Route::get('/profile', [AdminController::class, 'profile']);
            });

            Route::controller(AdminController::class)->group(function () {
                Route::get('/sign-up', 'viewSignUp')->name('sign-up');
                Route::post('/register', 'register');
                Route::get('/sign-in', 'viewSignIn')->name('sign-in');
                Route::post('/login', 'login');
                Route::post('/logout', 'logout');
            });
        });
    }
);
