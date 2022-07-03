
<?= $this->extend('scaffolding/back') ?>

<?= $this->section('title') ?>
Menu
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<h2 class="section-title">Menu</h2>
<p class="section-lead">
    Detail <?= $menu->name ?>
</p>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Penjualan Menu</h4>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Data Menu</h4>
            </div>
            <div class="card-body">
                <div class="container">
                    <img class="w-100 mb-3" src="<?= base_url('uploads/img/menu/'.$menu->img) ?>" alt="">
                    <h6><?= $menu->name ?></h6>
                    <p><?= "Rp " . number_format($menu->price,0,',','.'); ?> / 1 <?= $menu->unit ?></p>
                    <a class="btn btn-warning" href="<?php echo base_url('/admin/menu/edit/'.$menu->id) ?>">Edit</a>
                    <a class="btn btn-danger" href="<?php echo base_url('/admin/menu/delete/'.$menu->id) ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Bahan Yang dibutuhkan untuk menu ini</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>Nama Bahan</td>
                            <td>Jumlah butuh</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $total = 0 ?>
                        <?php foreach ($ingre as $t => $tmp): ?>
                            <tr>
                                <td><?php echo $t+1 ?></td>
                                <td><?php echo $tmp->name ?></td>
                                <td><?php echo $tmp->qty ?> / <?php echo $tmp->unit ?></td>
                            </tr>
                            <?php $total += $tmp->qty * $tmp->price ?>
                        <?php endforeach ?>
                        <tr>
                            <td colspan="2">Total Harga Bahan</td>
                            <td><?php echo "Rp " . number_format($total,0,',','.'); ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>