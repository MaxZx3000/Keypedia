@extends('layout')
@section('content')
    <style>
        img{
            width: 300px;
        }
        .col button, .col a{
            width: fit-content;
        }
    </style>
    <form action="{{route('keyboard.filter')}}" action="POST">
        @csrf
        <input type="search" name="search" id="search">
        <select name="filter" id="filter">

        </select>
        <button>Search</button>
    </form>
    <div class="container">
        <div class="row">
            @for ($i = 0; $i < sizeof($keyboards); $i++)
                @php
                    $keyboard = $keyboards[$i];
                @endphp
                <div class="col">
                    <img src=" {{asset($keyboard->image)}}">
                    <p>{{$keyboard->name}}</p>
                    <p>{{$keyboard->price}}</p>
                    @auth
                        @if ($user["role"] == 'M')
                            <a href="{{route('keyboard.edit', ['keyboardID' => $keyboard->id])}}" class="btn btn-success">Update Keyboard</a>
                            <form action="{{route('process_delete_keyboard')}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">Remove Keyboard</a>
                            </form>
                        @endif
                    @endauth
                </div>
            @endfor
        </div>
    </div>
@endsection
