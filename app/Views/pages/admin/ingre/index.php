<?= $this->extend('scaffolding/back') ?>

<?= $this->section('title') ?>
    Ingredients
<?= $this->endSection() ?>


<?= $this->section('content') ?>
    <h2 class="section-title">Ingredients</h2>
            <p class="section-lead">
              Bahan untuk menu-menu yang dijual di Tiga Tungku
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Ingredient</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Price / Unit</td>
                            <td>Stock</td>
                            <td>Action</td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($ingres as $i => $ingre) :?>
                            <tr>
                              <td><?php echo $i+1 ?></td>
                              <td><?php echo $ingre->name ?></td>
                              <td><?php echo "Rp " . number_format($ingre->price,0,',','.')." / ".$ingre->unit ?></td>
                              <td><?php echo $ingre->stock ?></td>
                              <td>
                                <a class="btn btn-info" href="<?php echo base_url('/admin/ingre/'.$ingre->id) ?>">Detail</a>
                                <a class="btn btn-warning" href="<?php echo base_url('/admin/ingre/edit/'.$ingre->id) ?>">Edit</a>
                                <a class="btn btn-danger" href="<?php echo base_url('/admin/ingre/delete/'.$ingre->id) ?>">Delete</a>
                              </td>
                            </tr>
                          <?php endforeach?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?= $this->endSection() ?>