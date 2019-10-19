<div class="cardku" style="margin-top:2%; width:80%; margin-left:10%;">
    <div class="card-headerku">
        <h1>
            <i class="fas fa-money-bill    "></i>
            <span>Checkout</span>
        </h1>
    </div>
    <?= form_open_multipart('user/home/pay') ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-item">
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname" class="form-control" required>
        </div>
        <div class="form-item">
            <label for="address">Address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>
        <div class="form-item">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="form-item">
            <label for="receipt" required>Receipt</label>
            <input type="file" name="receipt" class="form-control" style="padding-bottom:4%;" required>
        </div>
        <button class="btn btn-success" style="margin-top:2%;">
            <i class="fas fa-check    "></i>
            <span>Confirm</span>
        </button>
    </form>
    <?php form_close() ?>
</div>