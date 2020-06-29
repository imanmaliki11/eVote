<!-- Image and text -->

<nav class="navbar navbar-light bg-warna">
	<div class="container">
		<div class="navbar-brand mx-auto tx-warna">
			<i class="fas fa-user"></i>
			<?= $this->session->userdata('nim'); ?>
		</div>
	</div>
</nav>

<section>
	<div class="container">
		<div class="d-flex justify-content-center mt-2">

			<!-- perulangan calon -->

		<?php foreach($calon as $cl) {?>

			<div class="card mx-2 mb" style="width: 18rem; ">
				<img class="card-img-top"style="max-height: 23rem; max-width: 18rem;" src="<?=base_url()?>assets/img/<?=$cl['foto']?>" alt="Card image cap">
				<div class="card-body">
					<h5>#<?=$cl['no_urut']?></h5>
					<h5 class="card-title"><?=$cl['nama']?></h5>
					<p class="card-text"><?=$cl['nim']?></p>
					<?php
						$pp = strlen($cl['nama']);
						if($pp < 23) echo "<br>";
					?>
					<a href="<?= base_url('vote/pilihkahim/').$cl['no_urut']?>" class="btn btn-primary my-auto">VOTE</a>
				</div>
			</div>

		<?php }?>

		</div>
	</div>
</section>