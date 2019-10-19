<div class="card-headerku">
    <h3>
        <i class="fas fa-list    "></i>
        <span>Categories</span>
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
<a href="<?= base_url().'admin/category/add'?>">
    <button class="btn btn-ijo">
        <i class="fas fa-plus    "></i>
        <span>Add Data</span>
    </button>
</a>
<table class="table">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th style="width:20%;">Action</th>
    </thead>
    <tbody>
         <?php
            $no = 1;
            foreach($kumpulanKategori as $kat){
        ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $kat->name ?></td>
                <td>
                    <a href='<?= base_url().'admin/category/destroy/'.$kat->id_categories ?>' 
                    class='btn btn-abang' 
                    onclick="return confirm('Sure to delete data?')">
                        <i class='fas fa-trash'></i>
                    </a>
                    <a href='<?= base_url().'admin/category/edit/'.$kat->id_categories ?>' class='btn btn-kuning'>
                        <i class='fas fa-edit'></i>
                    </a>
                </td>
            </tr>
            <?php } ?>
    </tbody>
</table>