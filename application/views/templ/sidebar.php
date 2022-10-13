<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Produk</li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('product/add'); ?>">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Tambah Produk</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('product/list'); ?>">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Daftar Produk</span>
            </a>
          </li>
          <li class="nav-item nav-category">Transaksi</li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('transaction/add_transaction'); ?>">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Tambah Transaksi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('transaction/list'); ?>">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">List Transaksi</span>
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('transaction/report'); ?>">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Faktur</span>
            </a>
          </li>
        </ul>
      </nav>