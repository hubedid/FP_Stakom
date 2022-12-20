

<?= $this->extend('_layouts/_layouts', $data_user) ?>
<?= $this->section('content') ?>

<?= $this->include('dashboard/_partials/breadcrumb/breadcrumb', $data_user) ?>

<section class="content">
    <div class="container-fluid">
        <?= $this->include('dashboard/_partials/small-box/small-box-daily', $data_user) ?>
        <div class="row">

            <section class="col-lg-6 connectedSortable">
                <?= $this->include('dashboard/_partials/chart-tabs/chart-tabs') ?>
            </section>

            <section class="col-lg-6 connectedSortable">
            <?= $this->include('dashboard/_partials/chart-tabs/chart-tabs-daily') ?>
            </section>

        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->include('dashboard/script') ?>

<?= $this->endSection() ?>