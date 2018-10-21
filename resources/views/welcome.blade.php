@extends('layouts.master')

@section('content')
    <p id="power">0</p>



    <div id="hugo"></div>
@stop

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
    <script>
        var socket = io('http://127.0.0.1:3000');
        //var socket = io('http://192.168.10.10:3000');
        socket.on("test-channel:App\\Events\\EventName", function(message){
            // increase the power everytime we load test route
            
            $('#power').text(parseInt($('#power').text()) + parseInt(message.data.power));
        });
    </script>
@stop
