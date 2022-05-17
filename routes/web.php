<?php

use App\Http\Controllers\Admin\{
    BusinessFieldController,
    ClientController,
    FeatureController,
    PackageController,
    SubscriptionController,
};
use App\Http\Controllers\Client\{
    BookingController,
    BookingTimeController,
    CustomerController,
    HallController
};
use App\Http\Controllers\UserController;
use App\Models\Client\Hall;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function() {
    Route::get('/', function () {
        return Auth::check()
            ? redirect()->route('halls.index')
            : redirect()->route('login');
    });

    Route::middleware(['auth'])->group(function () {
        // Admin Routes
        Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');

        Route::resource('features', FeatureController::class)->except(['show']);

        Route::resource('packages', PackageController::class)->except(['show']);

        Route::resource('clients', ClientController::class)->except(['show']);

        Route::resource('business-fields', BusinessFieldController::class)->except(['show']);

        Route::resource('subscriptions', SubscriptionController::class)->except(['show']);

        // Client Routes
        Route::prefix('/halls/{hall}/')->name('halls.')->group(function () {
            Route::get('dashboard', function (Hall $hall) {
                Session::put('hall', $hall);

                return view('client.halls.dashboard');
            })->name('dashboard');

            Route::resource('bookings', BookingController::class);

            Route::resource('booking-times', BookingTimeController::class);

            Route::resource('customers', CustomerController::class);
        });

        Route::resource('halls', HallController::class)->except(['show']);

        // Admin And Client Routes
        Route::resource('users', UserController::class)->except(['show']);
    });

    require __DIR__.'/auth.php';
});
