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

Route::get('/', function () {
    return view('frontend/index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('backend.index');
})->name('dashboard');

    Route::post('/login/user','App\Http\Controllers\HomeController@login')->name('login.user');


    Route::group(['prefix' => 'content', 'as' => 'content.'], function () {
        Route::get('/page/{id}/{slug}', 'App\Http\Controllers\Frontend\ContentController@page')->name('page');
        Route::get('/section/{id}/{slug}', 'App\Http\Controllers\Frontend\ContentController@section')->name('section');
        Route::get('/category/{id}/{slug}', 'App\Http\Controllers\Frontend\ContentController@category')->name('category');
        Route::get('/post/{id}/{slug}', 'App\Http\Controllers\Frontend\ContentController@post')->name('post');
    });

    Route::group(['prefix' => 'informasi', 'as' => 'informasi.'], function () {
        Route::get('/{slug}', 'App\Http\Controllers\Frontend\InformasiController@index')->name('index');
        Route::get('preview/{slug}', 'App\Http\Controllers\Frontend\InformasiController@preview')->name('preview');
    });

    Route::group(['prefix' => 'profil', 'as' => 'profil.'], function () {
        Route::get('/{slug}', 'App\Http\Controllers\Frontend\ProfilController@index')->name('index');
    });

    Route::get('/kontak', 'App\Http\Controllers\Frontend\InformasiController@kontak')->name('kontak');
    Route::get('/preview/slider/{id}', 'App\Http\Controllers\Frontend\InformasiController@prevslider')->name('preview.slider');
    Route::get('/format/transaksi', 'App\Http\Controllers\Frontend\InformasiController@formatTransaksi')->name('format.transaksi');
    Route::get('/cara/pendaftaran', 'App\Http\Controllers\Frontend\InformasiController@caraPendaftaran')->name('cara.pendaftaran');
    Route::get('/produk', 'App\Http\Controllers\Frontend\InformasiController@produk')->name('produk');
    


Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'admin'], function () {

    Route::get('/home','App\Http\Controllers\HomeController@home')->name('home');
    

    // user
     Route::get('/user', 'App\Http\Controllers\Admin\UsersController@index')->name('users.index');
     Route::get('/user/create', 'App\Http\Controllers\Admin\UsersController@create')->name('users.create');
     Route::post('/user/store', 'App\Http\Controllers\Admin\UsersController@store')->name('users.store');
     Route::get('/user/edit/{id}', 'App\Http\Controllers\Admin\UsersController@edit')->name('users.edit');
     Route::put('user/update/{id}', 'App\Http\Controllers\Admin\UsersController@update')->name('users.update');
     Route::put('user/status/{id}', 'App\Http\Controllers\Admin\UsersController@status')->name('users.status');
     Route::get('user/delete/{id}', 'App\Http\Controllers\Admin\UsersController@destroy')->name('users.destroy');
     Route::get('user/profile', 'App\Http\Controllers\Admin\UsersController@profile')->name('users.profile');
     Route::post('user/update-profile/{id}', 'App\Http\Controllers\Admin\UsersController@updateProfile')->name('users.update-profile');
     Route::put('user/change-photo/{id}', 'App\Http\Controllers\Admin\UsersController@changePhoto')->name('users.change-photo');
     Route::put('user/remove-photo/{id}', 'App\Http\Controllers\Admin\UsersController@removePhoto')->name('users.remove-photo');
        
    
     //pages
     Route::get('/pages', 'App\Http\Controllers\Admin\PagesController@index')->name('pages.index');
     Route::get('/pages/create', 'App\Http\Controllers\Admin\PagesController@create')->name('pages.create');
     Route::post('/pages/store', 'App\Http\Controllers\Admin\PagesController@store')->name('pages.store');
     Route::get('/pages/{id}/edit', 'App\Http\Controllers\Admin\PagesController@edit')->name('pages.edit');
     Route::put('/pages/{id}/update', 'App\Http\Controllers\Admin\PagesController@update')->name('pages.update');
     Route::put('/pages/status/{id}', 'App\Http\Controllers\Admin\PagesController@status')->name('pages.status');
     Route::put('/pages/position/{id}/{position}/{parent}', 'App\Http\Controllers\Admin\PagesController@position')->name('pages.position');
     Route::get('/pages/{id}/delete', 'App\Http\Controllers\Admin\PagesController@destroy')->name('pages.destroy');
    
     //pages media
     Route::get('/media/{pageId}', 'App\Http\Controllers\Admin\PagesController@media')->name('pages.media');
     Route::post('/media/{pageId}', 'App\Http\Controllers\Admin\PagesController@storeMedia')->name('pages.media.store');
     Route::put('/media/{id}', 'App\Http\Controllers\Admin\PagesController@updateMedia')->name('pages.media.update');
     Route::put('/media/{id}/{position}/{pageId}', 'App\Http\Controllers\Admin\PagesController@positionMedia')->name('pages.media.position');
     Route::post('/media/sort/image', 'App\Http\Controllers\Admin\PagesController@sortMedia')->name('pages.media.sort');
     Route::get('/media/destroy/{id}', 'App\Http\Controllers\Admin\PagesController@destroyMedia')->name('pages.media.destroy');



    //slider
    Route::get('/slider', 'App\Http\Controllers\Admin\SliderController@index')->name('slider.index');
    Route::get('/slider/create', 'App\Http\Controllers\Admin\SliderController@create')->name('slider.create');
    Route::post('/slider/store', 'App\Http\Controllers\Admin\SliderController@store')->name('slider.store');
    Route::get('/slider/{id}/edit', 'App\Http\Controllers\Admin\SliderController@edit')->name('slider.edit');
    Route::put('/slider/{id}/update', 'App\Http\Controllers\Admin\SliderController@update')->name('slider.update');
    Route::get('/slider/{id}/delete', 'App\Http\Controllers\Admin\SliderController@destroy')->name('slider.destroy');

       
    Route::get('category/product', 'App\Http\Controllers\Admin\CategoryProductController@index')->name('category.product.index');
    Route::get('category/product/create', 'App\Http\Controllers\Admin\CategoryProductController@create')->name('category.product.create');
    Route::post('category/product/store', 'App\Http\Controllers\Admin\CategoryProductController@store')->name('category.product.store');
    Route::get('category/product/{id}/edit', 'App\Http\Controllers\Admin\CategoryProductController@edit')->name('category.product.edit');
    Route::get('category/product/{id}/preview', 'App\Http\Controllers\Admin\CategoryProductController@preview')->name('category.product.preview');
    Route::put('category/product/{id}/update', 'App\Http\Controllers\Admin\CategoryProductController@update')->name('category.product.update');
    Route::get('category/product/{id}/delete', 'App\Http\Controllers\Admin\CategoryProductController@destroy')->name('category.product.destroy');
        
    Route::get('/product/{id}', 'App\Http\Controllers\Admin\ProductController@index')->name('product.index');
     Route::get('/product/create/{category_content_id}', 'App\Http\Controllers\Admin\ProductController@create')->name('product.create');
     Route::post('/product/store', 'App\Http\Controllers\Admin\ProductController@store')->name('product.store');
     Route::get('/product/{category_content_id}/{id}/edit', 'App\Http\Controllers\Admin\ProductController@edit')->name('product.edit');
     Route::get('/product/{id}/preview', 'App\Http\Controllers\Admin\ProductController@preview')->name('product.preview');
     Route::put('/product/{id}/update', 'App\Http\Controllers\Admin\ProductController@update')->name('product.update');
     Route::get('/product/{id}/delete', 'App\Http\Controllers\Admin\ProductController@destroy')->name('product.destroy');
    

     Route::get('category/content', 'App\Http\Controllers\Admin\CategoryKontenController@index')->name('category.content.index');
     Route::get('category/content/create', 'App\Http\Controllers\Admin\CategoryKontenController@create')->name('category.content.create');
     Route::post('category/content/store', 'App\Http\Controllers\Admin\CategoryKontenController@store')->name('category.content.store');
     Route::get('category/content/{id}/edit', 'App\Http\Controllers\Admin\CategoryKontenController@edit')->name('category.content.edit');
     Route::get('category/content/{id}/preview', 'App\Http\Controllers\Admin\CategoryKontenController@preview')->name('category.content.preview');
     Route::put('category/content/{id}/update', 'App\Http\Controllers\Admin\CategoryKontenController@update')->name('category.content.update');
     Route::get('category/content/{id}/delete', 'App\Http\Controllers\Admin\CategoryKontenController@destroy')->name('category.content.destroy');
    
     Route::get('/content/{id}', 'App\Http\Controllers\Admin\KontenController@index')->name('content.index');
     Route::get('/content/create/{category_content_id}', 'App\Http\Controllers\Admin\KontenController@create')->name('content.create');
     Route::post('/content/store', 'App\Http\Controllers\Admin\KontenController@store')->name('content.store');
     Route::get('/content/{category_content_id}/{id}/edit', 'App\Http\Controllers\Admin\KontenController@edit')->name('content.edit');
     Route::get('/content/{id}/preview', 'App\Http\Controllers\Admin\KontenController@preview')->name('content.preview');
     Route::put('/content/{id}/update', 'App\Http\Controllers\Admin\KontenController@update')->name('content.update');
     Route::get('/content/{id}/delete', 'App\Http\Controllers\Admin\KontenController@destroy')->name('content.destroy');
    
    //config
    Route::get('web-config', 'App\Http\Controllers\Admin\ConfigController@config')->name('web-config');
    Route::put('update/config', 'App\Http\Controllers\Admin\ConfigController@updateConfig')->name('update.config');
    Route::put('update/config/background', 'App\Http\Controllers\Admin\ConfigController@updateConfigBackground')->name('update.config.background');
    Route::post('store/config/', 'App\Http\Controllers\Admin\ConfigController@storeTingkat')->name('store.tingkat');
    Route::delete('config/{id}/delete', 'App\Http\Controllers\Admin\ConfigController@destroy')->name('config.penyakit.destroy');
   
    
    //dosen
    Route::get('/dosen', 'App\Http\Controllers\Admin\DosenController@index')->name('dosen.index');
    Route::get('/dosen/create', 'App\Http\Controllers\Admin\DosenController@create')->name('dosen.create');
    Route::post('/dosen/store', 'App\Http\Controllers\Admin\DosenController@store')->name('dosen.store');
    Route::get('/dosen/{id}/edit', 'App\Http\Controllers\Admin\DosenController@edit')->name('dosen.edit');
    Route::put('/dosen/{id}/update', 'App\Http\Controllers\Admin\DosenController@update')->name('dosen.update');
    Route::put('/dosen/position/{id}/{position}', 'App\Http\Controllers\Admin\DosenController@position')->name('dosen.position');
    Route::get('/dosen/{id}/delete', 'App\Http\Controllers\Admin\DosenController@destroy')->name('dosen.destroy');
   

        
   
    });
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'Cache Cleared';
});