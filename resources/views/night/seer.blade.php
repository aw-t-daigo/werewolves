@extends('layouts.roleTemplate')

@section('content')
    <div id="chat">
        <seer-text-area></seer-text-area>
    </div>
@endsection

@section('input-content')
    <div id="input">
        <seer-select></seer-select>
        <memo-input></memo-input>
    </div>
@endsection
