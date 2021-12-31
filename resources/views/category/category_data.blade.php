@extends('layout')
@section('content')
    <form action="{{route('process_edit_category')}}" method="POST">
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name">
            @error("name")
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Category Image</label>
            <input type="file" name="image" id="image">
            @error("image")
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
