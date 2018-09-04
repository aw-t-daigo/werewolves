<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>人狼GM支援ツール（仮）</title>
</head>
<body>

<div class="container-fluid sticky-top" id="modal-button">
    <div class="row d-flex justify-content-end pt-2 mr-1">
        <button is="modal-template"></button>
        @yield('modals')
    </div>
</div>

<div class="container" id="container">
    <div class="row  pt-3 mb-5">
        <div class="offset-sm-1 col-sm-10">
            @yield('content')
        </div>
    </div>
</div>

<div id="input-container">
    <div id="input">
        <div class="fixed-bottom">
            @yield('input-content')
        </div>
    </div>
</div>

<script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
