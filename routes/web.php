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
    return view('welcome');
});

Route::group(['prefix' => 'messages'], function(){
	
	Route::get('getme/{numbersMessage}', [
			'uses'	=>	'Receive@lastMessages',
			'as'	=>	'getme'
		]
	);

	Route::get('getmeby/{whatsAppNumber}/{numbersMessage}', [
			'uses'	=>	'Receive@byWhatsAppNumber',
			'as'	=>	'getmeby'
		]
	);

});
