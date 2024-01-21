<?= $this->extend('layouts/main_layouts') ?>
<?= $this->section('content') ?>

<!-- New task form with bootstrap -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col card p-5">
            <div class="mb-4">
                <h4 class="text-info"><?= $tasks->task_name ?></h4>
            </div>
            <hr>
            <div class="mb-4">
                <p class="opacity-50">Descrição:</p>
                <h4><?= $tasks->task_description ?></h4>
            </div>
            <div class="mb-4">
                <p class="opacity-50">Status:</p>
                <h4><?= STATUS_LIST[$tasks->task_status] ?></h4>
            </div>
            <hr>
            <div class="text-center">
                <a href="<?= site_url('/')?>" class="btn btn-primary px-5"><i class="fa-solid fa-backward me-2"></i>Voltar</a>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>