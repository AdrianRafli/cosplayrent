<!DOCTYPE html>
<html>
  <head> 
    @include('owner.head')

    {{-- Datatables --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">

    <style>
      input[type='text'] {
        width: 400px;
        height: 40px;
        margin-right: 20px;
        padding-left: 20px !important;
        border-radius: 6px
      }
      .container-table {
        padding: 0 50px;
        color: white;
        margin-top: 50px;
      }
      .table-costume {
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

    @include('owner.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('owner.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="container-table">
          <table id="costume-table" class="table table-striped table-dark table-costum table-bordered" style="width:100%">
            <thead>
              <tr>
                  <th>Nama Kostum</th>
                  <th>Deskripsi</th>
                  <th>Harga</th>
                  <th>Kategori</th>
                  <th>Ukuran</th>
                  <th>Ketersediaan</th>
                  <th>Gambar</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($costume as $costume)
                <tr class="align-middle">
                    <td>{{$costume->name}}</td>
                    <td>{!!Str::limit($costume->description, 50)!!}</td>
                    <td>{{$costume->price}}</td>
                    <td>{{$costume->category}}</td>
                    <td>{{$costume->size}}</td>
                    <td>{{$costume->available}}</td>
                    <td>
                      <img src="/costumes/{{$costume->image}}" class="costume-img" alt="Costume">
                    </td>
                    <td>
                      <a href="{{url('owner/edit_costume', $costume->id)}}" class="btn btn-info">Edit</a>
                      <a href="{{url('owner/delete_costume', $costume->id)}}" onclick="confirmation(event)" class="btn btn-danger">Delete</a>
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
      $('#costume-table').DataTable();

      function confirmation(ev) {
        ev.preventDefault();

        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);

        swal({
          title: "Yakin untuk menghapus?",
          text: "Penghapusan akan permanen!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        
        .then((willCancel)=> {
          if(willCancel) {
            window.location.href=urlToRedirect;
          }
        });
      }
    </script>

  </body>
</html>