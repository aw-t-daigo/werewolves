<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>人狼GM支援ツール（仮）- @yield('title')</title>
</head>
<body>

<div class="container-fluid pb-3 mt-3">
    <div class="row">
        <div class="col-sm-9">
            <header>
                @section('mainTitle')
                @show
            </header>
        </div>

        <div class="offset-sm-9 col-sm-3">
            <form action="/" method="get">
                <button class="btn btn-sm" id="return-top-button" type="submit">トップへ戻る</button>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    @yield('content')
</div>

</body>
</html>
