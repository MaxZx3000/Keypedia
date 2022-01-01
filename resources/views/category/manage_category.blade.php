@extends('layout')
@section('content')
    <style>
        img{
            width: 250px;
        }
    </style>
    <h2>Manage Categories</h2>
    @isset($message)
        <div class="alert alert-{{$message[0]}}">{{$message[1]}}</div>
    @endisset
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col">
                    <img src="{{asset($category['image'])}}">
                    <p>{{$category["name"]}}</p>
                    <form action="{{route('process_delete_category', ['category' => $category->id])}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-success">Delete Categories</button>
                    </form>

                    <a href="{{route('category.update', ['category' => $category->id])}}" class="btn btn-success">Update Categories</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
