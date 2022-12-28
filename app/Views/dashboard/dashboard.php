

<?= $this->extend('_layouts/_layouts', $data_user) ?>
<?= $this->section('content') ?>

<?= $this->include('dashboard/_partials/breadcrumb/breadcrumb', $data_user) ?>

<section class="content">
    <div class="container-fluid">
        <?= $this->include('dashboard/_partials/small-box/small-box') ?>
        <div class="row">

            <section class="col-lg-6 connectedSortable">
            <?= $this->include('dashboard/_partials/tables/table-datalatih', $data_latih) ?>
            </section>

            <section class="col-lg-6 connectedSortable">
            <?= $this->include('dashboard/_partials/tables/table-datauji', $data_uji) ?>
            </section>

        </div>
        <?= $this->include('dashboard/_partials/tables/table-perhitungan-latih', $data_latih) ?>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->include('dashboard/script') ?>

<?= $this->endSection() ?>