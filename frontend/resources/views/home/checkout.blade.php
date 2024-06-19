<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <link rel="stylesheet" href="{{asset('css/global.css')}}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/2b86481c1c.js" crossorigin="anonymous"></script>

</head>
<body>
    
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container align-items-center">
          <a class="navbar-brand fs-2 fw-bold" href="#">Cosplayrent</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Promo</a>
              </li>
            </ul>
            <div class="d-flex align-items-center gap-4">
                @if(Route::has('login'))
                @auth
                <a href="{{url('myorder')}}">
                    <i class="fa-solid fa-rectangle-list"></i>
                </a>
                <a href="{{url('mycart')}}">
                    <i class="fa-solid fa-cart-shopping position-relative"></i>
                    <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                        {{$count}}
                    </span>
                </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <button class="btn btn-danger">Logout</button>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                <a href="{{ route('login') }}">
                    <button class="btn btn-success">Login</button>
                </a>
                @endauth
                @endif
            </div>
          </div>    
        </div>
    </nav>

    <section class="cart-section">
        <div class="container">
            <div class="row">
                <div class="checkout-flow checkout d-flex gap-4">
                    <div class="cart d-flex align-items-center gap-2">
                        <i class="fa-solid fa-square-check"></i>
                        <h5>Keranjang</h5>
                    </div>
                    <div class="checkout d-flex align-items-center gap-2">
                        <i class="fa-regular fa-square"></i>
                        <h5>Checkout</h5>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <form class="row g-3 me-5" action="{{url('confirm_order')}}" method="POST">
                        @csrf
                        <h2 class="fw-bold">Pengiriman</h2>
                        <div class="col-md-6">
                          <label for="inputEmail4" class="form-label">Desa</label>
                          <input type="text" class="form-control" id="desa" name="desa" required>
                        </div>
                        <div class="col-md-6">
                          <label for="kelurahan" class="form-label">Kelurahan</label>
                          <input type="text" class="form-control" id="Kelurahan" name="kelurahan" required>
                        </div>
                        <div class="col-md-6">
                          <label for="kecamatan" class="form-label">Kecamatan</label>
                          <input type="text" class="form-control" id="kecamatan" name="kecamatan" required>
                        </div>
                        <div class="col-md-6">
                          <label for="kabkota" class="form-label">Kabupaten/Kota</label>
                          <input type="text" class="form-control" id="kabkota" name="kabkota" required>
                        </div>
                        <div class="col-md-12">
                          <label for="address" class="form-label">Alamat Lengkap</label>
                          <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <hr class="mt-5">
                        <h2 class="fw-bold">Metode Pembayaran</h2>
                        <h4 class="mt-3">Transfer</h4>
                        <div class="form-check d-flex align-items-center gap-3 border rounded py-3 shadow-sm mb-3">
                            <input class="form-check-input ms-1" type="radio" name="payment_method" id="bca" value="bca" required>
                            <label for="bca">
                            <img src="/images/bca.png" alt="">
                            </label>
                        </div>  
                        <div class="form-check d-flex align-items-center gap-3 border rounded py-3 shadow-sm mb-3">
                            <input class="form-check-input ms-1" type="radio" name="payment_method" id="bni" value="bni" required>
                            <label for="bni">
                            <img src="/images/bni.png" alt="">
                            </label>
                        </div>  
                        <div class="form-check d-flex align-items-center gap-3 border rounded py-3 shadow-sm mb-3">
                            <input class="form-check-input ms-1" type="radio" name="payment_method" id="bri" value="bri" required>
                            <label for="bri">
                            <img src="/images/bri.png" alt="">
                            </label>
                        </div>  
                        <hr class="mt-4">
                        <h4 class="mt-3">E-Wallet</h4>
                        <div class="form-check d-flex align-items-center gap-3 border rounded py-3 shadow-sm mb-3">
                            <input class="form-check-input ms-1" type="radio" name="payment_method" id="gopay" value="gopay" required>
                            <label for="gopay">
                            <img src="/images/gopay.png" alt="">
                            </label>
                        </div>  
                        <div class="form-check d-flex align-items-center gap-3 border rounded py-3 shadow-sm mb-3">
                            <input class="form-check-input ms-1" type="radio" name="payment_method" id="shopeepay" value="shopeepay" required>
                            <label for="shopeepay">
                            <img src="/images/shopeepay.png" alt="">
                            </label>
                        </div>  
                        <div class="form-check d-flex align-items-center gap-3 border rounded py-3 shadow-sm mb-3">
                            <input class="form-check-input ms-1" type="radio" name="payment_method" id="dana" value="dana" required>
                            <label for="dana">
                            <img src="/images/dana.webp" alt="">
                            </label>
                        </div>  
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-lg w-100 mt-4">Checkout</button>
                        </div>
                      </form>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="summary shadow">
                        <h3 class="text-center">Ringaksan Belanja</h3>
                        <div class="summary-order">
                            <?php
                                $value = 0
                            ?>
                            @foreach ($cart as $cart)
                                <div class="summary-item d-flex justify-content-between mb-2">
                                    <h5>{{$cart->costume->name}}</h5>
                                    <h5>Rp {{$cart->costume->price}}</h5>
                                </div>
                            <?php
                                $value = $value + $cart->costume->price;
                            ?>
                            @endforeach
                        </div>
                        <div class="summary-price">
                            <h5>Detail Order</h5>
                            <hr>
                            <div class="total d-flex justify-content-between">
                              <h5 class="fw-bold">Total</h5>
                              <h5 class="fw-bold">Rp {{$value}}</h5>
                            </div>
                          </div>
                        {{-- <a href="#">
                            <button class="btn btn-lg btn-success w-100 mt-4">Checkout</button>
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>