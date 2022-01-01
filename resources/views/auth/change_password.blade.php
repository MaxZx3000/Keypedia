@extends('layout')
@section('content')
    <form action="{{route('process_change_password', ["user" => $user->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="text" class="form-control" name="current_password" id="current_password" value="{{old('current_password')}}">
                @error("current_password")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="text" class="form-control" name="new_password" id="new_password" value="{{old('new_password')}}">
                @error("new_password")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="confirm_new_password">Confirm Password</label>
                <input type="text" class="form-control" name="confirm_new_password" id="confirm_new_password" value="">
                @error("confirm_new_password")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Update Password</button>
        </div>
    </form>
@endsection
