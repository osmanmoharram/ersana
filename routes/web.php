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
    CustomerController,
    HallController
};
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
            ? redirect()->route('client.halls.index')
            : redirect()->route('login');
    });

    Route::middleware(['auth'])->group(function () {
        Route::view('/', 'admin.dashboard')->name('dashboard');

        Route::resource('users', UserController::class)->except(['show']);

        Route::resource('roles', RoleController::class)->except(['show']);

        Route::resource('permissions', PermissionController::class)->except(['show']);

        Route::resource('features', FeatureController::class)->except(['show']);

        Route::resource('packages', PackageController::class)->except(['show']);

        Route::resource('clients', ClientController::class)->except(['show']);

        Route::resource('business-fields', BusinessFieldController::class)->except(['show']);

        Route::resource('subscriptions', SubscriptionController::class)->except(['show']);

        Route::name('client.')->group(function() {
            Route::resource('halls', HallController::class);

            Route::middleware('currentHall')->group(function () {
                Route::resource('bookings', BookingController::class);
                Route::resource('customers', CustomerController::class);
            });

            // Route::resource('users', UserController::class)->except(['show']);
        });
    });

    require __DIR__.'/auth.php';
});
