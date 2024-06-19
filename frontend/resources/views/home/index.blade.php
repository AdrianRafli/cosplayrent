<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

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
    </style>

</head>
<body>
    
    @include('home.layouts.navbar_index')

    <section class="hero-section">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-7 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12 d-flex flex-column gap-3">
                <h1>Rental kostum cosplay hanya di <span>CosplayRent</span></h1>
                <h5>Jelajahi berbagai kostum cosplay yang tersedia untuk disewa.
                    Dari superhero hingga karakter anime.
                    semua ada di sini!
                </h5>
                <form class="d-flex" role="search" action="{{ url('search') }}" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Gojo Satoru" name="query" style="height: 50px" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <div class="row rating d-flex align-items-center justify-content-center">
                <div class="col-12 rating-desc d-flex flex-column align-items-center justify-content-center text-center">
                    <h3 class="fw-bold">Kostum Sewa</h3>
                    <h1>Rating Teratas</h1>
                    <p>Jelajahi berbagai kostum cosplay yang tersedia untuk disewa. <br>
                        Dari superhero hingga karakter anime, semua ada di sini!</p>
                </div>
                <div class="col-12 rating-costume d-flex justify-content-between">
                  @foreach ($costume as $costume)
                    <a href="{{url('costume_details', $costume->id)}}">
                        <div class="col-3 card px-3 pt-3 shadow w-100">
                            <img src="/costumes/{{$costume->image}}" alt="costume image">
                            <div class="card-body w-100 d-flex flex-column gap-1">
                                <h5 class="card-title fw-bold">{{$costume->name}}</h5>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-7">
                                        <h4 class="fw-bold">Rp {{$costume->price}}</h4>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="text-end">/ {{$costume->day}} hari</h5>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-7">
                                        <h6>{{$costume->shop->shop_name}}</h6>
                                    </div>
                                    <div class="col-4">
                                        <h6 class="text-end">{{$costume->shop->city}}</h6>
                                    </div>
                                </div>
                                <h5><i class="fa-solid fa-star me-2"></i>5.0</h5>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="row testimoni d-flex align-items-center justify-content-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-6 text-center">
                                <h1>Testimoni <span>Netizen</span></h1>
                                <p>Jelajahi berbagai kostum cosplay yang tersedia untuk disewa. Dari superhero hingga karakter anime,</p>
                            </div>
                            <div class="col-6">
                                <img src="/images/bgimage/testimoni1.png" alt="testimoni">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center align-items-center mt-3">
                            <div class="col-6">
                                <img src="/images/bgimage/testimoni2.png" alt="testimoni">
                            </div>
                            <div class="col-6">
                                <img src="/images/bgimage/testimoni3.png" alt="testimoni">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 d-flex flex-column gap-3">
                    <div class="col-12 card testimoni-item p-3 shadow">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-start align-items-center">
                                    <img src="/images/bgimage/pfp1.png" alt="pfp">
                                    <div class="ms-3">
                                        <h4>Cristiano Ronaldo</h4>
                                        <h6>Gojo Satoru</h6>
                                    </div>
                                </div>
                                <i class="fa-solid fa-quote-left"></i>
                            </div>
                            <div class="col-12 mt-2">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, in, ratione recusandae voluptatum optio asperiores suscipit nihil commodi assumenda qui repellat alias quos, adipisci vero nemo vitae ad ipsam sapiente?</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 card testimoni-item p-3 shadow">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-start align-items-center">
                                    <img src="/images/bgimage/pfp2.png" alt="pfp">
                                    <div class="ms-3">
                                        <h4>Lorem ipsum</h4>
                                        <h6>Naruto</h6>
                                    </div>
                                </div>
                                <i class="fa-solid fa-quote-left"></i>
                            </div>
                            <div class="col-12 mt-2">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, in, ratione recusandae voluptatum optio asperiores suscipit nihil commodi assumenda qui repellat alias quos, adipisci vero nemo vitae ad ipsam sapiente?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('home.layouts.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('scroll', () =>{
            const nav = document.querySelector('.navbar');

            if (window.scrollY > 0) {
                nav.classList.add('scrolled', 'shadow');
            } else {
                nav.classList.remove('scrolled', 'shadow');
            }
        })
    </script>
</body>
</html>