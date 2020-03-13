<div class="container">
    <div class="d-flex justify-content-center">
        <div class="container-login">
            <h3 class="text-center">Welcome</h3>
            <?= $this->session->flashdata('message');?>
            <form method="post" action="<?= base_url('Login') ?>">
                <div class="form-group">
                    <label for="uname">NIM</label>
                    <input type="input" class="form-control" id="uname" name="nim" aria-describedby="emailHelp" placeholder="Username" 
                    value="<?= set_value('nim') ?>">
                    <?= form_error('nim', '<small class="text-danger">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary center">Login</button>
            </form>
        </div>
    </div>
</div>