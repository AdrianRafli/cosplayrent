<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>

    <link rel="stylesheet" href="{{asset('css/global.css')}}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/2b86481c1c.js" crossorigin="anonymous"></script>

</head>
<body>
    
    @include('home.layouts.navbar')

    <section class="search-section">
        <div class="container">
            <div class="row">
                <div class="col-12 my-5">
                    <img src="/images/bgimage/promosearch.png" alt="promo" class="w-100">
                </div>
                {{-- <div class="col-12 search-category mb-5">
                    <h3 class="mb-3">Kategori</h3>
                    <div class="row d-flex align-items-center">
                        <div class="col-2">
                            <a href="#">
                                <div class="card">
                                    <img src="/images/costume/gojo.png" alt="category image">
                                    <div class="card-body text-center">
                                        <h5>Anime</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2">
                            <a href="#">
                                <div class="card">
                                    <img src="/images/costume/joker.png" alt="category image">
                                    <div class="card-body text-center">
                                        <h5>Movies</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="col-2 filter section">
                    <h4>Filter</h4>
                    <div class="card p-4 shadow">
                        <div class="location-filter">
                            <h4>Lokasi:</h4>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="jabodetabek" id="location">
                                <label class="form-check-label ms-3 fs-6" for="location">
                                  Jabodetabek
                                </label>
                              </div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="jawatengah" id="location">
                                <label class="form-check-label ms-3 fs-6" for="location">
                                  Jawa Tengah
                                </label>
                              </div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="jawatimur" id="location">
                                <label class="form-check-label ms-3 fs-6" for="location">
                                  Jawa Timur
                                </label>
                              </div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="bali" id="location">
                                <label class="form-check-label ms-3 fs-6" for="location">
                                  Bali
                                </label>
                              </div>
                        </div>
                        <div class="rating-filter mt-3">
                            <h4>Rating:</h4>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="5" id="rating">
                                <label class="form-check-label ms-3 fs-6" for="rating">
                                    <i class="fa-solid fa-star me-2"></i> 5
                                </label>
                              </div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="4" id="rating">
                                <label class="form-check-label ms-3 fs-6" for="rating">
                                    <i class="fa-solid fa-star me-2"></i> 4
                                </label>
                              </div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="3" id="rating">
                                <label class="form-check-label ms-3 fs-6" for="rating">
                                    <i class="fa-solid fa-star me-2"></i> 3
                                </label>
                              </div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="2" id="rating">
                                <label class="form-check-label ms-3 fs-6" for="rating">
                                    <i class="fa-solid fa-star me-2"></i> 2
                                </label>
                              </div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="1" id="rating">
                                <label class="form-check-label ms-3 fs-6" for="rating">
                                    <i class="fa-solid fa-star me-2"></i> 1
                                </label>
                              </div>
                        </div>
                    </div>
                </div> --}}

                <div class="col-10 search-costume">
                    <div class="row row-cols-4">
                        @foreach ($costumes as $costume)
                        <div class="col mb-3">
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
        </div>
    </section>

    @include('home.layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>