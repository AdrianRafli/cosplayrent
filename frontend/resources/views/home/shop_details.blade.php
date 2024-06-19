<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko</title>

    <link rel="stylesheet" href="{{asset('css/global.css')}}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/2b86481c1c.js" crossorigin="anonymous"></script>

</head>
<body>
    
    @include('home.layouts.navbar')

    <div class="shop-section my-5">
        <div class="container">
            <div class="row row-cols-3 shop-info">
                <div class="col">
                    <div class="card shadow d-flex flex-row justify-content-center align-items-center gap-2 p-3">
                        <img src="/shops/{{$shop->image}}" alt="shop image" style="height: 80px; border: 1px black solid; border-radius: 50%;">
                        <div>
                            <h1>{{$shop->shop_name}}</h1>
                            <p>{{$shop->address}} {{$shop->city}}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow d-flex flex-column justify-content-center align-items-center p-3">
                            <h1><i class="fa-solid fa-star me-2" style="color: yellow;"></i>5.0</h1>
                            <h6>Rating & Ulasan</h6>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow d-flex flex-column justify-content-center align-items-center p-3">
                            <h1>09:00 - 20:00</h1>
                            <h6>Jam Operasional</h6>
                    </div>
                </div>
            </div>
            <h1 class="mb-3 mt-5">Kostum Kami</h1>
            <div class="row row-cols-4">
                @foreach ($costume as $costume)
                <div class="col mb-3 costume-item">
                    <a href="{{url('costume_details', $costume->id)}}">
                        <div class="card px-3 pt-3 shadow w-100">
                            <img src="/costumes/{{$costume->image}}" alt="costume">
                            <div class="card-body w-100 d-flex flex-column">
                                <h4 class="card-title fw-bold">{{$costume->name}}</h4>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-7">
                                        <h6 class="fw-bold">Rp {{$costume->price}}</h6>
                                    </div>
                                    <div class="col-5">
                                        <h6 class="text-end">/ {{$costume->day}} hari</h6>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-7">
                                        <p>{{$costume->shop->shop_name}}</p>
                                    </div>
                                    <div class="col-5">
                                        <p class="text-end">{{$costume->shop->city}}</p>
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