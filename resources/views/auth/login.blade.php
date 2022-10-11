<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="shortcut icon" href="{{asset('public/images/favicon.png')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
</head>
<body>
    <div class="container">
        <div class="col-12 col-md-6 m-auto login-form">
            <img src="{{asset('public/images/logo.png')}}" class="img-fluid" alt="">
            <form action="" method="POST">
                @csrf
                <div class="mb-3 login-input">
                    <i class="bi bi-person-fill icon"></i>
                    <input type="text" class="form-control input-field" id="email" name="email" placeholder="Email" value="{{old('email')}}" aria-describedby="emailHelp">
                    @if($errors->has('email'))
                        <div class="text-error">
                            {{$errors->first('email')}}
                        </div>
                    @endif
                </div>
                <div class="mb-3 login-input">
                    <i class="bi bi-lock-fill icon"></i>
                    <input type="password" class="form-control input-field" name="password" id="password" placeholder="Mật khẩu">
                    @if($errors->has('password'))
                        <div class="text-error">
                            {{$errors->first('password')}}
                        </div>
                    @endif
                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('public/js/main.css')}}"></script>
</body>
</html>