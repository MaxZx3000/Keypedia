@extends('layout')
@section('content')
    @isset($message)
        <div class="alert alert-{{$message[0]}}">{{$message[1]}}</div>
    @endisset
    <h2>Your transaction history</h2>
    
@endsection
