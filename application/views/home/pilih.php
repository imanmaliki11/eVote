<!-- Image and text -->

<nav class="navbar navbar-light bg-warna">
	<div class="container">
		<div class="navbar-brand mx-auto tx-warna">
			<i class="fas fa-user"></i>
			<?= $nim ?>
		</div>
	</div>
</nav>

<section>
	<div class="container">
		<div class="d-flex justify-content-center mt-5">
			<div class="card" style="width: 18rem; ">
				<img class="card-img-top" style="height: 23rem; width: 18rem;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTYt1vapA72Svq5rQGMzUeVRnQKZHsNA_NEQcNjndSElmmqqBU9" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">CALON 1</h5>
					<p class="card-text">Nama Lengkap</p>
					<a href="#" class="btn btn-primary">VOTE</a>
				</div>
			</div>

			<div class="card ml-2" style="width: 18rem; ">
				<img class="card-img-top" style="height: 23rem; width: 18rem;" src="https://bkpsdmd.babelprov.go.id/sites/default/files/images/artikel/1_7.png" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">CALON 2</h5>
					<p class="card-text">Nama Lengkap</p>
					<a href="<?= base_url('Vote',$nim);?>" class="btn btn-primary">VOTE</a>
				</div>
			</div>
		</div>
	</div>
</section>