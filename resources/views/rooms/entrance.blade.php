@extends('layouts.roomTemplate')

@section('title', '入室')

@section('mainTitle')
    <h2>部屋に入る</h2>
@endsection

@section('content')
    <form action="/enter" class="need-valid" method="post" novalidate>
        @csrf
        <div class="form-group">
            <label for="room_id">部屋ID</label>
            <input type="text"
                   id="room_id"
                   class="form-control @if($errors->has('room_id')) is-invalid @endif"
                   name="room_id"
                   placeholder="半角数字"
                   value="{{ $roomId }}"
                   required
            >
            @if($errors->has('room_id'))
                <span class="invalid-feedback">
                    @foreach($errors->get('room_id') as $message)
                        {{ $message }}
                    @endforeach
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="player_name">プレイヤー名</label>
            <input type="text"
                   id="player_name"
                   class="form-control @if($errors->has('player_name')) is-invalid @endif"
                   name="player_name"
                   placeholder="10文字まで"
                   value="{{ old('player_name') }}"
                   required
            >
            @if($errors->has('player_name'))
                <span class="invalid-feedback">
                    @foreach($errors->get('player_name') as $message)
                        {{ $message }}
                    @endforeach
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="role">役職</label>
            <select id="role"
                    class="form-control @if($errors->has('role')) is-invalid @endif"
                    name="role"
                    required>
                <option value="">役職</option>
                @foreach ($roleMst as $role)
                    <option value="{{ $role->role_id }}"
                            @if(old('role') == $role->role_id) selected @endif>{{ $role->role_name }}</option>
                @endforeach
            </select>
            @if($errors->has('role'))
                <span class="invalid-feedback">
                    @foreach($errors->get('role') as $message)
                        {{ $message }}
                    @endforeach
                </span>
            @endif
        </div>

        <div id="content-submit-button">
            <button type="submit" class="btn btn-block btn-primary">参加</button>
        </div>
    </form>
@endsection
