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
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('Admin')?>">
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
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-user-plus"></i>
          <span>Input Calon Ketua</span></a>
      </li>

      <!-- Nav Item - Reset Pemilih -->
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
                <div class="dropdown-divider"></div>
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
          <h1 class="h3 mb-4 text-gray-800 text-center">Calon Ketua Himpunan</h1>
        	<div id="wrapper">
		<div class="d-flex flex-column col-xl-4 col-md-4 col-sm-12" id="content-wrapper">
			<div id="content">

      <h4 class="mb-2 text-gray-800 text-center">Tambah Calon Ketua Himpunan</h4>

    <!-- Note -->
    <small class="text-danger">Maximal 3 (Tiga) Calon</small>
    <br>
    <!-- Form masukan data -->
            <?php $next_no = count($calon) + 1 ;?>
    <?php echo form_open_multipart('admin/tCalonAction');?>
        <div class="form-group">
            <label for="formGroupExampleInput">No Urut</label>
            <input disabled type="text" class="form-control" name="nourut" placeholder="<?=$next_no;?>" 
            value="<?= set_value($next_no);?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Calon">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">NIM</label>
            <input type="text" class="form-control" name="nim" placeholder="NIM Calon">
        </div>
        <div class="custom-file">
            <label for="formGroupExampleInput">Foto</label><br>
            <input type="file" name="foto" required>
        </div>
        <small class="text-danger">Ukuran Foto 4x3</small> <br>
        <button type="submit" class="btn btn-primary mt-4">Tambahkan</button>
    <?=form_close();?>

    <!-- End Form -->
 


    </div>
    
	</div>



    <!-- table -->
    <div class="d-flex flex-column ml-5 col-xl-6 col-md-6 col-sm-12" id="content-table">
    <h4 class="mb-2 text-gray-800 text-center">Daftar Calon Ketua Himpunan</h4>
    <div class="table-responsive">
  									<table id="table" class="table table-striped table-bordered table-hover">
  										<thead>
  											<tr>
												  <th>Nomor</th>
  												<th>Nama</th>
  												<th>NIM</th>
  												<th>Options</th>
  											</tr>
  										</thead>
  										<tbody>

                      <?php foreach($calon as $cl) {?>

  												<tr>
  													<td><?=$cl['no_urut']?></td>
  													<td><?=$cl['nama']?></td>
  													<td><?=$cl['nim']?></td>
  													<td>
                              <!-- <button style="width:80px"  id='<?php echo json_encode($cl); ?>' onClick="openModal(this.id)" type="button" class="btn btn-warning m-1" data-toggle="modal" data-target="#exampleModal">Edit</button> -->
                              <button style="width:80px" id="<?php echo $cl['no_urut']; ?>"  onClick="deleteModal(this.id)" type="button" class="btn btn-danger m-1" data-toggle="modal" data-target="#Modal_Delete">Hapus</button>
  													</td>
  												</tr>

  											<?php } ?>

										  </tbody>
										
  									</table>
                  </div>
    
    <!-- end of tabel -->
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


<form action="<?php echo base_url(). 'admin/hapus'; ?>" method="post">
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
				  </div>
				  <div class="form-group" style="display: hidden;">
            <input type="hidden" class="form-control" id="id" name="id" >
          </div>
                  <div class="modal-body">
                       <strong>Yakin ingin menghapus?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="product_code_delete" id="product_code_delete" class="form-control">
                    <button type="submit" id="btn_delete" class="btn btn-danger">Ya</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                  </div>
                </div>
              </div>
            </div>
            </form>


<form action="<?php echo base_url(). 'Admin/update'; ?>" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <?php date_default_timezone_set("Asia/Jakarta"); ?>
	  <input type="hidden" class="form-control" id="tanggal" name="tanggal" value="<?= date("Y-m-d h:i:sa"); ?>">
		<!-- <div class="form-group">
			<label for="tanggal" class="col-form-label">Tanggal:</label>
			<input type="hidden" class="form-control" id="tanggal" name="tanggal" value="<?= date("Y-m-d h:i:sa") ?>">
		  </div> -->
          
          <div class="form-group">
			<label for="nama" class="col-form-label">Nama:</label>
			<input disabled type="text" class="form-control" id="nama" name="nama" value="<?= $_SESSION['username']; ?>">
		  </div>
		  
          <div class="form-group">
			<label for="jumlah" class="col-form-label">Jumlah:</label>
			<input type="text" class="form-control" id="jumlah" name="jumlah" >
		  </div>

		  <div class="form-group">
			<label for="detail" class="col-form-label">Detail:</label>
			<input type="text" class="form-control" id="detail" name="detail" >
		  </div>
		  
		  <div class="form-group" >
            <input type="hidden" class="form-control" id="id_edit" name="id_edit" >
          </div>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Tutup</button>
		<button type="submit" class="btn btn-warning">Perbarui</button>
      </div>
    </div>
  </div>
</form>


<script>
	function openModal(id) {
		// var json=$(this).data("href");
		var obj = JSON.parse(id);
		document.getElementById('id_edit').value = obj.id_pemasukan;
		//document.getElementById('tanggal').value = obj.tanggal;
		//document.getElementById('nama').value = obj.nama;
		document.getElementById('jumlah').value = obj.jumlah;
		document.getElementById('detail').value = obj.detail;
		console.log(obj);
	}
</script>
<script>
	
	function deleteModal(id) {
		// var json=$(this).data("href");
		// var obj = JSON.parse(id);
		document.getElementById('id').value = id;
		// console.log(obj);
	}
</script>



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