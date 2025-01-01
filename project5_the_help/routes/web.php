<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\ServiceDetailsController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Categoriescontroller;
use App\Http\Controllers\UserBookingController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\Auth\ProviderLoginController;
use App\Http\Controllers\Auth\ProviderRegisterController;
use App\Http\Controllers\Provider\ProviderProfileController;






// ------------- Website Routes

Route::controller(WebsiteController::class)->name('website.')->group(function () {
    Route::get('/', 'index')->name('index');
    
    Route::controller(ServicesController::class)->name('services.')->group(function () {
        Route::get('/services', 'index')->name('index');
        Route::get('/services/category/{id}', 'showServicesByCategory')->name('category');
        Route::get('/services/{id}', [ServiceDetailsController::class, 'show'])->name('details');
        Route::get('/search-services', [ServicesController::class, 'index'])->name('services.search');
    });

    // Register Routes
    Route::get('/register/user', [UserRegisterController::class, 'showRegistrationForm'])->name('register.user');
    Route::post('/register/user', [UserRegisterController::class, 'register'])->name('register.user.submit');
    Route::get('/login/user', [UserLoginController::class, 'showLoginForm'])->name('login.user');
    Route::post('/login/user', [UserLoginController::class, 'login'])->name('login.user.submit');
    Route::post('/logout/user', [UserLoginController::class, 'logout'])->name('logout.user');


    Route::get('/register/provider', [ProviderRegisterController::class, 'showRegistrationForm'])->name('register.provider');
    Route::post('/register/provider', [ProviderRegisterController::class, 'register'])->name('register.provider.submit');
    Route::get('/login/provider', [ProviderLoginController::class, 'showLoginForm'])->name('login.provider');
    Route::post('/login/provider', [ProviderLoginController::class, 'login'])->name('login.provider.submit');
    Route::post('/logout/provider', [ProviderLoginController::class, 'logout'])->name('logout.provider');
});




Route::prefix('user')->name('user.')->group(function () {
    // User profile routes
    Route::get('/profile', [UserProfileController::class, 'index'])->name('user.profile');
    Route::put('/update-profile', [UserProfileController::class, 'update'])->name('user.updateProfile');

    // Booking routes
    Route::post('/booking/checkout', [UserBookingController::class, 'processBooking'])->name('booking.checkout');
    Route::get('/booking/{serviceId}', [UserBookingController::class, 'showBookingPage'])->name('booking.page');
    Route::get('/booking/invoice/{bookingId}', [UserBookingController::class, 'showInvoice'])->name('booking.invoice');

    // Payment route (Stripe)
    Route::post('/process-stripe-payment', [UserBookingController::class, 'processStripePayment'])->name('processStripePayment');

    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

});

    



Route::middleware(['auth:provider', 'isProvider'])->prefix('provider')->name('provider.')->group(function () {
    // Provider only routes 

    Route::get('/profile', [ProviderProfileController::class, 'index'])->name('provider.profile'); 
    Route::put('/update-profile', [ProviderProfileController::class, 'update'])->name('provider.updateProfile'); 
    
    // Add and edit services
    Route::get('/services', [ProviderProfileController::class, 'services'])->name('provider.services');  
    Route::post('/add-service', [ProviderProfileController::class, 'store'])->name('provider.addService');
    Route::get('/edit-service/{serviceId}', [ProviderProfileController::class, 'editService'])->name('provider.editService'); 
    Route::put('/update-service/{serviceId}', [ProviderProfileController::class, 'updateService'])->name('provider.updateService'); 

    // Reviews and bookings
    Route::get('/reviews', [ProviderProfileController::class, 'reviews'])->name('provider.reviews');  
    Route::get('/bookings', [ProviderProfileController::class, 'bookings'])->name('provider.bookings');  
    Route::patch('/provider/bookings/{id}/status', [ProviderProfileController::class, 'updateBookingStatus'])
    ->name('provider.updateBookingStatus');

});









// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



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
