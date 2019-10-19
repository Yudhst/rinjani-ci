<div class="cardku" style="width:60%; margin:10% 0 0 20%;">
    <div class="card-headerku">
        <img 
            src="<?= base_url().'assets/img/logo.png' ?>" alt="logo"
            style="width:50%; margin-left: 20%;">
    </div>
    <?php if($this->session->flashdata('pesan') == TRUE):?>
    <div class="alert alert-info alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $this->session->flashdata('pesan');?>
    </div>
    <?php endif; ?>
    <div class="mini-card-containerku">
       <?= form_open('login/auth')?>
            <form action="" method="post" class="formlogin">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">a&nbsp;</span>
                    </div>
                    <input type="text"
                    class="form-control" name="varUsername" id="" placeholder="Username">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">#&nbsp;</span>
                    </div>
                    <input type="password"
                    class="form-control" name="varPassword" id="" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-lg btn-block" style="background-color:#fc4700; color: white;">Login</button>
            </form>
        <?php form_close()?>
    </div>
    <div class="mini-card-containerku">
        <p>
            <center>
                Don't have an account? 
                <a href="<?= base_url().'login/register'?>" style="color:#fc4700">Sign up</a>
            </center>
        </p>
    </div>
</div>