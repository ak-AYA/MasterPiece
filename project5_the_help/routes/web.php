<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\ServiceDetailsController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Categoriescontroller;



// -------------

Route::controller(WebsiteController::class)->name('website.')->group(function () {
    Route::get('/', [WebsiteController::class, 'index'])->name('index');
    
    Route::controller(ServicesController::class)->name('services.')->group(function () {
        Route::get('/services', 'index')->name('index');
        Route::get('/services/category/{id}', 'showServicesByCategory')->name('category');
        
        Route::get('/services/{id}', [ServiceDetailsController::class, 'show'])->name('details');
    });
});


















// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    


    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::put('/users/update', [UserController::class, 'update'])->name('users.update');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/delete', [UserController::class, 'delete'])->name('users.delete');

    

    Route::get('/providers', [ProviderController::class, 'index'])->name('admin.providers');
    Route::put('/providers/update', [ProviderController::class, 'update'])->name('providers.update');
    Route::post('/providers/store', [ProviderController::class, 'store'])->name('providers.store');
    Route::get('/providers/{id}/delete', [ProviderController::class, 'delete'])->name('providers.delete');


    Route::get('/categories', [Categoriescontroller::class, 'index'])->name('admin.categories');
    Route::put('/categories/update', [Categoriescontroller::class, 'update'])->name('categories.update');
    Route::post('/categories/store', [Categoriescontroller::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/delete', [Categoriescontroller::class, 'delete'])->name('categories.delete');


    
    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services');
    Route::put('/services/update', [ServiceController::class, 'update'])->name('services.update');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{id}/delete', [ServiceController::class, 'delete'])->name('services.delete');

    
    Route::get('/payments', [PaymentController::class, 'index'])->name('admin.payments');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::put('/payments/update', [PaymentController::class, 'update'])->name('payments.update');
    Route::delete('/payments/{id}', [PaymentController::class, 'softDelete'])->name('payments.softDelete');


    
    Route::get('contact_us', [ContactUsController::class, 'index'])->name('admin.contact_us');
    Route::get('contact_us/{id}', [ContactUsController::class, 'show'])->name('contact_us.show');
    Route::put('contact_us/update', [ContactUsController::class, 'update'])->name('contact_us.update');
    
    Route::get('/discounts', [DiscountController::class, 'index'])->name('admin.discounts');
    Route::put('/discounts/update', [DiscountController::class, 'update'])->name('discounts.update');
    Route::post('/discounts', [DiscountController::class, 'store'])->name('discounts.store');
    Route::get('/discounts/{id}/delete', [DiscountController::class, 'delete'])->name('discounts.delete');

    
    Route::get('/bookings', [BookingController::class, 'index'])->name('admin.bookings');
    Route::put('/bookings/update', [BookingController::class, 'update'])->name('bookings.update');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{id}/delete', [BookingController::class, 'delete'])->name('bookings.delete');

    Route::get('/reviews', [ReviewController::class, 'index'])->name('admin.reviews');
    Route::put('/reviews', [ReviewController::class, 'update'])->name('reviews.update');
});
