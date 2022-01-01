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
                    <img src="{{asset($keyboard['image'])}}">
                </div>
                <div class="col-9">
                    <p>Subtotal: {{$shoppingCart["quantity"] * $keyboard["price"]}}</p>
                    <input type="number" name="quantity" id="quantity" value="{{$shoppingCart->quantity}}">
                    <form action="" method="post">
                        <button type="submit">Update</button>
                    </form>
                </div>
                @php
                    $index += 1;
                @endphp
            @endforeach
        </div>
    </div>
@endsection
