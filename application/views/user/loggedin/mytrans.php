<div class="cardku" style="margin-top:2%; width:80%; margin-left:10%;">
    <div class="card-headerku">
        <h2>
            <i class="fas fa-money-check-alt    "></i>
            <?php foreach($user as $u): ?>
            <span><?= $u->fullname ?>'s Transaction History</span>
            <?php endforeach ?>
        </h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Transactions Date</th>
                <th>Grandtotal</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php foreach($kumpulanTransaksi as $tr): ?>
            <tr>
                <td>
                    <?= date('d F Y', strtotime($tr->date)) ?>
                </td>
                <td>
                    Rp. <?= number_format($tr->grandtotal) ?>
                </td>
                <td>
                    <?php
                    if ($tr->status == 1) {
                        echo "Waiting for payment";
                    } else if ($tr->status == 0) {
                        echo "Shipped :)";
                    } else {
                        echo "Wait for confirm";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($tr->status != 1) {
                        echo "none";
                    } else {
                        ?>
                        <a href="<?= base_url().'user/home/receipt' ?>" class="btn btn-info">
                            <i class="fas fa-money-bill-wave-alt    "></i>
                            <span>Upload Receipt</span>
                        </a>
                    <?php } ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>