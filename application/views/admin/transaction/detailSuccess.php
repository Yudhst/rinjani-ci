<div class="card-headerku">
    <h3>
        <i class="fas fa-user    "></i>
        <?php  foreach($user as $tr): ?>
            <span><b><?= $tr->username ?>'s Transaction at <?= $tr->date ?></b></span>
        <?php endforeach ?>
    </h3>
</div>
<div class="detail-container">
    <table class="table">
        <?php $no = 1; foreach($transaksi as $tr): ?>
            <tr>
                <td>
                    <?= $no++ ?>
                </td>
                <td>
                    <?= $tr->prdname ?>
                </td>
                <td>
                    Rp. <?= number_format($tr->subtotal) ?>
                </td>
                <td>
                    X <?= $tr->qty ?>
                </td>
                <td>
                    Rp. <?= number_format($tr->qty * $tr->subtotal) ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
<div class="cart-footer">
    <h1>
        <span style="float:left; color:#fc4700; font-size:15pt;">
            Total :
        </span>
        <span style="float:right; color:#fc4700; font-size:15pt;">
            Rp. <?= number_format($tr->grandtotal) ?>
        </span>
    </h1>
    <br><br>
    <h3>
        <i class="fas fa-map-marker-alt    "></i>
        <span><b>Shipped to :</b></span>
    </h3>
    <br>
    <?php foreach($shipment as $tr): ?>
    <p>
        <?= $tr->fullname . ' - ( '.$tr->phone.' )'?>
    </p>
    <p>
        @ <?= $tr->address ?>
    </p>
    <?php endforeach ?>
</div>