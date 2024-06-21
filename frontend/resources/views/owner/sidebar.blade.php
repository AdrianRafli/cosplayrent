<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="/shops/{{ $shop->image }}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">{{ $shop->shop_name }}</h1>
        <p>{{ $shop->user->name }}</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="{{ request()->is('owner/dashboard') ? 'active' : '' }}"><a href="{{url('owner/dashboard')}}"> <i class="icon-home"></i>Home </a></li>

            <li class="{{ request()->is('owner/order_list') ? 'active' : '' }}"><a href="{{url('owner/order_list')}}"> <i class="icon-windows"></i>Order List </a></li>
            
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Kostum</a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li class="{{ request()->is('owner/view_costume') ? 'active' : '' }}">
                  <a href="{{url('owner/view_costume')}}">Katalog Kostum</a>
                </li>
                <li class="{{ request()->is('owner/add_costume') ? 'active' : '' }}">
                  <a href="{{url('owner/add_costume')}}">Tambah Kostum</a>
                </li>
              </ul>
            </li>
  </nav>