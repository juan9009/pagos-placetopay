<?php

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

Route::get('/', function () {
    return redirect('pago');
    return view('welcome');
});

// Route::get('/pago', 'ServiciosPago@getBankList');
Route::get('/pago/bancos', 'ServiciosPago@getBankList');
Route::post('/pago/verifyUser', 'UserController@verifyUser');
/*Route::get('/pago/iniciarpago', function () {
    return redirect('/pago/banco');
});*/
Route::any('/pago/iniciarpago', 'ServiciosPago@iniciarPago')->name('pago.iniciarpago');
Route::get('/pago/informacionpago', 'ServiciosPago@informacionPago')->name('pago.informacionpago');
Route::any('/pago/confirmarpagobanco', 'ServiciosPago@confirmarPagoBanco')->name('pago.confirmarpagobanco');
Route::any('/pago/debug', 'ServiciosPago@realizarPago')->name('pago.realizarpago');
Route::post('/pago/creartransaccion', 'ServiciosPago@createTransaction')->name('pago.creartransaccion');
Route::post('/pago/RedirectToBank', 'UserController@create')->name('pago.redirecttobank');
Route::resource('pago', 'ServiciosPago');
