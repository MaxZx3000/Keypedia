@extends('layout')
@section('content')
    <style>
        img{
            width: 100%;
        }
    </style>
    <h2>My Cart</h2>
    <div class="container">
        <div class="row">
            @php
                $index = 0;
            @endphp
            @foreach ($shoppingCarts as $shoppingCart)
                @php
                    $keyboard = $keyboards[$index][0];
                @endphp
                <div class="col-3">
                    <img class="keyboard-image" src="{{asset('storage/'.$keyboard['image'])}}">
                </div>
                <div class="col-9">
                    <p>Subtotal: {{$shoppingCart["quantity"] * $keyboard["price"]}}</p>
                    <form action="{{route('process_my_cart_update_quantity', ["keyboard" => $keyboard, "user" => $user])}}" method="post">
                        @csrf
                        <input type="number" name="quantity" id="quantity" value="{{$shoppingCart->quantity}}">
                        <button type="submit">Update</button>
                    </form>
                </div>
                @php
                    $index += 1;
                @endphp
            @endforeach
        </div>
    </div>
    @if (sizeof($shoppingCarts) > 0)
        <form action="{{route('process_my_cart_checkout', ["user" => $user])}}" method="POST">
            @csrf
            <button type="submit">Checkout</button>
        </form>
    @endif
@endsection
