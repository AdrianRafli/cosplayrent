<!DOCTYPE html>
<html>
  <head> 
    @include('admin.layouts.head')

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
      .table-category {
        /* text-align: center; */
        margin: auto;
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
        
        <form action="{{url('admin/add_category')}}" method="POST" class="my-5 mx-5">
          @csrf
          <div class="d-flex align-items-center">
            <input type="text" name="category" id="category" style="height: 40px; width: 400px; margin-right: 20px;" placeholder="Anime">
            <input type="submit" class="btn btn-primary" value="Tambah Kategori">
          </div>
        </form>

        <div class="container-table">
          <table id="category-table" class="table table-striped table-dark table-category table-bordered" style="width:100%">
            <thead>
              <tr>
                  <th>Nama Kategori</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>
                      <a href="{{url('admin/edit_category', $data->id)}}" class="btn btn-info">Edit</a>
                      <form id="delete-form-{{ $data->id }}" action="{{ url('admin/delete_category', $data->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="confirmation(event, {{ $data->id }})">Delete</button>
                      </form>
                      {{-- <a href="{{url('admin/delete_category', $data->id)}}" onclick="confirmation(event)" class="btn btn-danger">Delete</a> --}}
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
      $('#category-table').DataTable();

      function confirmation(ev, id) {
        ev.preventDefault();

        swal({
            title: "Yakin untuk menghapus?",
            text: "Penghapusan akan permanen!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
      }
    </script>

  </body>
</html>