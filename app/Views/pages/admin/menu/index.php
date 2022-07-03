<?= $this->extend('scaffolding/back') ?>

<?= $this->section('title') ?>
    Menu
<?= $this->endSection() ?>


<?= $this->section('content') ?>
    <h2 class="section-title">Menu</h2>
            <p class="section-lead">
              Menu-menu yang dijual di Tiga Tungku
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Menu</h4>
                    <div class="card-header-action">
                      <a href="<?php echo base_url('/admin/menu/create') ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Create Menu
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Price / Unit</td>
                            <td>Terjual</td>
                            <td>Action</td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($menus as $m => $menu) :?>
                            <tr>
                              <td><?php echo $m+1 ?></td>
                              <td><?php echo $menu->name ?></td>
                              <td><?php echo "Rp " . number_format($menu->price,0,',','.')." / ".$menu->unit ?></td>
                              <td><?= $menu->sold.' '.$menu->unit ?></td>
                              <td>
                                <a class="btn btn-info" href="<?php echo base_url('/admin/menu/'.$menu->id) ?>">Detail</a>
                                <a class="btn btn-warning" href="<?php echo base_url('/admin/menu/edit/'.$menu->id) ?>">Edit</a>
                                <a class="btn btn-danger" href="<?php echo base_url('/admin/menu/delete/'.$menu->id) ?>">Delete</a>
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