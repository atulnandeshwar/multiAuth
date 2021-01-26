<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\VendorLoginController;
use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\Auth\VendorRegisterController;
use App\Http\Controllers\Auth\CustomerRegisterController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//login routes
// Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('login.admin');
//Route::get('/login/customer', [LoginController::class,'showCustomerLoginForm'])->name('login.customer');
//Route::get('/login/vendor', [LoginController::class,'showVendorLoginForm'])->name('login.vendor');

// Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm'])->name('register.admin');
// Route::get('/register/customer', [RegisterController::class,'showCustomerRegisterForm'])->name('register.customer');
// Route::get('/register/vendor', [RegisterController::class,'showVendorRegisterForm'])->name('register.vendor');

//Register route
//Route::post('/login/admin', [LoginController::class, 'adminLogin'])->name('login.admin');
//Route::post('/login/customer', [LoginController::class, 'customerLogin']);
//Route::post('/login/vendor', [LoginController::class, 'vendorLogin'])->name('login.vendor');

// Route::post('/register/admin', [RegisterController::class, 'createAdmin']);
// Route::post('/register/customer', [RegisterController::class, 'createCustomer']);
// Route::post('/register/vendor', [RegisterController::class, 'createVendor']);

// Route::post('/login/admin', 'Auth\LoginController@adminLogin');
// Route::post('/login/customer', 'Auth\LoginController@CustomerLogin');
// Route::post('/login/vendor', 'Auth\LoginController@VendorLogin');
// Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
// Route::post('/register/customer', 'Auth\RegisterController@createCustomer');
// Route::post('/register/vendor', 'Auth\RegisterController@createVendor');

//Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
//Route::get('/vendor', [VendorController::class, 'index'])->name('vendor');
// Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::group(['prefix' => 'vendor'], function() {
    Route::get('/login',[VendorLoginController::class, 'showLoginForm'])->name('vendor.login');
    Route::post('/login', [VendorLoginController::class, 'login'])->name('vendor.login');
    Route::post('/logout', [VendorLoginController::class, 'logout'])->name('vendor.logout');

    Route::get('/register',[VendorRegisterController::class, 'showRegisterForm'])->name('vendor.register');
    Route::post('/register', [VendorRegisterController::class, 'createVendor'])->name('vednor.register');

    //vendor Controller
    Route::get('/dashboard', [VendorController::class, 'index'])->name('vendor.dashboard');
});

Route::group(['prefix' => 'customer'], function() {
    Route::get('/login',[CustomerLoginController::class, 'showLoginForm'])->name('customer.login');
    Route::post('/login', [CustomerLoginController::class, 'login'])->name('customer.login');
    Route::post('/logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');

    Route::get('/register',[CustomerRegisterController::class, 'showRegisterForm'])->name('customer.register');
    Route::post('/register', [CustomerRegisterController::class, 'createCustomer'])->name('customer.register');

    Route::get('/dashboard',[CustomerController::class, 'index'])->name('customer.dashboard');

});

Route::group(['prefix' => 'admin'], function() {

    Route::get('/login',[AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    
    //Admin Controller
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/changepassword', [AdminController::class, 'changePassword'])->name('admin.changepassword');
    Route::post('/changepassword', [AdminController::class, 'changePasswordSave'])->name('admin.changepassword');
    
    Route::get('/editprofile', [AdminController::class, 'editProfile'])->name('admin.editprofile');
    Route::get('/customer', [AdminController::class, 'customer'])->name('admin.customer');
    Route::get('/vendor', [AdminController::class, 'vendor'])->name('admin.vendor');

});



// Route::prefix('admin')->group(function() {
//      Route::get('/login','AuthAdminLoginController@showLoginForm')->name('admin.login');
//      Route::post('/login', 'AuthAdminLoginController@login')->name('admin.login.submit');
//      Route::get('logout/', 'AuthAdminLoginController@logout')->name('admin.logout');
//      Route::get('/', 'AdminController@index')->name('admin.dashboard');
//  });
