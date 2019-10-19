<div class="cardku" style="margin-top:2%; width:80%; margin-left:10%;">
    <div class="card-headerku">
        <h1>
            <i class="fas fa-cart-arrow-down    "></i>
            <span>My Cart</span>
        </h1>
        <form action="user/controllerCart.php?act=drop" method="post">
            <input type='hidden' name='idUser' value='<?php echo $_SESSION['id'] ?>'>
            <button onclick=" return confirm('Sure to drop the cart?')" class="btn btn-danger" style="float:right; margin-top:-3%;">
                <i class="fas fa-trash    "></i>
                <span>Delete All</span>
            </button>
        </form>
    </div>
    <table class="table">
        <?php $no = 1; $grandtotal = 0;?>
        <?php if(empty($keranjang)){?>
            <tr>
                <td>
                    Your Cart is Empty :( <br>
                    Start buying some goods on our Catalog :)
                    <br><br>
                </td>
            </tr>
        <?php }else{ ?>
        <?php foreach($keranjang as $k): ?>
            <tr>
                <td>
                    <br>
                    <br>
                    <?= $no++ ?>
                </td>
                <td>
                    <img src="<?= base_url().'uploads/products/'.$k->img ?>">
                </td>
                <td>
                    <br>
                    <br>
                    <?= $k->name ?>
                </td>
                <td>
                    <br>
                    <br>
                    Rp. <?= number_format($k->price)?>
                </td>
                <td>
                    <?= form_open('user/home/plusQuantity') ?>
                    <form action="" method="post">
                        <input type="hidden" name="idProduct" value="<?= $k->id_products ?>">
                        <button class="btnku btnku-putih">
                            <i class="fas fa-plus    "></i>
                        </button>
                    </form>
                    <?php form_close() ?>
                    <?= $k->qty?>
                    <?php if($k->qty > 1): ?>
                    <?= form_open('user/home/minusQuantity') ?>
                    <form action="" method="post">
                        <input type="hidden" name="idProduct" value="<?= $k->id_products ?>">
                        <button class="btnku btnku-putih">
                            <i class="fas fa-minus    "></i>
                        </button>
                    </form>
                    <?php form_close() ?>
                    <?php endif ?>
                    <?php if($k->qty <= 1): ?>
                    <?= form_open('user/home/delProduct') ?>
                    <form action="" method="post">
                        <input type="hidden" name="idProduct" value="<?= $k->id_products ?>">
                        <button class="btnku btnku-putih">
                            <i class="fas fa-minus    "></i>
                        </button>
                    </form>
                    <?php endif?>
                </td>
                <td>
                    <br>
                    <br>
                    <?php $total = $k->price * $k->qty ?>
                    Rp. <?= number_format($total)?>
                </td>
                <td>
                    <br>
                    <br>
                    <?= form_open('user/home/delProduct') ?>
                    <form action='' method='post'>
                        <input type='hidden' name='idProduct' value='<?= $k->id_products?>'>
                        <button class='btn btn-danger'>
                            <i class='fas fa-times'></i>
                        </button>
                    </form>
                    <?php form_close() ?>
                </td>
            </tr>
            <?php $grandtotal = $grandtotal + $total ?>
        <?php endforeach ?>
    </table>
    <div class="cart-footer">
        <h1>
            <span>
                Total :
            </span>
            <span style="float:right; color:#fc4700; font-size:15pt;">
                Rp. <?= number_format($grandtotal) ?>
            </span>
        </h1>
        <br>
            <a href="<?= base_url().'user/home/confirm'?>">
                <button class="btn btn-primary">
                    <i class="fas fa-arrow-right    "></i>
                    <span>Checkout</span>
                </button>
            </a>
    </div>
    <?php }?>
</div>