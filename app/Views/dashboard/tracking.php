

<?= $this->extend('_layouts/_layouts', $data_user) ?>
<?= $this->section('content') ?>


<section class="content">
    <div class="container-fluid">
        <?= $this->include('dashboard/_partials/temporal/tracking') ?>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->include('dashboard/script') ?>

<?= $this->endSection() ?>