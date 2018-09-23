<?php
Route::auth();

Route::middleware('auth')->group(function () {
    Route::get('/', 'HomePageController@index')->name('home');

    Route::prefix('admin')->group(function () {

        Route::get('/', 'AdminController@index')->name('admin');

        Route::get('/parking-model', 'ParkingModelController@index')->name('parking-model');

        Route::get('/parking-model-view', 'ParkingModelController@create')->name('parking-model-create-view');
        Route::post('/parking-model-store', 'ParkingModelController@store')->name('parking-model-create-store');

        Route::get('/parking-model-edit/{model}', 'ParkingModelController@edit')->name('parking-model-edit-view');
        Route::post('/parking-model', 'ParkingModelController@update')->name('parking-model-edit');

        Route::get('/parking-model-show/{model}', 'ParkingModelController@show')->name('parking-model-show');

        Route::delete('/parking-model-destroy/{model}', 'ParkingModelController@destroy')->name('parking-model-destroy');

        Route::get('/manage-user', 'ManageUserController@index')->name('manage-user');
        Route::post('save-parking-level', 'ParkingModelController@getParkingLevel')->name('save-parking-level');

        Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
            Route::get('', 'CustomerController@index')->name('index');
            Route::get('/create', 'CustomerController@create')->name('create');
            Route::post('/store', 'CustomerController@store')->name('store');
            Route::get('/edit/{customer}', 'CustomerController@edit')->name('edit');
            Route::post('/update/{customer}', 'CustomerController@update')->name('update');
            Route::get('/destroy/{customer}', 'CustomerController@destroy')->name('destroy');
        });

        Route::get('parking-model/{model}/parkind-space/{space}/price', 'ParkingPriceController@index')->name('price.index');
        Route::post('parking-model/{model}/parkind-space/{space}/price/store', 'ParkingPriceController@store')->name('price.store');

        Route::get('parking-model/{model}/parkind-space/{space}/price/edit/{price}', 'ParkingPriceController@edit')->name('price.edit');
        Route::post('parking-model/{model}/parkind-space/{space}/price/update/{price}', 'ParkingPriceController@update')->name('price.update');

        Route::get('parking-model/{model}/parkind-space/{space}/reservation', 'ParkingReservationController@create')->name('reservation.create');
        Route::post('parking-model/{model}/parkind-space/{space}/reservation/store', 'ParkingReservationController@store')->name('reservation.store');

        Route::group(['prefix' => 'reservation', 'as' => 'reservation.'], function () {
            Route::get('/reservations', 'ParkingReservationController@index')->name('index');
            Route::get('/show/{reservation}', 'ParkingReservationController@show')->name('show');
            Route::get('/edit/{reservation}', 'ParkingReservationController@edit')->name('edit');
            Route::post('/update/{reservation}', 'ParkingReservationController@update')->name('update');
            Route::delete('/destroy/{reservation}', 'ParkingReservationController@destroy')->name('destroy');
        });

        Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
            Route::post('getReservations', 'ParkingReservationController@getReservations');
        });

        Route::group(['prefix' => 'activity_log', 'as' => 'activity_log.'], function () {
            Route::get('', 'ActivityLogController@index')->name('index');
        });
    });
});
