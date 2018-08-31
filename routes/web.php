<?php
Route::auth();

Route::middleware('auth')->group(function () {
    Route::get('/', 'HomePageController@index')->name('home');

    Route::prefix('admin')->group(function () {

        Route::get('/', 'AdminController@index')->name('admin');
        Route::get('/manage-price', 'PriceController@index')->name('manage-price');
        Route::get('/parking-space', 'ParkingSpaceController@index')->name('parking-space');

        Route::get('/parking-model', 'ParkingModelController@index')->name('parking-model');

        Route::get('/parking-model-view', 'ParkingModelController@create')->name('parking-model-create-view');
        Route::post('/parking-model-store', 'ParkingModelController@store')->name('parking-model-create-store');

        Route::get('/parking-model-edit/{model}', 'ParkingModelController@edit')->name('parking-model-edit-view');
        Route::post('/parking-model', 'ParkingModelController@update')->name('parking-model-edit');

        Route::get('/parking-model-show/{model}', 'ParkingModelController@show')->name('parking-model-show');

        Route::get('/parking-model-destroy/{model}', 'ParkingModelController@destroy')->name('parking-model-destroy');

        Route::get('/manage-user', 'ManageUserController@index')->name('manage-user');
        Route::post('save-parking-level', 'ParkingModelController@getParkingLevel')->name('save-parking-level');

    });
});
