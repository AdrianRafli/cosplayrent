<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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

    <section class="login-section d-flex justify-content-center">
        <div class="row register d-flex align-items-center justify-content-end">
            <div class="col-7 card p-5 shadow mt-4">
                <h1>Buat Akun</h1>
                <form method="POST" action="{{ route('register') }}">
                  @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required autofocus autocomplete="name">
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required autocomplete="email">
                    </div>
                    <div class="mb-4">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-4">
                      <label for="confirm-password" class="form-label">Confirm Password</label>
                      <input type="password" class="form-control" id="confirm-password" name="password_confirmation" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" onchange="toggleOwnerFields()" aria-describedby="roleHelp">
                          <option value="renter">Renter</option>
                          <option value="owner">Owner</option>
                        </select>
                        <div id="roleHelp" class="form-text">Jika kamu pemilik sewa kostum, pilih Owner</div>
                      </div>
                    <div id="owner-fields" style="display: none;">
                        <div class="mb-3">
                          <label for="shop-name" class="form-label">Nama Toko</label>
                          <input type="text" class="form-control" id="shop-name" name="shop_name">
                        </div>
                        <div class="mb-3">
                          <label for="city" class="form-label">City</label>
                          <input type="text" class="form-control" id="city" name="city">
                        </div>
                        <div class="mb-3">
                          <label for="address" class="form-label">Alamat</label>
                          <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="mb-3">
                          <label for="contact" class="form-label">Nomor Telepon</label>
                          <input type="text" class="form-control" id="contact" name="phone_number">
                        </div>
                      </div>
                    <button type="submit" class="btn btn-success">Register</button>
                    <div class="d-flex align-items-center gap-2 mt-4">
                        <h6 class="mt-2">Sudah Punya Akun?</h6>
                        <a href="{{ route('login') }}">
                            Login
                        </a>
                    </div>
                  </form>
            </div>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        function toggleOwnerFields() {
          var role = document.getElementById('role').value;
          var ownerFields = document.getElementById('owner-fields');
          if (role === 'owner') {
            ownerFields.style.display = 'block';
          } else {
            ownerFields.style.display = 'none';
          }
        }
      </script>
    
</body>
</html>