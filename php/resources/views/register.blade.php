<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Daftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/daftar.css">
    <!-- Font Style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>
    <section class="daftar d-flex">
        <div class="daftar-left  h-100">
            <div class="gambar"></div>

        </div>
        <div class="daftar-right w-50">
            <div class="row bg-black justify-content-center align-items-center h-100" style="margin-right: 0px;">
                <div class="col-8">
                    <h1 class="">DAFTAR</h1>
                    <div class="daftar-form ">
                        <form action="/register" method="post">
                        @csrf
                        <label for="username" class="form-label fs-4">Username</label>
                        <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username" name="username" placeholder="Enter your username">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="password" class="form-label fs-4 ">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="email" class="form-label fs-4 ">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="telephone" class="form-label fs-4">No. Telepon</label>
                        <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telephone" name="telepon" placeholder="Enter your telephone number">
                        @error('telepon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                           
                        <div class="row justify-content-end">
                            <div class="col">
                                <a href="login"><button class="Login" type="button">Login</button></a>
                                <button class="Daftar" type="submit">Daftar</button>
                            </div>
                        </div>
                    </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>