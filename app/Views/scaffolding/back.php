<?= $this->include('partials/header') ?>
<?= $this->include('partials/navbar') ?>
<?= $this->include('partials/sidebar') ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1><?= $this->renderSection('title') ?></h1>
        </div>

        <div class="section-body">
            <?= $this->renderSection('content') ?>
        </div>
    </section>
</div>

<?= $this->include('partials/footer') ?>
<?= $this->include('partials/script') ?>