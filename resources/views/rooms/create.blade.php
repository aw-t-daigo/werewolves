@extends('layouts.roomTemplate')

@section('title', '部屋作成')

@section('mainTitle')
    <h2>新しい部屋を作る</h2>
@endsection

@section('content')
    <form action="/create" id="create-room-form" method="post">
        @csrf
        <div class="form-group">
            <label for="select-player-num">プレイヤー数</label>
            <select name="player_num"
                    class="form-control @if ($errors->any()) is-invalid @endif"
                    id="select-player-num">
                <option value="0">プレイヤー数</option>
                @for ($i = Config::get('const.minPlayer'); $i <= Config::get('const.maxPlayer'); $i++)
                    <option value="{{$i}}">{{$i}}人</option>
                @endfor
            </select>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="invalid-feedback">{{ $error }}</div>
                @endforeach
            @endif
        </div>
        <button class="btn btn-primary btn-block" type="submit">作成</button>
    </form>
@endsection
