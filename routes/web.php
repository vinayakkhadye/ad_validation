<?php

use Illuminate\Support\Facades\Route;

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

error_reporting(E_ALL);
ini_set('display_errors', 1);

//Route::get('/', function () {
//    return view('welcome');
//});
date_default_timezone_set('Asia/Kolkata');

Route::match(['get', 'post'], '/', 'HomeController@index');
