@extends('layout')
@section('content')
    <form action="{{route('process_change_password')}}">
        <div class="form-group">
            <input type="text" name="current_password" id="current_password" value="{{old('current_password')}}">
            @error("current_password")
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" name="new_password" id="new_password" value="{{old('new_password')}}">
            @error("new_password")
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" name="confirm_password" id="confirm_password" value="">
            @error("confirm_password")
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
    </form>
@endsection
