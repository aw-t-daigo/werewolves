@extends('layouts.roleTemplate')

@section('content')
    <div id="chat">
        <common-text-area></common-text-area>
    </div>
@endsection

@section('input-content')
    <div id="input">
        <hunter-select></hunter-select>
        <memo-input></memo-input>
    </div>
@endsection
