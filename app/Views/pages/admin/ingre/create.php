<?= $this->extend('scaffolding/back') ?>

<?= $this->section('title') ?>
    Create Ingredient
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h4>Data Ingredient</h4>
      </div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <label>Nama Ingredients</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="form-group">
            <label>Satuan Penjualan (cont: Pack, Pcs)</label>
            <input type="text" class="form-control" name="unit" required>
          </div>
          <div class="form-group">
            <label>Harga Beli</label>
            <input name="price" min="1" type="number" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Jumlah Stok</label>
            <input type="number" name="stock" min="1" class="form-control" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>