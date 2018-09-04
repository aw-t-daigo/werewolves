@extends('layouts.roleTemplate')

@section('modals')
    <button is="seer-select-modal" class="pl-1"></button>
@endsection

@section('content')
    <div id="chat">
        <seer-text-area></seer-text-area>
    </div>
@endsection

@section('input-content')
    <memo-input></memo-input>
@endsection
