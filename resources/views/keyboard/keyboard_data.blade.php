@extends('layout')
@section('content')
    <form action="
        @if (isset($keyboard))
            {{route('process_edit_keyboard')}}
        @else
            {{route('process_add_keyboard')}}
        @endif
    " method="post">
        <div class="container">
            <div class="form-group">
                <select name="category_id" id="category_id">
                    @for ($i = 0; $i < sizeof($categories); $i++)
                        @php

                            $category = $categories[$i];
                        @endphp
                        <option value = "{{$i}}" @if ($category->id == $keyboard->category_id)
                                selected = "selected"
                            @endif>{{$category}}</option>
                    @endfor
                </select>
                @error("category_id")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Keyboard Name</label>
                <input type="text" name="name" class="form-control" id="name">
                @error("name")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Keyboard Price (USD)</label>
                <input type="text" name="price" class="form-control" id="price">
                @error("price")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="price" class="form-control" id="price">
                @error("description")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" name="image" class="form-control" id="image">
                @error("image")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection
