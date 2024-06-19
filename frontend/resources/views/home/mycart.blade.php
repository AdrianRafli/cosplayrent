<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <link rel="stylesheet" href="{{asset('css/global.css')}}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/2b86481c1c.js" crossorigin="anonymous"></script>

</head>
<body>
    
    @include('home.layouts.navbar')

    <section class="cart-section">
        <div class="container">
            <div class="row">
                <div class="checkout-flow cart d-flex gap-4">
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
                    <?php
                        $value = 0
                    ?>
                    @foreach ($cart as $cart)
                    <div class="col-lg-12 cart-item mb-4 shadow rounded">
                        <div class="shop-info d-flex align-items-center">
                            <img src="/shops/{{$cart->costume->shop->image}}" alt="shop-img">
                            <h4 class="shop-name ms-3">{{$cart->costume->shop->shop_name}}</h4>
                        </div>
                        <div class="item-costume d-flex align-items-center mt-4">
                            <img src="/costumes/{{$cart->costume->image}}" alt="costume-img">
                            <div class="details-costume w-100">
                                <h3>{{$cart->costume->name}}</h3>
                                <div class="day-price d-flex justify-content-between">
                                    <p>3 Hari</p>
                                    <h3>Rp {{$cart->costume->price}}</h3>
                                </div>
                                <div class="date">
                                    <div class="row align-items-center">
                                        <div class="col-10">
                                            <div class="row">
                                                <div class="col-3">
                                                  <label for="date-start">Dari:</label>
                                                  <input type="date" class="form-control" id="date-start" name="date-start" value="{{$cart->date_start}}">
                                                  </div>
                                                <div class="col-1 d-flex justify-content-center align-items-center mt-4">
                                                    <h3>-</h3>
                                                </div>
                                                <div class="col-3">
                                                  <label for="date-end">Sampai:</label>
                                                  <input type="date" class="form-control" id="date-end" name="date-end" value="{{$cart->date_end}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <a href="{{url('delete_cart', $cart->id)}}" class="btn btn-danger mt-3">Hapus</a>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $value = $value + $cart->costume->price;
                    ?>
                    @endforeach
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="summary shadow">
                        <h3 class="text-center">Ringaksan Belanja</h3>
                        <div class="summary-order">
                            @foreach ($cart2 as $cart2)
                                <div class="summary-item d-flex justify-content-between mb-2">
                                    <h5>{{$cart2->costume->name}}</h5>
                                    <h5>Rp {{$cart2->costume->price}}</h5>
                                </div>
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
                        <a href="{{url('checkout')}}">
                            <button class="btn btn-lg btn-success w-100 mt-4">Checkout</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('home.layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>