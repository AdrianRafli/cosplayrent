<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Costume Details</title>

    <link rel="stylesheet" href="{{asset('css/global.css')}}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/2b86481c1c.js" crossorigin="anonymous"></script>

</head>
<body>
    
    @include('home.layouts.navbar')

    <section class="costume-detail-section">
        <div class="container">
            <div class="row costume-detail-row d-flex justify-content-center align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <img src="/costumes/{{$costume->image}}" alt="costume image">
                </div>
                <div class="col-lg-6 col-sm-12 d-flex flex-column gap-4">
                    <h1 class="fw-bold">{{$costume->name}}</h1>
                    <div class="toko d-flex align-items-center gap-2">
                        <img src="/shops/{{$costume->shop->image}}" style="border: 1px black solid; border-radius: 50%;" alt="pfptoko">
                        <a href="{{url('shop_details', $costume->shop->id)}}">
                            <div class="col-7">
                                <h5 style="color: black">{{$costume->shop->shop_name}}</h5>
                            </div>
                        </a>
                    </div>
                    <p>{{$costume->description}}</p>
                    <table style="width: 200px;">
                      <tr>
                        <td><h5>Category</h5></td>
                        <td><h5>: {{$costume->category}}</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Stock</h5></td>
                        <td><h5>: {{$costume->available}}</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Size</h5></td>
                        <td><h5>: {{$costume->size}}</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Rating</h5></td>
                        <td><h5>: <i class="fa-solid fa-star me-2" style="color: yellow;"></i>5.0</h5></td>
                      </tr>
                    </table>
                    <h3>Rp {{$costume->price}} / 3 hari</h3>
                    <form action="{{url('add_cart', $costume->id)}}" action="GET">
                        <div class="card cart-card d-flex flex-column gap-3 p-4">
                            <h5>Atur Jumlah dan Tanggal</h5>
                            <div class="date">
                                <div class="row">
                                    <div class="col-3">
                                      <label for="date-start">Dari:</label>
                                      <input type="date" class="form-control" id="date-start" name="date_start" required>
                                      </div>
                                    <div class="col-1 d-flex justify-content-center align-items-center mt-4">
                                        <h3>-</h3>
                                    </div>
                                    <div class="col-3">
                                      <label for="date-end">Sampai:</label>
                                      <input type="date" class="form-control" id="date-end" name="date_end" required>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Tambahkan Ke Keranjang</button>
                              </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="costume-detail-lainnya my-5">
        <div class="container">
            <h2 class="mb-4">Lainnya di toko ini</h2>
            <div class="row row-cols-4">
                @foreach ($related_costumes as $item)
                <div class="col mb-3">
                    <a href="{{url('costume_details', $costume->id)}}">
                        <div class="card px-3 pt-3 shadow w-100">
                            <img src="/costumes/{{$item->image}}" alt="costume" class="relate-costume">
                            <div class="card-body w-100 d-flex flex-column">
                                <h4 class="card-title fw-bold">{{$item->name}}</h4>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-7">
                                        <h6 class="fw-bold">Rp {{$item->price}}</h6>
                                    </div>
                                    <div class="col-5">
                                        <h6 class="text-end">/ {{$item->day}} hari</h6>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-between">
                                    <a href="{{url('shop_details', $item->shop->id)}}">
                                        <div class="col-7">
                                            <p>{{$item->shop->shop_name}}</p>
                                        </div>
                                    </a>
                                    <div class="col-5">
                                        <p class="text-end">{{$item->shop->city}}</p>
                                    </div>
                                </div>
                                <p><i class="fa-solid fa-star me-2"></i>5.0</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="costume-detail-lainnya my-5">
        <div class="container">
            <h2 class="mb-4">Produk Terkait</h2>
            <div class="row row-cols-4">
                @foreach ($related_category as $item)
                <div class="col mb-3">
                    <a href="{{url('costume_details', $item->id)}}">
                        <div class="card px-3 pt-3 shadow w-100">
                            <img src="/costumes/{{$item->image}}" alt="costume" class="relate-costume">
                            <div class="card-body w-100 d-flex flex-column">
                                <h4 class="card-title fw-bold">{{$item->name}}</h4>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-7">
                                        <h6 class="fw-bold">Rp {{$item->price}}</h6>
                                    </div>
                                    <div class="col-5">
                                        <h6 class="text-end">/ {{$item->day}} hari</h6>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-between">
                                    <a href="{{url('shop_details', $item->shop->id)}}">
                                        <div class="col-7">
                                            <p>{{$item->shop->shop_name}}</p>
                                        </div>
                                    </a>
                                    <div class="col-5">
                                        <p class="text-end">{{$item->shop->city}}</p>
                                    </div>
                                </div>
                                <p><i class="fa-solid fa-star me-2"></i>5.0</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('home.layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>