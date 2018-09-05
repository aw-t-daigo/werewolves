@extends('layouts.roleTemplate')

@section('modals')
    <button is="wolf-select-modal" class="pl-1"></button>
@endsection

@section('content')
    <div id="chat">
        <wolf-chat-text-area></wolf-chat-text-area>
    </div>
@endsection

@section('input-content')
    <wolf-chat-input></wolf-chat-input>
@endsection
