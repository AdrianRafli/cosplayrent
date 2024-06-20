<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>

    <link rel="stylesheet" href="{{asset('css/global.css')}}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/2b86481c1c.js" crossorigin="anonymous"></script>

    {{-- Datatables --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">


    <style>
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
    
  @include('home.layouts.navbar')

    <section class="cart-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table id="order-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                              <th>Nama</th>
                              <th>Address</th>
                              <th>Nama Kostum</th>
                              <th>Harga</th>
                              <th>Gambar</th>
                              <th>Toko</th>
                              <th>Status</th>
                              <th>Konfirmasi Pengembalian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $order)
                            <tr>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->costume->name}}</td>
                                <td>{{$order->costume->price}}</td>
                                <td>
                                  <img src="/costumes/{{$order->costume->image}}" class="costume-img" alt="Costume">
                                </td>
                                <td>
                                  <h5 class="fw-bold">{{$order->shop->shop_name}}</h5>
                                  <h6>Alamat Toko:</h6>
                                  <h6 class="fw-bold">{{$order->shop->address}}, {{$order->shop->city}}</h6>
                                </td>
                                <td>
                                  @if ($order->status == 'dalam proses')
                                      <span style="color: red;">{{$order->status}}</span>
                                  @elseif ($order->status == 'dikirim')
                                      <span style="color: rgb(187, 187, 23);">{{$order->status}}</span>
                                  @elseif ($order->status == 'diterima')
                                      <span style="color: blue;">{{$order->status}}</span>
                                  @elseif ($order->status == 'dikembalikan')
                                      <span style="color: purple;">{{$order->status}}</span>
                                  @elseif ($order->status == 'selesai')
                                      <span style="color: green;">{{$order->status}}</span>
                                  @endif
                                </td>
                                <td>
                                  @if ($order->status == 'dikirim')
                                    <a href="{{url('diterima', $order->id)}}" class="btn btn-info">Diterima</a>
                                  @elseif ($order->status == 'diterima')
                                    <p>Dimohon untuk mengembalikan kostum sesuai alamat toko</p>
                                    <a href="{{url('dikembalikan', $order->id)}}" class="btn btn-success">Proses Pengembalian</a>
                                  @elseif ($order->status == 'selesai')
                                    <p>Selesai</p>
                                  @else
                                    <p>Menunggu Konfirmasi</p>
                                  @endif
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>

    @include('home.layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    {{-- Datatables --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <script type="text/javascript">
      $('#order-table').DataTable();
    </script>
</body>
</html>