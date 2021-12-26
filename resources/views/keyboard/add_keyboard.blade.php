@extends('layout')
@section('content')
    <div class="container">
        <div class="form-group">
            <label for="email_address">E-Mail Address</label>
            <input type="text" name="email_address" class="form-control" id="email_address">
            @error("category")
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email_address">E-Mail Address</label>
            <input type="text" name="email_address" class="form-control" id="email_address">
            @error("category")
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
    </div>
@endsection
