<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('public/images/favicon.png')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">
                <img class="logo" src="{{asset('public/images/logo.png')}}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Khách hàng</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('get.users')}}" class="nav-link {{\Route::is('get.users') ? 'active' : ''}}">Nhân viên</a>
                    </li>
                </ul>
                <div class="dropdown me-3">
                    <div class="d-flex" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                        <h5 class="mx-2">{{Auth::guard('web')->user()->group->name}}</h5>
                    </div>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="m-3">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{asset('public/js/main.js')}}"></script>
    @yield('scripts')
</body>
</html>