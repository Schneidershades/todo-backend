<?php

use Illuminate\Support\Facades\Route;

Route::resource('/todos', 'Api\TodoController');
Route::resource('/pins', 'Api\PinController');
