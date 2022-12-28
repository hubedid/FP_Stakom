

<?= $this->extend('_layouts/_layouts', $data_user) ?>
<?= $this->section('content') ?>

<section class="content">
    <div class="container-fluid">
        <?= $this->include('dashboard/_partials/small-box/small-box-perhitungan-dl') ?>
        <?= $this->include('dashboard/_partials/tables/table-datalatih', $data_latih) ?>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->include('dashboard/script') ?>

<?= $this->endSection() ?>