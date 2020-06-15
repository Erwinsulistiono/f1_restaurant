<!-- BEGIN MENUBAR-->
<div id="menubar" class="menubar-inverse ">
  <div class="menubar-fixed-panel">
    <div>
      <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
        <i class="fa fa-bars"></i>
      </a>
    </div>
    <div class="expanded">
      <a href="<?= base_url() . 'admin/dashboard' ?>">
        <span class="text-lg text-bold text-primary ">F1&nbsp;RESTAURANT</span>
      </a>
    </div>
  </div>
  <div class="menubar-scroll-panel">

    <!-- BEGIN MAIN MENU -->
    <ul id="main-menu" class="gui-controls">

      <!-- BEGIN DASHBOARD -->
      <li class="gui-folder">
        <a>
          <div class="gui-icon"><i class="fa fa-tachometer"></i></div>
          <span class="title">Parameter</span>
        </a>
        <!--start submenu -->
        <ul>
          <li><a href="<?= base_url('admin/parameter/profile_company'); ?>"><span class="title">Profile
                Company</span></a></li>
        </ul>
        <ul>
          <li><a href="<?= base_url('admin/parameter/wewenang'); ?>"><span class="title">Wewenang Menu</span></a></li>
        </ul>
        <ul>
          <li><a href="<?= base_url('admin/parameter/outlet'); ?>"><span class="title">Outlet</span></a></li>
        </ul>
        <ul>
          <li><a href="<?= base_url('admin/parameter/supplier'); ?>"><span class="title">Supplier</span></a></li>
        </ul>
        <ul>
          <li><a href="<?= base_url('admin/parameter/pelanggan'); ?>"><span class="title">Pelanggan</span></a></li>
        </ul>
        <ul>
          <li><a href="<?= base_url('admin/parameter/tax'); ?>"><span class="title">Tax</span></a></li>
        </ul>
        <!--end /submenu -->
      </li>
      <!--end /menu-li -->
      <!-- END DASHBOARD -->

      <li class="gui-folder">
        <a>
          <div class="gui-icon"><i class="fa fa-book"></i></div>
          <span class="title">Katalog</span>
        </a>
        <!--start submenu -->
        <ul>
          <li><a href="<?= base_url('admin/katalog/menu'); ?>"><span class="title">Menu</span></a></li>
        </ul>
        <ul>
          <li><a href="<?= base_url('admin/katalog/kategori_menu'); ?>"><span class="title">Kategori Menu</span></a>
          </li>
        </ul>
        <ul>
          <li><a href="<?= base_url('admin/katalog/inventori'); ?>"><span class="title">Inventori</span></a></li>
        </ul>
        <ul>
          <li><a href="<?= base_url('admin/katalog/gallery'); ?>"><span class="title">Gallery</span></a></li>
        </ul>
        <ul>
          <li><a href="<?= base_url('admin/katalog/kupon'); ?>"><span class="title">Kupon</span></a></li>
        </ul>
        <!--end /submenu -->
      </li>
      <!--end /menu-li -->

      <li class="gui-folder">
        <a>
          <div class="gui-icon"><i class="fa fa-cutlery"></i></div>
          <span class="title">Point of Sale</span>
        </a>
        <!--start submenu -->
        <ul>
          <li class="gui-folder">
            <a href="javascript:void(0);">
              <span class="title">POS Settings</span>
            </a>
            <!--start submenu -->
            <ul>
              <li><a href="#"><span class="title">Pembayaran POS</span></a></li>
              <li><a href="#"><span class="title">Perangkat POS</span></a></li>
              <li><a href="#"><span class="title">Notes/ Catatan Resi</span></a></li>
              <li><a href="#"><span class="title">Pas Key POS</span></a></li>
              <li><a href="#"><span class="title">Shift Timing</span></a></li>
            </ul>
        </ul>
        <ul>
          <li class="gui-folder">
            <a href="javascript:void(0);">
              <span class="title">Restaurant Mode</span>
            </a>
            <!--start submenu -->
            <ul>
              <li><a href="<?= base_url('admin/restaurant/area'); ?>"><span class="title">Settings Area</span></a></li>
              <li><a href="<?= base_url('admin/restaurant/meja'); ?>"><span class="title">Settings Meja</span></a></li>
              <li><a href="#"><span class="title">Settings Bill</span></a></li>
              <li><a href="#"><span class="title">Dapur</span></a></li>
              <li><a href="#"><span class="title">Waiters</span></a></li>
            </ul>
        </ul>
        <ul>
          <li><a href="<?= base_url() . '#' ?>"><span class="title">Saldo Kas Harian</span></a></li>
        </ul>
        <!--end /submenu -->
      </li>
      <!--end /menu-li -->

      <li class="gui-folder">
        <a>
          <div class="gui-icon"><i class="fa fa-tachometer"></i></div>
          <span class="title">Laporan</span>
        </a>
        <ul>
          <li class="gui-folder">
            <a href="javascript:void(0);">
              <span class="title">Penjualan</span>
            </a>
            <!--start submenu -->
            <ul>
              <li><a href="#"><span class="title">Keuntungan</span></a></li>
              <li><a href="#"><span class="title">Laporan Penjualan</span></a></li>
              <li><a href="#"><span class="title">Laporan Outlet</span></a></li>
              <li><a href="#"><span class="title">Laporan Performa Kasir</span></a></li>
            </ul>
        </ul>
        <ul>
          <li class="gui-folder">
            <a href="javascript:void(0);">
              <span class="title">Pengeluaran</span>
            </a>
            <!--start submenu -->
            <ul>
              <li><a href="#"><span class="title">Laporan Pengeluaran Barang</span></a></li>
            </ul>
        </ul>
        <ul>
          <li><a href="<?= base_url() . '#' ?>"><span class="title">Best Selling Product</span></a></li>
        </ul>
        <ul>
          <li><a href="<?= base_url() . '#' ?>"><span class="title">Laporan Pelanggan</span></a></li>
        </ul>
      </li>

      <li class="gui-folder">
        <a>
          <div class="gui-icon"><i class="fa fa-cogs"></i></div>
          <span class="title">Sistem</span>
        </a>
        <!--start submenu -->
        <ul>
          <li><a href="<?= base_url() . '#' ?>"><span class="title">About</span></a></li>
        </ul>
      </li>

      <li class="gui-folder">
        <a>
          <div class="gui-icon"><i class="fa fa-file"></i></div>
          <span class="title">Import Data</span>
        </a>
        <!--start submenu -->
        <ul>
          <li><a href="<?= base_url() . '#' ?>"><span class="title">Produk</span></a></li>
        </ul>
      </li>

      <li class="gui-folder">
        <a>
          <div class="gui-icon"><i class="fa fa-user"></i></div>
          <span class="title">User</span>
        </a>
        <!--start submenu -->
        <ul>
          <li><a href="<?= base_url() . 'admin/pengguna' ?>"><span class="title">User List</span></a></li>
        </ul>
      </li>

    </ul>
    <!--end .main-menu -->
    <!-- END MAIN MENU -->

  </div>
  <!--end .menubar-scroll-panel-->
</div>
<!--end #menubar-->
<!-- END MENUBAR -->