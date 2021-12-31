@extends('layout')
@section('content')
    <style>
        img{
            width: 200px;
            object-fit: cover;
        }
    </style>
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
                        <img src = "{{asset($category["image"])}}">
                    </div>
                </a>
            @endfor
        </div>
    </div>
@endsection
