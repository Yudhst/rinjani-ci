<div class="card-headerku">
    <h3>
        <i class="fas fa-user    "></i>
        <span>Pending Users</span>
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
<table class="table">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Role</th>
        <th style="width:20%;">Action</th>
    </thead>
    <tbody>
    <?php 
            $no = 1;
            foreach($kumpulanUser as $usr){
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $usr->fullname ?></td>
                <td><?= $usr->email ?></td>
                <td><?= $usr->username ?></td>
                <td><?= $usr->role ?></td>
                <td>
                    <a href='<?= base_url().'admin/user/activate/'.$usr->id_user ?>' class='btn btn-info' onclick='return confirm("Activate this user?")'>
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            <?php }?>
    </tbody>
</table>