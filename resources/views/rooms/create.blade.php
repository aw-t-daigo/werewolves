@extends('layouts.roomTemplate')

@section('title', '部屋作成')

@section('mainTitle')
    <h2>新しい部屋を作る</h2>
@endsection

@section('content')
    <form action="/create" id="create-room-form" method="post">
        <div class="form-group">
            @csrf
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endforeach
            @endif
            <div class="mt-2">
                <select name="player_num" class="form-control" id="select-player-num">
                    <option value="0">プレイヤー数</option>
                    @for ($i = Config::get('const.minPlayer'); $i <= Config::get('const.maxPlayer'); $i++)
                        <option value="{{$i}}">{{$i}}人</option>
                    @endfor
                </select>
            </div>
            <div class="row">
                <div class="offset-8 col-4">
                    <button class="btn btn-primary btn-lg" type="submit">作成</button>
                </div>
            </div>
        </div>
    </form>
@endsection
