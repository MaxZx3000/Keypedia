@extends("layout")
@section("content")
    <div class="container">
        <form action = "{{route('register.process')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username">
                @error("username")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email_address">E-Mail Address</label>
                <input type="text" name="email_address" class="form-control" id="email_address">
                @error("email_address")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control" id="password">
                @error("password")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="text" name="confirm_password" class="form-control" id="confirm_password">
                @error("confirm_password")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" cols="30" class="form-control" rows="10"></textarea>
                @error("address")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="Male" value="Male">
                    <label class="form-check-label" for="Male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="Female" value="Female">
                    <label class="form-check-label" for="Female">Female</label>
                </div>
                @error("gender")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth">
                @error("date_of_birth")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Register</button>
        </form>
    </div>
@endsection
