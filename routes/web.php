<?php
Route::auth();

Route::middleware('auth')->group(function () {
    Route::get('/', 'HomePageController@index')->name('home');

    Route::prefix('admin')->group(function () {

        Route::get('/', 'AdminController@index')->name('admin');
        Route::get('/manage-price', 'PriceController@index')->name('manage-price');
        Route::get('/parking-space', 'ParkingSpaceController@index')->name('parking-space');

        Route::get('/parking-model', 'ParkingModelController@index')->name('parking-model');
        Route::post('/parking-model', 'ParkingModelController@create')->name('parking-model-create');

        Route::get('/manage-user', 'ManageUserController@index')->name('manage-user');

    });
});
