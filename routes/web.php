<?php

// Route::middleware(Admin::class)->group(function () {

Route::auth();

Route::get('/', 'HomePageController@index');
// });