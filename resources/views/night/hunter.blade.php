@extends('layouts.roleTemplate')

@section('modals')
    <button is="hunter-select-modal" class="pl-1"></button>
@endsection

@section('content')
    <div id="chat">
        <common-text-area></common-text-area>
    </div>
@endsection

@section('input-content')
    <memo-input></memo-input>
@endsection
