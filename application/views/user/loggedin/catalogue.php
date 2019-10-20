<div class="cardku" style="width:100%">
    <div class="card-headerku">
        <h2>
            <i class="fas fa-list"></i>
            <span>Catalogue</span>
        </h2>
    </div>
    <div class="mini-card-containerku">
        <table>
            <tr>
                <form action="" method="post">
                    <td>
                        <label for="combo_cat">Filter : &nbsp;&nbsp;</label>
                    </td>
                    <td>
                        <select name="comboCat" class="form-input">
                            <option value="99" selected> - All</option>
                            <?php foreach($kumpulanKategori as $k):?>
                                <option value="<?= $k->id_categories?>"><?= $k->name?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                    <td>
                        <input type="submit" value="Filter" name="btnFil" class="btn btn-success">
                    </td>
                </form>
            </tr>
        </table>
        <table>
            <tr>
                <form action="" method="post">
                    <td>
                        <label for="var_search">Product Name : &nbsp;&nbsp;</label>
                    </td>
                    <td>
                        <input type="text" name="varSearch" class="form-input">
                    </td>
                    <td>
                        <input type="submit" value="Search" name="btnSrc" class="btn btn-success">
                    </td>
                </form>
            </tr>
        </table>
    </div>
    <div class="mini-card-containerku">
        <?php if(empty($kumpulanProduk) && $isSearch):?>
            <div class="alert alert-danger" role="alert" style="width:100%">
                <center>
                    <b><?= $keyword; ?></b> not found.
                </center>
            </div>
        <?php endif; ?>
        <?php if(!empty($kumpulanProduk) && $isSearch):?>
            <div class="alert alert-primary" role="alert" style="width:100%">
                <center>
                    Showing result of <b><?= $keyword;?></b>
                </center>
            </div>
        <?php endif; ?>
        <?php if(!empty($kumpulanProduk) && $isFilter):?>
            <div class="alert alert-primary" role="alert" style="width:100%">
                <?php foreach($kumpulanProduk as $p): ?>
                    <center>
                        Showing result of <b><?= $p->nm; break;?></b>
                    </center>
                <?php endforeach ?>
            </div>
        <?php endif; ?>
        <div class="item-container">
            <?php foreach($kumpulanProduk as $p): ?>
            <div class="item-card">
                <img src="<?= base_url().'uploads/products/'.$p->img?>">
                <p style="margin-top:10%">
                    <?php
                    if (strlen($p->name) > 23) {
                        echo substr($p->name, 0, 20) . ". . .";
                    } else {
                        echo $p->name;
                    }
                    ?>
                </p>
                <br>
                <h5 style="margin-top:-10%">Rp. <?= number_format($p->price) ?></h5>
                <br>
                <?= form_open('user/home/addToCart')?>
                <form action="" method="post">
                    <input type="hidden" name="idProduct" value="<?= $p->id_products ?>">
                    <button class="btnku btnku-putih" onclick="return confirm('Added to Cart~')">
                        <i class="fas fa-cart-plus    "></i>
                        <span>Add to Cart</span>
                    </button>
                    <a href="<?= base_url().'user/home/detail/'.$p->id_products?>" class="btnku btnku-putih">
                        <i class="fas fa-eye    "></i>
                    </a>
                </form>
                <?php form_close() ?>
            </div>
            <?php endforeach?>
        </div>
    </div>
</div>