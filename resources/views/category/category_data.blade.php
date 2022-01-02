@extends('layout')
@section('content')
    <style>
        img{
            width: 250px;
        }
    </style>
    <form action="{{route('process_edit_category', ["category" => $category->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <img class="keyboard-image" src="{{asset($category['image'])}}">
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name') ?? $category['name']}}">
                    @error("name")
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Category Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error("image")
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
@endsection
