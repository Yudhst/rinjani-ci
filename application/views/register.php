<div class="cardku" style="width:60%; margin:10% 0 0 20%;">
    <div class="card-headerku">
        <img 
            src="<?= base_url().'assets/img/logo.png' ?>" alt="logo"
            style="width:50%; margin-left: 20%;">
    </div>
    <div class="mini-card-containerku">
       <?= form_open('login/register')?>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">A&nbsp;</span>
                    </div>
                    <input type="text"
                    class="form-control" name="varName" id="" placeholder="Full Name" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@</span>
                    </div>
                    <input type="email"
                    class="form-control" name="varEmail" id="" placeholder="Email" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">&nbsp;a</span>
                    </div>
                    <input type="text"
                    class="form-control" name="varUsername" id="" placeholder="Username" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">#&nbsp;</span>
                    </div>
                    <input type="password"
                    class="form-control" name="varPassword" id="" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-lg btn-block" style="background-color:#fc4700; color: white;">Register</button>
            </form>
        <?php form_close()?>
    </div>
</div>