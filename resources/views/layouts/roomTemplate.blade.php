<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>人狼GM支援ツール（仮）- @yield('title')</title>
</head>
<body>

<header>
    @section('mainTitle')
    @show
</header>

<div>
    <button id="return-top-button" onclick="location.href='/'">トップへ戻る</button>
</div>

<div class="container">
    @yield('content')
</div>

</body>
</html>
