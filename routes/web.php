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


Route::get('/requestDemo', function () {

	

	$client = new GuzzleHttp\Client();
   	$response = $client->get('https://eu21.chat-api.com/instance13554/messages?token=5c3yhxh90meww8g5');

   	echo "Hugo : <br/>";
	echo date("Y-m-d H:i:s", 1534208250);
 //   	echo "<pre>";
 //   	print_r(json_decode($response->getBody()));
	// echo "</pre>";
	// echo "<br/>";

	$messages = json_decode($response->getBody());
	for ($i=0; $i < count($messages->messages); $i++) { 
		$messages->messages[$i]->time = date("Y-m-d H:i:s", $messages->messages[$i]->time);
	}
	
	dd($messages->messages);

});
