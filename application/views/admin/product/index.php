<div class="card-headerku">
    <h3>
        <i class="fas fa-campground    "></i>
        <span>Products</span>
    </h3>
</div>
<?php if($this->session->flashdata('delete') == TRUE):?>
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $this->session->flashdata('delete');?>
    </div>
<?php endif; ?>
<?php if($this->session->flashdata('add') == TRUE): ?>
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $this->session->flashdata('add');?>
    </div>
<?php endif; ?>
<a href="<?= base_url().'admin/product/add'?>">
    <button class="btn btn-ijo">
        <i class="fas fa-plus    "></i>
        <span>Add Data</span>
    </button>
</a>
<table class="table">
    <thead>
    <th>#</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Image</th>
        <th style="width:20%;">Action</th>
    </thead>
    <tbody>
    <?php 
            $no = 1;
            foreach($kumpulanProduk as $prd){
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $prd->name ?></td>
                <td><?= $prd->kat ?></td>
                <td>Rp. <?= number_format($prd->price) ?></td>
                <td><img src="<?= base_url().'uploads/products/'.$prd->img ?>" alt="product-img"></td>
                <td>
                    <a href='<?= base_url().'admin/product/destroy/'.$prd->id_products ?>' 
                    class='btn btn-abang' 
                    onclick="return confirm('Sure to delete data?')">
                        <i class='fas fa-trash'></i>
                    </a>
                    <a href='<?= base_url().'admin/product/edit/'.$prd->id_products ?>' class='btn btn-kuning'>
                        <i class='fas fa-edit'></i>
                    </a>
                    <a href='<?= base_url().'admin/product/show/'.$prd->id_products ?>' class='btn btn-biru'>
                        <i class='fas fa-eye'></i>
                    </a>
                </td>
            </tr>
            <?php }?>
    </tbody>
</table>