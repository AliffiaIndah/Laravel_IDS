<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{asset ('assets')}}/dist/img/wallpaper1.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Website Toko Barang</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::user()->avatar }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="/home"class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Customer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dataCustomer" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Data Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/tambahCustomer" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Tambah Customer 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/tambahCustomer2" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Tambah Customer 2</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Barang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dataBarang" class="nav-link">
                  <i class="fas fa-boxes nav-icon"></i>
                  <p>Daftar Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/tambahBarang" class="nav-link">
                  <i class="fas fa-cart-plus nav-icon"></i>
                  <p>Tambah Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/scanner" class="nav-link">
                  <i class="fas fa-barcode nav-icon"></i>
                  <p>Scan Barcode Barang</p>
                </a>
              </li>
              </ul>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Toko
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/list_toko" class="nav-link">
                  <i class="fas fa-th-list nav-icon"></i>
                  <p>List Toko</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/input_titik" class="nav-link">
                  <i class="fas fa-map-marker-alt nav-icon"></i>
                  <p>Tambah Toko</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/scan-toko" class="nav-link">
                  <i class="fas fa-qrcode nav-icon"></i>
                  <p>Scan Lokasi Toko</p>
                </a>
              </li>
              </ul>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link">
            <i class="nav-icon fas fa-table"></i>
              <p>
                Excel
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/excel" class="nav-link">
                <i class="fas fa-file-import nav-icon"></i>
                  <p>Import Excel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dataCust" class="nav-link">
                <i class="fas fa-file-excel nav-icon"></i>
                  <p>Data Cust</p>
                </a>
              </li>
              
              </ul>
          </li>

          

          <li class="nav-item has-treeview">
            <a href="/scoreboard-controller" class="nav-link">
              <i class="nav-icon fas fa-futbol"></i>
              <p>
                Scoreboard
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="/book" class="nav-link">
              <i class="nav-icon fas fa-futbol"></i>
              <p>
                Data Books
              </p>
            </a>
          </li>

          


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <script>
     /** add active class and stay opened when selected */
    var url = window.location;
    const allLinks = document.querySelectorAll('.nav-item a');
    const currentLink = [...allLinks].filter(e => {
      return e.href == url;
    });
    
    currentLink[0].classList.add("active")
    currentLink[0].closest(".nav-treeview").style.display="block";
    currentLink[0].closest(".has-treeview").classList.add("active");
    currentLink[0].closest(".has-treeview").classList.add("menu-open");
    
    </script>