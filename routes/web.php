<?php

use Illuminate\Support\Facades\Route;

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


Route::prefix('dashboard')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

});
Route::namespace('Admin')->prefix('admin')->middleware(['auth_admin'])->group(function () {
    Route::get('/', 'AdminDashboardController@index')->name('admin.dashboard');
    Route::get('dashboard', 'AdminDashboardController@index');
    Route::resource('admins', 'AdminController');
    Route::resource('shops', 'ShopController');
    Route::resource('customers', 'CustomerController');

});
Route::prefix('admin')->middleware(['auth_admin'])->group(function () {
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});
Route::middleware(['auth_admin'])->group(function () {
    Route::get('/', 'Admin\AdminDashboardController@index')->name('admin.dashboard');
});
