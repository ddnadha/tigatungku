<?= $this->extend('scaffolding/back') ?>

<?= $this->section('title') ?>
    Create Menu
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<h2 class="section-title">Tambah Menu</h2>
<div class="row">
  <div class="col-md-12">
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
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              <?php $total = 0 ?>
              <?php foreach ($tmping as $t => $tmp): ?>
                <tr>
                  <td><?php echo $t+1 ?></td>
                  <td><?php echo $tmp->name ?></td>
                  <td><?php echo $tmp->qty ?> / <?php echo $tmp->unit ?></td>
                  <td>
                    <a class="btn btn-danger" href="<?php echo base_url('/menu/delete/ing/'.$tmp->menusing_id) ?>">
                      <i class="fas fa-trash"></i> Delete
                    </a>
                  </td>
                </tr>
                <?php $total += $tmp->qty * $tmp->price ?>
              <?php endforeach ?>
              <tr>
                <td colspan="2">Total Harga Bahan</td>
                <td><?php echo $total ?></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h4>Data Menu</h4>
      </div>
      <div class="card-body">
        <p class="text-danger">Jika Sudah mengisi bahan yang diperlukan silahkan mengisi data menu dibawah ini</p>
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Nama Menu</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="form-group">
            <label>Satuan Penjualan (cont: Pack, Pcs)</label>
            <input type="text" class="form-control" name="unit" required>
          </div>
          <div class="form-group">
            <label>Harga Jual</label>
            <input type="number" name="price" class="form-control">
          </div>
          <div class="form-group">
            <label>Deskripsi Menu</label>
            <textarea style="min-height: 100px;" class="form-control" rows="4" name="description"></textarea>
          </div>
          <div class="form-group">
            <label>Foto Menu</label>
            <input type="file" name="img" class="form-control-file">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h4>Data Bahan</h4>
      </div>
      <div class="card-body">
        <form method="post" action="<?php echo base_url('/menu/create/ing') ?>">
          <div class="form-group">
            <div class="d-block">
              <label for="name" class="control-label">Nama Bahan</label>
              <div class="float-right">
                <a href="auth-forgot-password.html" class="text-small">
                  Tidak menenemukan bahan yang diinginkan?
                </a>
              </div>
            </div>
            <!-- <input type="text" class="form-control" name="bahan_name" required> -->
            <select id="nama-bahan" name="bahan" class="form-control select2">
              <?php foreach ($ing as $i): ?>
                <option value="<?php echo $i->id ?>" data-unit="<?php echo $i->unit ?>"><?php echo $i->name ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label>Satuan Bahan</label>
            <input id="unit-bahan" type="text" class="form-control" name="unit" readonly>
          </div>
          <div class="form-group">
            <label>Jumlah Butuh</label>
            <input min="1" type="number" class="form-control" name="butuh" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?php echo $this->section('script') ?>
<script type="text/javascript">
  $('#nama-bahan').on('select2:select', function(){
    $('#unit-bahan').val($(this).find(':selected').attr('data-unit'));
  })
</script>
<?php echo $this->endSection() ?>