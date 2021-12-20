<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div>
                <a href="/"><img src="{{ asset('assets/images/logo-puskesmas.png') }}" alt="Logo" style="width: 20%; height: 20%"></a>
            </div>
            <h1 class="auth-title">Login</h1>
            <p class="auth-subtitle mb-5">Login dengan akun yang sudah dibuatkan oleh Admin</p>

            <form action="/login" method="POST">
                @csrf
                <p class="text-danger text-center">{{ Session::get('error') }}</p>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" name="email" placeholder="Email">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="password" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Login</button>
            </form>
            {{-- <div class="text-center mt-5 text-lg fs-4">
                <p class="text-gray-600">Don't have an account? <a href="auth-register.html" class="font-bold">Sign
                        up</a>.</p>
                <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
            </div> --}}
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>

</html>
