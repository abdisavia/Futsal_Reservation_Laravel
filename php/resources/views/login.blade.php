<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <!-- Font Style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>
    <section class="login d-flex">
        <div class="gambar"></div>
        <div class="login-left">
        </div>
        <div class="login-right w-50">
            <div class="row bg-black justify-content-center align-items-center h-100" style="margin-right: 0px;">
                <div class="col-8">
                    <h1>LOGIN</h1>
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session()->has('loginError'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('loginError') }}
                    </div>
                    @endif

                    <form class="login-form" method="post" action="/login">
                        @csrf
                        <label for="username" class="form-label">Username</label>
                        <input type="username" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Enter your username" autofocus required>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>

                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember Me</label>
                        <div class="row justify-content-end">
                            <div class="col">
                                <a href="register"><button class="Daftar" type="button">Daftar</button></a>
                                <button class="Login" type="submit">Login</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>