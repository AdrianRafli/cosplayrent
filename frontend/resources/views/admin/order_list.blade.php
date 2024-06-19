<!DOCTYPE html>
<html>
  <head> 
    @include('admin.layouts.head')

    {{-- Datatables --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">

    <style>
      .container-table {
        padding: 0 50px;
        color: white;
        margin-top: 50px;
      }
      .table-category {
        /* text-align: center; */
        margin: auto;
      }
      .costume-img {
        width: 150px;
        height: 150px;
        object-fit: contain;
      }
      td {
        vertical-align: middle !important;
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
        
        <div class="container-table">
          <table id="order-table" class="table table-striped table-dark table-category table-bordered" style="width:100%">
            <thead>
              <tr>
                  <th>Nama</th>
                  <th>Address</th>
                  <th>Nama Kostum</th>
                  <th>Harga</th>
                  <th>Gambar</th>
                  <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $data)
                <tr>
                    <td>{{$data->user->name}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->costume->name}}</td>
                    <td>{{$data->costume->price}}</td>
                    <td>
                      <img src="/costumes/{{$data->costume->image}}" class="costume-img" alt="Costume">
                    </td>
                    <td>
                      @if ($data->status == 'dalam proses')
                          <span style="color: red;">{{$data->status}}</span>
                      @elseif ($data->status == 'dikirim')
                          <span style="color: yellow;">{{$data->status}}</span>
                      @elseif ($data->status == 'diterima')
                          <span style="color: blue;">{{$data->status}}</span>
                      @elseif ($data->status == 'dikembalikan')
                          <span style="color: purple;">{{$data->status}}</span>
                      @elseif ($data->status == 'selesai')
                          <span style="color: green;">{{$data->status}}</span>
                      @endif
                    </td>
                </tr>
                @endforeach
        </table>
        </div>

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

    {{-- Datatables --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <script type="text/javascript">
      $('#order-table').DataTable();
    </script>

  </body>
</html>