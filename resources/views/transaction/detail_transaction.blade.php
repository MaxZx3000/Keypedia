@extends('layout')
@section('content')
    <div class="container">
        <h2>Your Transaction at {{$transactions[0]["date"]}}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Keyboard Image</th>
                    <th scope="col">Keyboard Name</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td><img class="keyboard-image" src="{{asset('storage/'.$transaction["keyboard_image"])}}"></td>
                        <td>{{$transaction["keyboard_name"]}}</td>
                        <td>{{$transaction["quantity"] * $transaction["price_per_keyboard"] }}</td>
                        <td>{{$transaction["quantity"]}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
