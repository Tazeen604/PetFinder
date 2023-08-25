<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\GoogleController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register/{securityCode}', function ($securityCode) {
    return view('register', compact('securityCode'));
})->name('register');
Route::get('/loginClient', function () {
    return view('loginClient'); // Assuming you have a login view named 'login.blade.php'
})->name('client-login');
//post related client login
Route::post('/ownerLogin', [OwnerController::class, 'ownerLogin'])->name('client-login-handler');

Route::get('/admin', function () {
    return view('admin.admin_login');
})->name('admin-login');
Route::post('/admin', function () {
    return view('admin.admin_login');
})->name('admin');


//handling form submission
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');
//Route::get('/admin/admin_login', [LoginController::class, 'logout'])->name('logout');

//view dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
//admin customers
Route::get('/customers_pets', [OwnerController::class, 'viewAllCustomers'])->name('allcustomers');


Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
//logout admin
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
//Store owner data
Route::post('/register', [OwnerController::class, 'store'])->name('owners');
//redirecting to pet Regsitration
Route::get('/pet_registration/{token}', function () {
    return view('pet_registration');
})->name('pet_registration');
//register your pet 
Route::post('/register-pet', [PetController::class, 'registerPet'])->name('pet.register');


//Special Route for QR code redirection URL
Route::get('/finder_page/{code}', [DashboardController::class, 'redirectURL'])->name('finder_page');
//send email to owner
Route::post('/send-location-email/{code}', [DashboardController::class, 'sendLocationEmail'])
    ->name('send-location-email');
//QR code to save in the database
Route::post('/generate-qrcode', [DashboardController::class, 'generateQRCode'])->name('generate-qrcode');
//security code check
Route::post('/check-security-code', [OwnerController::class, 'checkSecurityCode'])->name('check.security.code');

//view owner profile
Route::get('/viewOwnerProfile', [OwnerController::class, 'showOwner'])->name('view-owner-profile');

//Owner logout
Route::get('/ownerlogout', [OwnerController::class, 'logout'])->name('owner-logout');

//view Security codes 
Route::get('/view-security-codes',  [DashboardController::class, 'viewSecurityCodes'])->name('viewSecurityCodes');
//google sign up routes
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.signup');
Route::get('/google/callback', [GoogleController::class, 'handleGoogleCallback']);
//google sign in routes
Route::get('/loginClient/google', [GoogleController::class, 'redirectToGoogle'])->name('google.signin');
Route::get('/loginClient/google/callback', [GoogleController::class, 'handleGoogleCallback']);




//check session for pet owner using middleware
Route::group(['middleware' => 'CheckOwnerSession'], function () {
    // Routes that require custom session data check
    Route::get('/pet_registration/{token}', function () {
        return view('pet_registration');
    })->name('pet_registration');   

    //view owner porofile
     Route::get('/viewOwnerProfile', [OwnerController::class, 'showOwner'])
    ->name('view-owner-profile');

});
//Check Admin Session using middleware
Route::group(['middleware' => 'checkAdminSession'], function () {
    // Routes that require custom session data check
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    //admin customers
    Route::get('/admin/customers', function () {
        return view('admin.customers');
    })->name('customers');
    //Pets 
    Route::get('/admin/pets', function () {
        return view('admin.pets');
    })->name('pets'); 
});
