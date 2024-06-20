<!DOCTYPE html>
<html>
  <head> 
    @include('admin.layouts.head')

    <style>
      body {
        color: white;
      }
    </style>
  </head>
  <body>

    @include('admin.layouts.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.layouts.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        
        <form action="{{url('admin/update_category', $data->id)}}" method="POST" class="my-5 mx-5">
          @csrf
          @method('PUT')
          <h1 class="mb-4">Update Kategori</h1>
          <div>
            <label for="category" class="form-label" style="font-size: 20px;">Nama Kategori</label>
            <div class="d-flex align-items-center">
              <input type="text" name="category" id="category" style="height: 40px; width: 400px; margin-right: 20px;" placeholder="Anime" value="{{$data->name}}">
              <input type="submit" class="btn btn-primary" value="Update Kategori">
            </div>
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