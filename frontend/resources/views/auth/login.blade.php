<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{asset('css/global.css')}}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/2b86481c1c.js" crossorigin="anonymous"></script>

    <style>
        body {
            overflow-x: hidden;
            background-color: #EDEDF4 !important;
        }
        .navbar {
            background-color: #EDEDF4;
        }
    </style>

</head>
<body>
    
    <nav class="navbar navbar-expand-lg fixed-top home-nav shadow">
        <div class="container align-items-center">
          <a class="navbar-brand fs-2 fw-bold" href="{{url('/')}}">Cosplayrent</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
    </nav>

    <section class="login-section d-flex align-items-center justify-content-center">
        <div class="row d-flex align-items-center justify-content-end">
            <div class="col-7 card p-5 shadow mt-4">
                <h1>Masuk</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" required value="{{old('email')}}">
                    </div>
                    <div class="mb-4">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password" required value="{{old('password')}}">
                    </div>
                    <button type="submit" class="btn btn-success">Login</button>
                    <div class="d-flex align-items-center gap-2 mt-4">
                        <h6 class="mt-2">Belum punya akun?</h6>
                        <a href="{{route('register')}}">
                            Register
                        </a>
                    </div>
                  </form>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>