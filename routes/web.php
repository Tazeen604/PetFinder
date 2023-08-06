<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
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

Route::get('/register', function () {
    return view('register'); // Assuming you have a login view named 'login.blade.php'
})->name('register');
Route::get('/loginClient', function () {
    return view('loginClient'); // Assuming you have a login view named 'login.blade.php'
})->name('loginClient');

Route::get('/admin', function () {
    return view('admin.admin_login');
});
Route::post('/admin', function () {
    return view('admin.admin_login');
})->name('admin');


//handling form submission
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');
//Route::get('/admin/admin_login', [LoginController::class, 'logout'])->name('logout');

//view dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
//admin customers
Route::get('/admin/customers', function () {
    return view('admin.customers');
})->name('customers');
//Pets 
Route::get('/admin/pets', function () {
    return view('admin.pets');
})->name('pets');

Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
//Store owner data
Route::post('/register', [OwnerController::class, 'store'])->name('owners');
//redirecting to pet Regsitration
Route::get('/pet_registration/{token}', function () {
    return view('pet_registration');
})->name('pet_registration');
//Special Route for QR code redirection URL
Route::get('/qr-code-redirect/{code}', [DashboardController::class, 'generateQRcode'])
    ->name('finder_page');