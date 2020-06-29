  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion bg-warna" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fab fa-connectdevelop"></i>
        </div>
        <div class="sidebar-brand-text mx-3">HMS ITENAS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('Admin/tPemilih');?>">
          <i class="fas fa-folder-plus"></i>
          <span>Input Peserta Pemilih</span></a>
      </li>

      <!-- Nav Item - Input Calon -->
      <li class="nav-item">
      <a class="nav-link" href="<?=base_url('Admin/tCalon');?>">
          <i class="fas fa-user-plus"></i>
          <span>Input Calon Ketua</span></a>
      </li>

      <!-- Nav Item - Input Pemilih -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#ResetModal">
        <i class="fas fa-redo-alt"></i>
          <span class="text-danger">Reset Data Pemilih</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-dark bg-warna topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline small">ADMIN</span>
              </a>

              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>

        </nav>


        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
        	<div id="wrapper">
		<div class="d-flex flex-column" id="content-wrapper">
			<div id="content">
			<div class="container-fluid">
				<div class="row">

					<div class="col-md-12 col-xl-6 mb-4">
						<div class="card shadow border-left-success py-2">
							<div class="card-body">
								<div class="row align-items-center no-gutters">
									<div class="col mr-2">
										<div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Suara Masuk</span></div>
										<div class="text-dark font-weight-bold h5 mb-0"><span><?=$suaramasuk ?></span></div>
									</div>
									<div class="col-auto"><i class="fas fa-money-check fa-2x text-gray-300"></i></div>
								</div>
							</div>
						</div>
          </div>
          
          <div class="col-md-12 col-xl-6 mb-12">
						<div class="card shadow border-left-warning py-2">
							<div class="card-body">
								<div class="row align-items-center no-gutters">
									<div class="col mr-2">
										<div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>Pemilih Terdaftar</span></div>
										<div class="text-dark font-weight-bold h5 mb-0"><span><?=$totalpemilih ?></span></div>
									</div>
									<div class="col-auto"><i class="fas fa-money-check fa-2x text-gray-300"></i></div>
								</div>
							</div>
						</div>
          </div>
          
        </div>
      
      <h3 class="mt-2">PEROLEHAN SUARA</h3>
<!-- Perulangan menampilkan calon dan perolehan suara -->
    <?php foreach($calon as $cl) {?>
        <div class="row mt-2">

          <div class="col-sm-6">
            <div class="card bg-warna" style="height: 6rem;">
              <div class="row no-gutters">
                  <div class="col-xl-3 my-1 ml-1 align-items-center">
                    <img src="<?=base_url()?>assets/img/<?=$cl['foto']?>" style="width: 4rem; height: 5.4rem;" class="card-img align-content-center img-circle">
                  </div>
                  <div class="card-body col-xl-7 text-align-center">
                    <div class="text-uppercase text-light font-weight-bold h5 mb-0"><span>#<?=$cl['no_urut']?>  <?=$cl['nama']?></span></div>
                    <div class="text-uppercase text-light font-weight-bold h5 mb-0"><span><?=$cl['nim']?></span></div>
                  </div>
              </div>
            </div>
          </div>
          
          <?php 
            if($cl['no_urut'] == 1) { 
              $curr = $satu;
            } elseif($cl['no_urut'] == 2) {
              $curr = $dua;
            } else {
              $curr = $tiga;
            }
            $p = ($curr*100 )/ $totalpemilih;
          ?>

          <div class="col-sm-6">
            <div class="card bg-warna" style="height: 6rem;">
              <div class="card-body">
                <h5 class="card-title text-light">Perolehan Suara</h5>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: <?=$p;?>%;" aria-valuemin="0" aria-valuemax="100"><?=$curr;?></div>
                </div>  
              </div>
            </div>
          </div>
        </div>

    <?php }?>


			</div>
    </div>
    


	</div>
	</div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= base_url('Admin/logout') ?>">Logout</a>
    </div>
    </div>
</div>
</div>


  <!-- Reset Data Modal-->
  <div class="modal fade" id="ResetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">Pilih "Ya" jika anda yakin ingin merestart data pemilih.</div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
        <a class="btn btn-primary" href="<?= base_url('Admin/reset') ?>">Ya</a>
    </div>
    </div>
</div>
</div>