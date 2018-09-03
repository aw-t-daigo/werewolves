<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>人狼GM支援ツール（仮）</title>
</head>
<body>

<div class="top-wrapper">
    <div class="container">
        <div class="page-header">
            <h1>人狼GM支援ツール
                <small>（仮）</small>
            </h1>
        </div>

        <div class="top-button">
            <form action="/create" id="create-room-form" method="get">
                <button class="btn btn-primary btn-lg" type="submit" id="create-room">部屋を作る</button>
            </form>
        </div>

        <div class="top-button">
            <form action="/enter" id="enter-room-form" method="get">
                <button class="btn btn-primary btn-lg" type="submit" id="enter-room">参加する</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>


