<?= $this->extend('scaffolding/back') ?>

<?= $this->section('title') ?>
    Update Ingredient 
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2 class="section-title">Restock Ingredient</h2>
<p class="section-lead">
  Isi form ini jika anda telah melakukan restock
</p>
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h4>Data Bahan</h4>
      </div>
      <div class="card-body">
        <form method="post">
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
            <label>Jumlah Pembelian</label>
            <input type="number" class="form-control" name="stock" required min="1">
          </div>
          <div class="form-group">
            <label>Harga Beli</label>
            <input min="1" type="number" class="form-control" name="price" required>
          </div>
          <div class="form-group">
            <label>Tanggal Pembelian</label>
            <input type="text" name="date" class="form-control" value="<?php echo date('d M Y') ?>" required>
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
<script>
$(function() {
  $('input[name="date"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: <?php echo date('Y') ?>,
    maxYear: parseInt(moment().format('YYYY'),10),
    locale: {
      format: 'DD MMM YYYY'
    }
  }, function(start, end, label) {
    
  });
});
</script>
<?php echo $this->endSection() ?>