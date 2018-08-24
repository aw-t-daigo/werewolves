@extends('layouts.roleTemplate')

@section('content')
    <div id="chat">
        <wolf-chat-text-area></wolf-chat-text-area>
    </div>
@endsection

@section('input-content')
    <div id="input">
        <wolf-select></wolf-select>
        <wolf-chat-input></wolf-chat-input>
    </div>
@endsection
