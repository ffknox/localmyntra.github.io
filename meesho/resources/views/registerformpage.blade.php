@extends('myntra')
@section('content')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <style>
        body{
            background: rgb(255, 236, 239);
        }

    </style>
    <body>
    @if (session('loginmessage'))
        {{ session('loginmessage') }}
        @endif
        <div class="registerformcontainer">
            @include('registerform')
        </div>

    </body>
    </html>

    @endsection

