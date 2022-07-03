
<?= $this->extend('scaffolding/back') ?>

<?= $this->section('title') ?>
Menu
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<h2 class="section-title">Menu</h2>
<p class="section-lead">
    Detail <?= $ingre->name ?>
</p>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Harga Bahan</h4>
            </div>
            <div class="card-body ">
                <canvas style="max-width: 750px; max-height: 500px; margin-left: auto; margin-right: auto" id="myChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Data Bahan</h4>
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="table">
                        <tr>
                            <td>Nama Bahan</td>
                            <td> : </td>
                            <td><?= $ingre->name ?></td>
                        </tr>
                        <tr>
                            <td>Harga Bahan</td>
                            <td> : </td>
                            <td><?= "Rp " . number_format($ingre->price,0,',','.'); ?> / <?= $ingre->unit ?></td>
                        </tr>
                        <tr>
                            <td>Stock Bahan</td>
                            <td> : </td>
                            <td><?= $ingre->stock. ' ' .$ingre->unit ?></td>
                        </tr>
                    </table>
                    <a class="btn btn-warning" href="<?php echo base_url('/admin/menu/edit/'.$ingre->id) ?>">Edit</a>
                    <a class="btn btn-danger" href="<?php echo base_url('/admin/menu/delete/'.$ingre->id) ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Riwayat Restock Bahan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped dataTabled">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Tanggal Pembelian</td>
                                <td>Stock</td>
                                <td>Harga</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($history as $h => $item) : ?>
                            <tr>
                                <td><?= $h+1 ?></td>
                                <td><?= date_format(date_create($item->buy_date), 'd F Y') ?></td>
                                <td><?= $item->qty.' '.$ingre->unit ?></td>
                                <td><?= "Rp " . number_format($item->price,0,',','.'); ?></td>
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

<?= $this->section('script') ?>
<script>
    var myChart = new Chart(document.getElementById("myChart").getContext('2d'), {
        type: 'line',
        data: {
            labels: [
                <?php foreach ($history as $h) : ?>
                 "<?= date_format(date_create($h->buy_date), 'd F Y') ?>",
                <?php endforeach ?>
            ],
            datasets: [{
                label: 'Harga',
                data: [
                    <?php foreach ($history as $h) : ?>
                    "<?= $h->price ?>",
                    <?php endforeach ?>
                ],
                borderWidth: 2,
                // backgroundColor: '#6777ef',
                borderColor: '#6777ef',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        drawBorder: false,
                        color: '#f2f2f2',
                    },
                    ticks: {
                        // beginAtZero: true,
                        stepSize: 2000
                    }
                }],
                xAxes: [{
                    ticks: {
                        display: false
                    },
                    gridLines: {
                        display: false
                    }
                }]
            },
        }
    });
</script>
<?= $this->endSection() ?>

