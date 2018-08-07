@extends('layouts.roomTemplate')

@section('title', '部屋作成')

@section('mainTitle')
    <span>新しい部屋を作る</span>
@endsection

@section('content')
    <form action="/create" id="create-room-form" method="post">
        @csrf
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <span>{{ $error }}</span>
            @endforeach
        @endif
        <select name="player_num" id="select-player-num">
            <option value="0">プレイヤー数</option>
            @for ($i = 5; $i <= 20; $i++)
                <option value="{{$i}}">{{$i}}人</option>
            @endfor
        </select>
        <button type="submit">作成</button>
    </form>
@endsection
