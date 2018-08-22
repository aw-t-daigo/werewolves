@extends('layouts.roleTemplate')

@section('content')
    <p>おおかみ</p>
    <div id="chat">
        <base-text-area></base-text-area>
    </div>
@endsection

@section('input-content')
    <div id="input">
        <wolf-select></wolf-select>
        <wolf-chat-input></wolf-chat-input>
    </div>
@endsection
