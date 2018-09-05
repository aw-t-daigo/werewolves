@extends('layouts.roleTemplate')

@section('content')
    <div id="chat">
        <sharer-text-area></sharer-text-area>
    </div>
@endsection

@section('input-content')
    <sharer-chat-input></sharer-chat-input>
@endsection
