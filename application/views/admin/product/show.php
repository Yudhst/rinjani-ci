<?php foreach($produk as $prd): ?>
    <div class="card-headerku">
        <h3>
            <i class="fas fa-campground    "></i>
            <span><?= $prd->name ?></span>
        </h3>
    </div>
    <div class="detail-container">
            <div class="img-card">
                <img src="<?= base_url().'uploads/products/'.$prd->img ?>">
            </div>
            <div class="detail-card">
                <h2>Details</h2>
                <hr>
                <h3>Price &nbsp; : Rp. <?= number_format($prd->price) ?></h3>
                <h3>Stock &nbsp;: <?= $prd->stock." Pcs" ?></h3>
                <span><?= $prd->description ?></span>
            </div>
    </div>
<?php endforeach ?>