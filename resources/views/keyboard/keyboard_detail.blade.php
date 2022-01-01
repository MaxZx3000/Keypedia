@extends('layout')
@section('content')
    <h2>Detail Keyboard</h2>
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="{{asset($keyboard->image)}}">
            </div>
            <div class="col">
                <p>$ {{ $keyboard["price"] }}</p>
                <p>{{ $keyboard["description"] }}</p>
                <form action="{{route('process_detail_keyboard', ['keyboard' => $keyboard->id])}}" method="POST">
                    @csrf
                    @auth
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" id="quantity">
                            @error("quantity")
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Add to Cart</button>
                    @endauth
                </form>
            </div>
        </div>
    </div>
@endsection
