@extends('layout')
@section('content')
    <style>
        img{
            width: 250px;
        }
    </style>
    <form action="
        @if (empty($keyboard))
            {{route('process_add_keyboard', ['categoryID' => $categoryID])}}
        @else
            {{route('process_edit_keyboard', ['categoryID' => $categoryID, 'keyboardID' => $keyboard->id])}}
        @endif
    " method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id">
                    @for ($i = 0; $i < sizeof($categories); $i++)
                        @php
                            $category = $categories[$i];
                        @endphp
                        <option value = "{{$i}}" @if ($category->id == $keyboard->category_id)
                                selected = "selected"
                            @endif>{{$category->name}}</option>
                    @endfor
                </select>
                @error("category_id")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Keyboard Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{old('name') ?? $keyboard["name"]}}">
                @error("name")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Keyboard Price (USD)</label>
                <input type="text" name="price" class="form-control" id="price" value="{{old('price') ?? $keyboard["price"]}}">
                @error("price")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" id="description" value="{{old('description') ?? $keyboard["description"]}}">
                @error("description")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" id="image">
                @error("image")
                    <div class="text-danger">{{$message}}</div>
                @enderror
                <p>Your previous uploaded image: </p>
                <img src="{{old('image') ? asset(old('image')) : asset($keyboard["image"])}}">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
@endsection
