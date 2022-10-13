<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $judul; ?></title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/backend/assets/css/app.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/backend/assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/backend/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/backend/assets/css/components.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/backend/assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/backend/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/backend/assets/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/backend/assets/css/animasi.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/css/gaya.css">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>komponen/images/arwanalg.png" />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="bell"></i>
              <span class="badge headerBadge1">
                <?php echo $orderan; ?> </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                <?php
				if($orderan > 0){
					echo "" . $orderan . " Pesanan baru!";
				}else{
					echo "Tidak ada pesanan baru.";
				}
				?>
                
              </div>
              <div class="dropdown-list-content dropdown-list-message">
				<?php
				foreach($listorderan as $lo):
				$cd = $lo->kode_pemesanan;
				$brght = $this->db->query("SELECT * FROM pemesanan JOIN produk ON produk.id_produk=pemesanan.id_produk WHERE kode_pemesanan='$cd'")->num_rows();
				?>
					<a href="<?php echo base_url('backend/orders/details/'); ?><?php echo $cd; ?>" class="dropdown-item">
					<span class="dropdown-item-desc"> 
					<?php
					if($brght > 1){
					?>
					<span class="message-user"><?php echo $brght; ?> Item</span>
					<?php }else{ ?>
					<span class="message-user"><?php echo $lo->nama_produk; ?> (x<?php echo $lo->qty; ?>)</span>
					<?php } ?>
						<span class="time messege-text"><?php echo $lo->nama_lengkap; ?></span>
						<span class="time"><?php echo format_indo($lo->tanggal_pemesanan); ?></span>
					  </span>
					</a>
				<?php endforeach; ?>
              </div>
              <div class="dropdown-footer text-center">
                <a href="<?php echo base_url('backend/orders'); ?>">Lihat Semua <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
		  <?php
		  $ade = $admn['nama_admin'];
		  $first = substr($ade,0,1);
		  $second = substr($ade,6,1);
		  ?>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <figure class="avatar mr-2 bg-info text-white" data-initial="<?php echo $first ."". $second; ?>"></figure> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Halo <?php echo $admn['nama_admin']; ?></div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('backend/auth/logout'); ?>" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url('backend/dashboard'); ?>"> <img alt="image" src="<?php echo base_url(); ?>komponen/images/arwanalogo2.png" class="header-logo" />
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">UTAMA</li>
            <li class="dropdown">
              <a href="<?php echo base_url('backend/dashboard'); ?>" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="<?php echo base_url('backend/customer'); ?>" class="nav-link"><i data-feather="user"></i><span>Pelanggan</span></a>
            </li>
			<li class="dropdown">
              <a href="<?php echo base_url('backend/products'); ?>" class="nav-link"><i data-feather="list"></i><span>Produk</span></a>
            </li>
			<li class="dropdown">
              <a href="<?php echo base_url('backend/orders'); ?>" class="nav-link"><i data-feather="list"></i><span>Pemesanan</span></a>
            </li>
			<li class="dropdown">
              <a href="<?php echo base_url('backend/report'); ?>" class="nav-link"><i data-feather="list"></i><span>Laporan</span></a>
            </li>
			<li class="menu-header">ADMIN MODE</li>
			<li class="dropdown">
              <a href="<?php echo base_url('backend/admin'); ?>" class="nav-link"><i data-feather="user"></i><span>Ruang Admin</span></a>
            </li>
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">