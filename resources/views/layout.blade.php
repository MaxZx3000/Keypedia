<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keypedia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <style>
        h1{
            font-size: 30px;
        }
        h2{
            font-size: 25px;
        }
        .keyboard-image{
            width: 250px;
            height: 200px;
            object-fit: cover;
        }
        a{
            text-decoration: none;
        }
    </style>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('home')}}">Keypedia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{route('login')}}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('register')}}">Register</a>
                            </li>
                        @endguest
                        @auth
                            @if ($user->role == 'C')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{$user["username"]}}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{route('my_cart', ["user" => $user->id])}}">My Cart</a></li>
                                        <li><a class="dropdown-item" href="{{route('history_transaction', ['user' => $user->id])}}">Transaction History</a></li>
                                        <li><a class="dropdown-item" href="{{route('change_password', ['user' => $user->id])}}">Change Password</a></li>
                                        <form action="{{route('logout')}}" method="POST">
                                            @csrf
                                            <li><button type="submit" class="dropdown-item">Logout</button></li>
                                        </form>
                                    </ul>
                                </li>
                            @elseif ($user->role == 'M')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{$user["username"]}}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{route('keyboard.add')}}">Add Keyboard</a></li>
                                        <li><a class="dropdown-item" href="{{route('category')}}">Manage Categories</a></li>
                                        <li><a class="dropdown-item" href="{{route('change_password', ['user' => $user->id])}}">Change Password</a></li>
                                        <form action="{{route('logout')}}" method="POST">
                                            @csrf
                                            <li><button type="submit">Logout</button></li>
                                        </form>
                                    </ul>
                                </li>
                            @endif
                        @endauth
                        <li class="nav-item">{{date('D, d-m-Y')}}</li>
                    </ul>
                </div>
            </nav>
        @yield("content")
    <footer>
        <p>Copyright 2022 - Keypedia Corporation</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
