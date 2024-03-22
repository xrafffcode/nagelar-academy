<?php

use App\Mail\Admin\ConfirmationTransaction;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

Route::namespace('App\Http\Controllers\User')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/kontak', function () {
        return view('pages.user.contact');
    })->name('contact');



    // Route Pelatihan
    Route::get('/pelatihan', 'TrainingController@index')->name('training.index');
    Route::get('/pelatihan/{training:slug}', 'TrainingController@show')->name('training.show');

    //Route Atikel
    Route::get('/artikel', 'ArticelController@index')->name('articel.index');
    Route::get('/artikel/{articel:slug}', 'ArticelController@show')->name('articel.show');

    Route::prefix('training-playing')->middleware(['auth'])->group(function () {
        Route::get('/{training:slug}', 'MyTrainingController@show')->name('training.play');
    });

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/checkout/{training:slug}', 'CheckoutController@index')->name('checkout.index');
        Route::post('/checkout', 'CheckoutController@checkout')->name('checkout.checkout');
        Route::get('/payment/{transaction_code}', 'CheckoutController@payment')->name('checkout.payment');
        Route::post('/payment', 'CheckoutController@paymentProcess')->name('checkout.process');
        Route::get('/invoice/{transaction_code}', 'MyOrderController@invoice')->name('invoice');

        Route::post('/submit-rating', 'MyTrainingController@sendReview')->name('training.review');


        // Route::get('/order-berhasil', function () {
        //     return view('pages.user.progress');
        // })->name('checkout-progress');

        Route::get('/order-berhasil', 'CheckoutController@success')->name('checkout-progress');
    });
});


Route::prefix('profil')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\Auth\ProfileSettingController@index')->name('profil.dashboard');
    Route::get('/', 'App\Http\Controllers\Auth\ProfileSettingController@edit')->name('profil.edit');
    Route::put('/profil', 'App\Http\Controllers\Auth\ProfileSettingController@update')->name('profil.update');
    Route::get('/kelas-saya', 'App\Http\Controllers\Auth\ProfileSettingController@myClass')->name('profil.myclass');
    Route::get('/orderan-saya', 'App\Http\Controllers\User\MyOrderController@index')->name('profil.myorder');
});




Route::namespace('App\Http\Controllers\Admin')->group(function () {
    Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::resource('kategori-pelatihan', 'CategoryController');
        Route::resource('pelatihan', 'TrainingController');
        Route::resource('mentor', 'MentorController');
        Route::resource('artikel', 'ArticelController');
        Route::resource('transaksi', 'TransactionController');

        Route::post('/review-artikel', 'ArticelController@acc')->name('artikel.accept');
    });
});

Auth::routes();
