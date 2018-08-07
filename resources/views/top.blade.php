<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>人狼GM支援ツール（仮）</title>
</head>
<body>

<div id="title">
    <span>人狼GM支援ツール（仮）</span>
</div>

<form action="/create" id="create-room-form" method="get">
    <button type="submit" id="create-room">部屋を作る</button>
</form>

<form action="/enter" id="enter-room-form" method="get">
    <button type="submit" id="enter-room">参加する</button>
</form>

</body>
</html>


