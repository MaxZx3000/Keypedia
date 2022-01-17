@extends("layout")
@section("content")
    <div class = "container" class="auth-form">
        @isset($message)
            <div class = "alert alert-{{$message[0]}}">{{$message[1]}}</div>
        @endisset
        <h2>Login Page</h2>
        <form action="{{route('login.process')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email_address">E-Mail Address</label>
                <input type="text"
                    name="email_address"
                    class="form-control"
                    id="email_address">
                @error("email_address")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password"
                    name="password"
                    class="form-control"
                    id="password">
                @error("password")
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class = "form-check">
                <input type="checkbox"
                    name="remember_me"
                    class="form-check-input"
                    id="remember_me">
                <label for="remember_me" class="form-check-label">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-success">Login</button>
        </form>
    </div>
@endsection
