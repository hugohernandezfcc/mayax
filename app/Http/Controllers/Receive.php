<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Carbon\Carbon;


class Receive extends Controller
{


    /**
     * Return a collection of messages. 
     *
     * @return \Illuminate\Http\Response
     */
    public function lastMessages($numbersMessage){

        $client = new Client();
        $response = $client->get( config('app.apichat')['url_apichat'] . config('app.apichat')['instance_sb'] . '/messages?last=1&token=' . config('app.apichat')['token_sandbox']);

        $messages = json_decode($response->getBody());
        for ($i=0; $i < count($messages->messages); $i++)  
            $messages->messages[$i]->time = date("Y-m-d H:i:s", $messages->messages[$i]->time);

        $messageOrderByDate = array();

        for ($i = count($messages->messages) - 1; $i >= 0; $i--) 
            array_push($messageOrderByDate, $messages->messages[$i]);

        if (is_numeric($numbersMessage)) {
            
            if ($numbersMessage < 101) {
                $toReturn = array();

                for ($i=0; $i < $numbersMessage; $i++) 
                    array_push($toReturn, $messageOrderByDate[$i]);
               
                return response()->json($toReturn); 
            }else
                return response()->json('THE_VALUE:_' . $numbersMessage . '_IS_GREATER_THAN_100');

        }else
            return response()->json('NOT_NUMERIC_VALUE_RECEIVED');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byWhatsAppNumber($whatsAppNumber, $numbersMessage)
    {
        $client = new Client();
        $response = $client->get( config('app.apichat')['url_apichat'] . config('app.apichat')['instance_sb'] . '/messages?last=1&token=' . config('app.apichat')['token_sandbox']);

        $messages = json_decode($response->getBody());
        for ($i=0; $i < count($messages->messages); $i++)  
            $messages->messages[$i]->time = date("Y-m-d H:i:s", $messages->messages[$i]->time);

        $messageOrderByDate = array();

        for ($i = count($messages->messages) - 1; $i >= 0; $i--) 
            array_push($messageOrderByDate, $messages->messages[$i]);

        if (is_numeric($numbersMessage)) {
            
            if ($numbersMessage < 101) {
                $toReturn = array();

                $messageOrderByDate
               
                return response()->json($toReturn); 
            }else
                return response()->json('THE_VALUE:_' . $numbersMessage . '_IS_GREATER_THAN_100');

        }else
            return response()->json('NOT_NUMERIC_VALUE_RECEIVED');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
