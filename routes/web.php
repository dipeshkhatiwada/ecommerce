<?php
Route::get('/language/{lang}', 'frontend\FrontendController@language')->name('frontend.language');


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

Route::get('/', 'frontend\FrontendController@index')->name('frontend.index');

Route::get('/subcategory/{slug}', 'frontend\FrontendController@subcategory')->name('frontend.subcategory');
Route::get('/product/{slug}', 'frontend\FrontendController@product')->name('frontend.product');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/cart/add', 'frontend\FrontendController@addtocart')->name('frontend.addtocart');
Route::get('/cart', 'frontend\FrontendController@listcart')->name('frontend.listcart');
Route::get('/cart/delete/{rowId}', 'frontend\FrontendController@deletecart')->name('frontend.deletecart');

Route::prefix('backend')->middleware(['web','auth','checkpermission'])->namespace('backend')->name('backend.')->group(function (){

    Route::resource('user', 'UsersController');

//    Route::get('/category/create', 'CategoriesController@create')->name('category.create');
//    Route::get('/category', 'CategoriesController@index')->name('category.index');
//    Route::get('/category/{id}/edit', 'CategoriesController@edit')->name('category.edit');
//    Route::post('/category', 'CategoriesController@store')->name('category.store');
//    Route::put('/category/{id}', 'CategoriesController@update')->name('category.update');
//    Route::delete('/category/{id}', 'CategoriesController@destroy')->name('category.destroy');
//    Route::get('/category/{id}', 'CategoriesController@show')->name('category.show');
    Route::resource('category', 'CategoriesController');
    Route::resource('subcategory', 'SubcategoriesController');
    Route::resource('product', 'ProductsController');
    Route::post('/subcategory/getDataByCategory_id', 'SubcategoriesController@getDataByCategory_id')->name('subcategory.getDataByCategory_id');

    Route::resource('role', 'RolesController');
//        Route::post('/role', 'RolesController@store')->name('role.store');

    Route::resource('permission', 'PermissionsController');
    Route::resource('module', 'ModulesController');
    Route::resource('tag', 'TagsController');
    Route::get('/role/assignpermission/{id}', 'RolesController@assignpermission')->name('role.assignpermission');
    Route::post('/role/assignpermission', 'RolesController@postpermission')->name('role.postpermission');
    Route::get('/role/assignmodule/{id}', 'RolesController@assignmodule')->name('role.assignmodule');
    Route::post('/role/assignmodule', 'RolesController@postmodule')->name('role.postmodule');

    Route::post('{id}/product', 'ProductsController@destroy_image')->name('product.destroy_image');
});



Route::prefix('customer')->group(function () {
    Route::get('/', 'CustomerController@index')->name('customer.dashboard');
//    Route::get('dashboard', 'CustomerController@index')->name('customer.dashboard');
    Route::get('register', 'CustomerController@create')->name('customer.register');
    Route::post('register', 'CustomerController@store')->name('customer.register.store');
    Route::get('login', 'Auth\Customer\LoginController@login')->name('customer.auth.login');
    Route::post('login', 'Auth\Customer\LoginController@loginCustomer')->name('customer.auth.loginCustomer');
    Route::post('logout', 'Auth\Customer\LoginController@logout')->name('customer.auth.logout');
});


