@extends('layout')
@section('content')
    @isset($message)
        <div class="alert alert-{{$message[0]}}">{{$message[1]}}</div>
    @endisset

    <div class="container">
        <h2>Your transaction history</h2>
        @foreach ($transactions as $transaction)
            <a class="btn btn-success" href="{{route('detail_transaction', ["user" => $user, "transactionID" => $transaction['date']])}}">
                {{$transaction["date"]}}
            </a>
        @endforeach
    </div>
@endsection
