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
*/

// 支付宝小程序
Route::any('alipay_applet/setting', 'AlipayAppletController@setting');
Route::any('alipay_applet/template', 'AlipayAppletController@template');
