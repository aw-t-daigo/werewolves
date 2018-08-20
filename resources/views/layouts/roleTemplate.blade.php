<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>人狼GM支援ツール（仮）</title>
</head>
<body>

<div>
    <button id="dummy">処刑者選択</button>
</div>

<div id="container">
    @yield('content')
</div>

<div id="input-container">
    <div id="app">
        @yield('input-content')
    </div>
</div>

<script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
