<div class="card-headerku">
    <h3>
        <i class="fas fa-piggy-bank    "></i>
        <span>Success Transactions</span>
    </h3>
</div>
<table class="table">
    <thead>
        <th>#</th>
        <th>Date</th>
        <th>Username</th>
        <th>Grandtotal</th>
        <th style="width:20%;">Action</th>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($kumpulanTransaksi as $tr): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $tr->date ?></td>
                <td><?= $tr->usr ?></td>
                <td>Rp. <?= number_format($tr->grandtotal) ?></td>
                <td>
                    <a href='<?= base_url().'admin/transaction/detailsuccess/'.$tr->id_trans?>' class='btn btn-biru'>
                        <i class='fas fa-eye'></i>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>