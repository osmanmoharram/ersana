<?php

use App\Http\Controllers\Admin\{
    AdvertisementController,
    BusinessFieldController,
    ClientController,
    FeatureController,
    PackageController,
    SubscriptionController,
};
use App\Http\Controllers\Client\{
    AvailableBookingTimeController,
    BookingController,
    BookingTimeController,
    CustomerController,
    OfferController,
};
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\SettingController;
use App\Models\Client\Booking;
use App\Models\Hall;
use App\Models\Setting;
use Illuminate\Http\Request;
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
            ? (request()->user()->isClient() ? redirect()->route('halls.index') : redirect()->route('admin.dashboard'))
            : (redirect()->route('login'));
    });

    Route::middleware(['auth'])->group(function () {
        // Admin Routes
        Route::get('/dashboard', [DashboardController::class, 'showAdminDashboard'])->name('admin.dashboard');

        Route::resource('features', FeatureController::class)->except(['show']);

        Route::resource('packages', PackageController::class)->except(['show']);

        Route::resource('clients', ClientController::class)->except(['show']);

        Route::resource('business-fields', BusinessFieldController::class)->except(['show']);

        Route::resource('subscriptions', SubscriptionController::class)->except(['show']);

        Route::resource('advertisements', AdvertisementController::class);

        // Client Routes
        Route::prefix('/halls/{hall}/')->name('halls.')->group(function () {
            Route::get('dashboard', [DashboardController::class, 'showHallDashboard'])->name('dashboard');

            Route::resource('bookings', BookingController::class);

            Route::resource('booking-times', BookingTimeController::class);

            Route::resource('customers', CustomerController::class);

            Route::resource('booking-times', BookingTimeController::class);

            Route::get('available-booking-times', AvailableBookingTimeController::class)->name('available-booking-times');

            Route::resource('offers', OfferController::class);

            Route::get('/settings', [SettingController::class, 'index'])->name('settings');

            Route::patch('/settings', [SettingController::class, 'update'])->name('settings.update');
        });

        // Admin And Client Routes
        Route::resource('halls', HallController::class)->except(['show']);

        Route::resource('users', UserController::class)->except(['show']);

        Route::resource('expenses', ExpenseController::class)->except(['show']);

        Route::resource('revenues', RevenueController::class)->except(['show']);

        Route::resource('reports', ReportController::class);

        Route::get('/settings', [SettingController::class, 'index'])->name('settings');

        Route::patch('/settings/{setting}', [SettingController::class, 'update'])->name('settings.update');

        Route::prefix('/profile')->group(function () {
            Route::get('/', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
            Route::get('/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
        });
    });

    require __DIR__.'/auth.php';
});
