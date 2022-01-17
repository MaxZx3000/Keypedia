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
    @php
    @endphp
    @if(Session::has('errors'))
        @php
            $errors = Session::get('errors')->messages();
        @endphp
        <div class="alert alert-{{$errors[0][0]}}">{{$errors[1][0]}}</div>
    @endif
    <form action="{{route('keyboard.filter', ['categoryID' => $categoryID])}}" method="POST">
        @csrf
        <input type="search" name="search" id="search">
        <select name="filter" id="filter">
            <option value="Name">Name</option>
            <option value="Price">Price</option>
        </select>
        <button type="submit">Search</button>
    </form>
    <div class="container">
        <div class="row">
            @for ($i = 0; $i < sizeof($keyboards); $i++)
                @php
                    $keyboard = $keyboards[$i];
                @endphp
                <a href="{{route('detail_keyboard', ['keyboard' => $keyboard->id])}}">
                    <div class="col">
                        <img class="keyboard-image" src="{{asset('storage/'.$keyboard->image)}}">
                        <p>{{$keyboard->name}}</p>
                        <p>{{$keyboard->price}}</p>
                        @auth
                            @if ($user["role"] == 'M')
                                <a href="{{route('keyboard.edit', ['keyboard' => $keyboard->id, 'categoryID' => $categoryID])}}" class="btn btn-success">Update Keyboard</a>
                                <form action="{{route('process_delete_keyboard', ['keyboard' => $keyboard->id, 'category' => $categoryID])}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-success">{{ 'Remove Keyboard '.$keyboard->id }}</a>
                                </form>
                            @endif
                        @endauth
                    </div>
                </a>
            @endfor
        </div>
        <p>Current Page: {{$keyboards->currentPage()}} of {{$keyboards->total()}}</p>
        {{$keyboards->links()}}
    </div>
@endsection
