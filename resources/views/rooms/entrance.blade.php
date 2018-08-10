@extends('layouts.roomTemplate')

@section('title', '入室')

@section('mainTitle')
    <span>部屋に入る</span>
@endsection

@section('content')
    <form action="/enter" id="entrance-room-form" method="post">
        @csrf
        <div id="content-room-id">
            <span>部屋ID</span>
            <input type="text" name="room_id" placeholder="半角数字" value="{{ $roomId }}">
            @if($errors->has('room_id'))
                <span>
                    @foreach($errors->get('room_id') as $message)
                        {{ $message }}
                    @endforeach
                </span>
            @endif
        </div>

        <div id="content-player-name">
            <span>プレイヤー名</span>
            <input type="text" name="player_name" placeholder="10文字まで" value="{{ old('player_name') }}">
            @if($errors->has('player_name'))
                <span>
                    @foreach($errors->get('player_name') as $message)
                        {{ $message }}
                    @endforeach
                </span>
            @endif
        </div>

        <div id="content-role">
            <select name="role">
                <option value="0">役職</option>
                @foreach ($roleMst as $role)
                    <option value="{{ $role->role_id }}" @if(old('role') == $role->role_id) selected @endif>{{ $role->role_name }}</option>
                @endforeach
            </select>
            @if($errors->has('role'))
                <span>
                    @foreach($errors->get('role') as $message)
                        {{ $message }}
                    @endforeach
                </span>
            @endif
        </div>

        <div id="content-submit-button">
            <button type="submit">参加</button>
        </div>
    </form>
@endsection
