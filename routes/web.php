<?php

// Route::middleware(Admin::class)->group(function () {

Route::auth();

Route::get('/', 'HomePageController@index');

Route::get('/admin', 'AdminController@index');

Route::get('/admin/manage-prices', 'PricesController@index');

Route::get('/admin/manage-parking-spaces', 'ParkingSpacesController@index');

// });