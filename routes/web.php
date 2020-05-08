<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index')->name('admin.home');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');

// Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');


// Admin section -Categories
Route::get('admin/categories', 'Admin\Category\CategoryController@index')->name('categories.index');
Route::post('admin/category/store', 'Admin\Category\CategoryController@store')->name('category.store');
Route::get('admin/category/delete/{id}', 'Admin\Category\CategoryController@delete')->name('category.delete');
Route::get('admin/category/edit/{id}', 'Admin\Category\CategoryController@edit')->name('category.edit');
Route::put('admin/category/update/{id}', 'Admin\Category\CategoryController@update')->name('category.update');

// Admin section -Brands
Route::get('admin/brands', 'Admin\Category\BrandController@index')->name('brands.index');
Route::post('admin/brands/store', 'Admin\Category\BrandController@store')->name('brand.store');
Route::get('admin/brands/delete/{id}', 'Admin\Category\BrandController@delete')->name('brand.delete');
Route::get('admin/brands/edit/{id}', 'Admin\Category\BrandController@edit')->name('brand.edit');
Route::put('admin/brands/update/{id}', 'Admin\Category\BrandController@update')->name('brand.update');

