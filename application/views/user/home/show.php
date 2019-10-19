<?php foreach($produk as $p): ?>
<div class="cardku" style="width:80%; height:auto; margin:2% 0 8% 10%; background:url(<?= base_url().'assets/img/cart.png'?>)">
  <div class="card-headerku">
    <h2>
      <i class="fas fa-campground    "></i>
      <span><?= $p->name ?></span>
    </h2>
  </div>
  <div class="detail-container">
    <div class="detail-card">
      <h2>Details</h2>
      <hr>
      <h3>Price &nbsp; : Rp. <?= number_format($p->price) ?></h3>
      <h3>Stock &nbsp;: <?= $p->stock.' Pcs' ?></h3>
      <span><?= $p->description ?></span>
    </div>
    <div class="img-card">
      <img src="<?= base_url().'uploads/products/'.$p->img?>">
    </div>
    <form action="user/controllerCart.php?act=store" method="post">
      <a href="<?= base_url().'home/catalogue'?>" class="btnku btn-cart">
        <i class="fas fa-arrow-left    "></i>
        <span>Back</span>
      </a>
    </form>
  </div>
</div>
<?php endforeach?>