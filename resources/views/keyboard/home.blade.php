@extends('layout')
@section('content')
    <h2>Welcome to Keypedia</h2>
    <h3>Categories</h3>
    @for ($i = 0; $i < sizeof($categories); $i++)
        @php
            $category = $categories[$i];
        @endphp
        <div class = "container">
            <p>{{$category["name"]}}</p>
            <img src = "{{asset($category["image"])}}">
        </div>
    @endfor
@endsection
