@extends('layout')
@section('content')
    <h2>Detail Keyboard</h2>
    <div class="container">
        <div class="row">
            <div class="col">
                <img class="keyboard-image" src="{{asset('storage/'.$keyboard->image)}}">
            </div>
            <div class="col">
                <p>$ {{ $keyboard["price"] }}</p>
                <p>{{ $keyboard["description"] }}</p>
                @if (Auth::guest() || $user->role == 'C')
                    <form action="
                            @if(Auth::user())
                                {{route('process_detail_keyboard', ['keyboard' => $keyboard->id])}}
                            @else
                                {{route('login')}}
                            @endif
                        "
                        @if (Auth::user())
                            method="POST"
                        @else
                            method="GET"
                        @endif>
                        @csrf
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" id="quantity">
                            @error("quantity")
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Add to Cart</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
