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
                <div class = "col-md-3 card d-flex">
                    <a href="{{route('keyboard', ['categoryID' => $category["id"]])}}">
                        <div class="card-body">
                            <p>{{$category["name"]}}</p>
                            <img class="keyboard-image card-img-top" src = "{{asset('storage/'.$category["image"])}}">
                        </div>
                    </a>
                </div>
            @endfor
        </div>
    </div>
@endsection
