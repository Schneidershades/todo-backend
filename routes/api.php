<?php

use Illuminate\Support\Facades\Route;

Route::resource('/todos', 'Api\TodoController');
Route::resource('/pins', 'Api\PinController');
Route::resource('/store-api-keys', 'Api\SettingController');
Route::resource('/subscribers', 'Api\SubscriberController');

