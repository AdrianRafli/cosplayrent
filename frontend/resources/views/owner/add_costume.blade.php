<!DOCTYPE html>
<html>
  <head> 
    @include('owner.head')

    <style>
      body {
        color: white;
      }
      label {
        font-size: 24px !important;
        font-weight: bold;
      }
    </style>
  </head>
  <body>

    @include('owner.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('owner.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        
        <form action="{{url('owner/upload_costume')}}" method="POST" enctype="multipart/form-data" class="my-5 mx-5 col-lg-8 col-sm-12">
          <h1 class="mb-4">Tambah Kostum</h1>
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nama Kostum</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Deksripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
          </div>
          <div class="row mb-3 d-flex align-items-end justify-content-center">
            <div class="col-6">
              <label for="price" class="form-label">Harga</label>
              <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="col-1 text-center">
              <h2>/</h2>
            </div>
            <div class="col-5">
              <label for="day" class="form-label">Hari</label>
              <input type="number" class="form-control" id="day" name="day" required>
            </div>
          </div>
          <div class="mb-3 d-flex flex-column">
            <label for="category" class="form-label">Kategori</label>
            <select class="form-select" aria-label="Kategori" name="category" required style="height: 40px;">
                @foreach ($category as $category)    
                <option value="{{$category->name}}">{{$category->name}}</option>
                @endforeach
              </select>
          </div>
          <div class="mb-3">
            <label for="size" class="form-label">Ukuran</label>
            <input type="text" class="form-control" id="size" name="size" required placeholder="format: S,L,XL / L,XL">
          </div>
          <div class="mb-3 d-flex flex-column">
            <label for="available" class="form-label">Ketersediaan</label>
            <select class="form-select" aria-label="available" name="available" required style="height: 40px;">
                <option value="ready" selected>Tersedia</option>
                <option value="notready">Tidak Tersedia</option>
              </select>
          </div>
          <div class="mb-5">
            <label for="image" class="form-label">Gambar</label>
            <input class="form-control" type="file" id="image" name="image">
          </div>
          <div class="mb-3">
            <input class="btn btn-success" type="submit" value="Tambah Kostum">
          </div>
        </form>

      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('ownercss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('ownercss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('ownercss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('ownercss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('ownercss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('ownercss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('ownercss/js/charts-home.js')}}"></script>
    <script src="{{asset('ownercss/js/front.js')}}"></script>

    {{-- Sweetalert --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  </body>
</html>