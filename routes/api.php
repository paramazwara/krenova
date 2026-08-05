<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/spa/me', 'Api\\SpaController@me');
Route::get('/spa/options', 'Api\\SpaController@options');
Route::get('/spa/kelurahan/{kecamatanId}', 'Api\\SpaController@kelurahan');
Route::get('/spa/inventor', 'Api\\SpaController@inventor');
Route::put('/spa/inventor', 'Api\\SpaController@saveInventor');
Route::get('/spa/innovations', 'Api\\SpaController@innovations');