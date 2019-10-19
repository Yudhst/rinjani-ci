<div class="card-headerku">
    <h3>
        <i class="fas fa-user    "></i>
        <?php foreach($user as $usr): ?>
        <span>
            <b><?= $usr->username ?>'s Transaction at <?=$usr->date ?></b>
        </span>
        <?php endforeach ?>
    </h3>
</div>

<div class="detail-container">
    <table class="table">
        <tr>
            <thead>
                <th>Recipent</th>
                <th>Address</th>
                <th>Receipt Image</th>
            </thead>
        </tr>
<?php $no = 1; foreach($transaksi as $tr): ?>
            <tr>
                <td style="padding:5%">
                    <?= $tr->fullname ?> - <?= '( '.$tr->phone.' )'?>
                </td>
                <td style="padding:5%">
                    <?= $tr->address ?>
                </td>
                <td>
                    <img src="<?= base_url().'uploads/receipt/'.$tr->receipt ?>" alt="receipt">
                </td>
            </tr>
    </table>
</div>
<div class="cart-footer">
<?php echo form_open('admin/transaction/confirm/'.$tr->id_trans) ?>
    <form action="" method="post">
        <button type="submit" class="btn btn-biru">
            <i class="fas fa-check    "></i>
            <span>Confirm Order</span>
        </button>
    </form>
<?php form_close() ?>
</div>
<?php endforeach ?>