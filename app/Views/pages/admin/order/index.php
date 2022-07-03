
<?= $this->extend('scaffolding/back') ?>

<?= $this->section('title') ?>
    Transaksi
<?= $this->endSection() ?>


<?= $this->section('content') ?>
    <h2 class="section-title">Pemesanan</h2>
    <p class="section-lead">
        Transaksi Tiga Tungku
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Transaksi <?= $type ?></h4>
                    <div class="card-header-action">

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Customer Name</td>
                                <td>Tanggal Pesanan</td>
                                <td>Total</td>
                                <td>Ordered at</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach($transactions as $t => $trx) : ?>
                                    <tr>
                                        <td><?= $t+1 ?></td>
                                        <td><?= $trx->name ?></td>
                                        <td><?= date_format(date_create($trx->ship_date), 'd M Y') ?></td>
                                        <td><?= "Rp " . number_format($trx->total,0,',','.'); ?></td>
                                        <td><?= date_format(date_create($trx->created_at), 'd M Y H:i') ?></td>
                                        <td>
                                            <div class="badge badge-warning">Menunggu Konfirmasi</div>
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="<?php echo base_url('/admin/order/detail/'.$trx->id) ?>">Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>