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

use Illuminate\Support\Facades\Auth;

Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'myLocale']], function () {


    Route::group(['prefix' => 'admin'], function () {
        /* Admin route */
        Voyager::routes();
        Route::get('category-images/{id}', 'Admin\CategoryController@images')->name('category.image');
        Route::post('select-category-images/{id}', 'Admin\CategoryController@select_images')->name('category.select_images');
        Route::post('save-category-images/{id}', 'Admin\CategoryController@save_image')->name('category.save_image');
    });


    /* User route */
    Auth::routes();
    Route::group(['prefix' => 'account'], function () {
        Route::group(['middleware' => 'myAuth'], function () {
            Route::get('/', 'User\UserController@index')->name('user.dashboard');
            Route::resource('product','User\UserProductController');
            Route::post('change-general-image/{slug}', 'User\UserProductController@change_general_image')->name('change_general_image');
            Route::post('delete-image', 'User\UserController@delete_image')->name('user.delete_image');
            Route::resource('profile', 'User\ProfileController');
            Route::get('profile/{slug}/{changes}', 'User\ProfileController@edit')->name('profile.edit');
            Route::put('profile/{slug}/{changes}', 'User\ProfileController@update')->name('profile.update');

        });

        /* Login */

        Route::post('login', 'User\LoginController@login')->name('login');

    });

    /* Gusest Route*/

    Route::get('/about' , function (){
        return view('frontend.about');
    });

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/category/{slug}', 'HomeController@index')->name('category');
    Route::post('/get-cat' , 'HomeController@get_cat')->name('get_cat');

    Route::get('/support', 'HomeController@support')->name('support');

    Route::match(['get', 'post'], 'logout', function () {
        Auth::logout();
        return redirect()->route('home');
    })->name('voyager.logout');

    Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify')->name('email_verification');


});





