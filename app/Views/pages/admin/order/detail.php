
<?= $this->extend('scaffolding/back') ?>

<?= $this->section('title') ?>
Transaksi
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<h2 class="section-title">Pemesanan</h2>
<p class="section-lead">
    Transaksi #<?= sprintf('%08d', $trx->id); ?>
</p>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Data Transaksi</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Nama Pemesan</td>
                        <td> : </td>
                        <td><?= $user->name ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Pengirim</td>
                        <td> : </td>
                        <td><?= $trx->address ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengiriman</td>
                        <td> : </td>
                        <td><?= date_format(date_create($trx->ship_date), 'd M Y') ?></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td> : </td>
                        <td><?= "Rp " . number_format($trx->total,0,',','.'); ?></td>
                    </tr>
                </table>
                <a class="btn btn-primary" href="<?= base_url('/admin/order/acc/'.$trx->id) ?>"> Terima Transaksi</a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Menu yang dipesan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>Nama Menu</td>
                            <td>Qty</td>
                            <td>Price</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $total = 0 ?>
                        <?php foreach ($menu as $t => $m): ?>
                            <tr>
                                <td><?php echo $t+1 ?></td>
                                <td><?php echo $m->name ?></td>
                                <td><?php echo $m->qty ?> <?php echo $m->unit ?></td>
                                <td><?= "Rp " . number_format($m->price,0,',','.'); ?></td>
                            </tr>
                            <?php $total += $m->qty * $m->price ?>
                        <?php endforeach ?>
                        <tr>
                            <td colspan="2">Total Harga</td>
                            <td colspan="2">
                                <b>
                                    <?php echo "Rp " . number_format($total,0,',','.'); ?>
                                </b>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>