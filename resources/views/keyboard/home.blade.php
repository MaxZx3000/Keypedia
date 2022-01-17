@extends('layout')
@section('content')
    @isset($message)
        <div class="alert alert-{{$message[0]}}">{{$message[1]}}</div>
    @endisset
    <h2>Welcome to Keypedia</h2>
    <h3>Categories</h3>
    <div class = "container">
        <div class="row">
            @for ($i = 0; $i < sizeof($categories); $i++)
                @php
                    $category = $categories[$i];
                @endphp
                <a href="{{route('keyboard', ['categoryID' => $category["id"]])}}">
                    <div class="col col-lg-4 col-md-6 col-sm-12">
                        <p>{{$category["name"]}}</p>
                        <img class="keyboard-image" src = "{{asset('storage/'.$category["image"])}}">
                    </div>
                </a>
            @endfor
        </div>
    </div>
@endsection
