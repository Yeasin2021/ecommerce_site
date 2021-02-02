<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',[
	'uses' => 'FrontController@index', 
	'as' => '/'
]);

Route::get('/category/product/{category}', 'FrontController@categoryProduct')->name('category-product');
Route::get('/category/products/details/{id}', 'FrontController@productDetails')->name('product-details');

Route::post('/category/products/cart/{id}', 'CartController@addToCart')->name('product-cart');
Route::get('/category/products/cart/show', 'CartController@showCart');

Route::post('/category/products/update','CartController@update')->name('update');
Route::get('/category/products/item-remove/{id}','CartController@cartItemRemove')->name('item-remove');

Route::get('/category/products/checkout/', 'CartController@checkOut')->name('product-checkout');
Route::post('/category/products/customer/checkout', 'CustomerController@bill')->name('customer-checkout');

//Route::get('/','FrontController@index')->name('/');
//Route::get('/','FrontController@index');

/*Route::get('/category',[
	'uses' => 'FrontController@category', 
	'as' => 'category'
]);*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category/add',[
'uses' => 'CategoryController@index',
'as' => 'category-add'
]);

Route::post('/category/save',[
'uses' => 'CategoryController@saveCategory',
'as' => 'new-category'
]);

Route::get('/category/manage',[
'uses' => 'CategoryController@manageCategory',
'as' => 'manage-category'
]);

Route::get('/category/unpublished/{id}',[
'uses' => 'CategoryController@unpublishedCategory',
'as' => 'unpublished-category'
]);


Route::get('/category/published/{id}',[
'uses' => 'CategoryController@publishedCategory',
'as' => 'published-category'
]);

Route::get('/category/edit/{id}',[
'uses' => 'CategoryController@editCategory',
'as' => 'edit-category'
]);

Route::post('/category/update/{id}',[
'uses' => 'CategoryController@updateCategory',
'as' => 'update-category'
]);

Route::get('/category/delet/{id}',[
'uses' => 'CategoryController@deleteCategory',
'as' => 'delete-category'
]);


Route::get('/brand/index', 'BrandController@index')->name('brand-add');
Route::post('/brand/add', 'BrandController@store')->name('new-brand');
Route::get('/brand/manage', 'BrandController@show')->name('brand-manage');

Route::get('/brand/unpublished/{id}',[
'uses' => 'BrandController@unpublishedBrand',
'as' => 'unpublished-brand'
]);


Route::get('/brand/published/{id}',[
'uses' => 'BrandController@publishedBrand',
'as' => 'published-brand'
]);


Route::get('/brand/edit/{id}',[
'uses' => 'BrandController@editBrand',
'as' => 'edit-brand'
]);

Route::post('/brand/update/{id}',[
'uses' => 'BrandController@update',
'as' => 'update-brand'
]);

Route::get('/brand/delete/{id}',[
'uses' => 'BrandController@destroy',
'as' => 'delete-brand'
]);

Route::get('/product/add', 'ProductController@index')->name('product-add');
Route::post('/product/save', 'ProductController@saveProduct')->name('new-product');
Route::get('/product/manage', 'ProductController@manageProduct')->name('manage-product');
Route::get('/product/unpublished/{id}', 'ProductController@unpublishedProduct')->name('unpublished-brand');
Route::get('/product/published/{id}', 'ProductController@publishedProduct')->name('published-brand');
Route::get('/product/edit/{id}', 'ProductController@editProduct')->name('edit-product');
Route::post('/product/update/{id}', 'ProductController@updateProduct')->name('update-product');
Route::get('/product/delete/{id}', 'ProductController@deleteProduct')->name('delete-product');
