<?= $this->extend('layouts/main_layouts') ?>
<?= $this->section('content') ?>

<!-- New task form with bootstrap -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-8">

            <h4 class="text-warning">Pretende Eliminar a tarefa?</h3>
            <hr>

                <div class="mb-4">
                    <p class="opacity-50">Nome da tarefa:</p>
                    <h4 class="text-white"><?= $tasks->task_name ?></h4>
                </div>

                <div class="mb-4">
                    <p class="opacity-50">Decrição:</p>
                    <h4 class="text-white"><?= $tasks->task_description ?></h4>
                </div>

                <div class="mb-4">
                    <p class="opacity-50">Status:</p>
                    <h4 class="text-white"><?= STATUS_LIST[$tasks->task_status] ?></h4>
                </div>
                
                <div class="text-center">
                    <a href="<?= site_url('/') ?>" class="btn btn-primary"><i class="fa-solid fa-ban me-2"></i>Cancelar</a>
                    <a href="<?= site_url('/delete_task_confirm/') . encrypt($tasks->id) ?>"  class="btn btn-secondary"><i class="fa-solid fa-trash-can me-2"></i>Eliminar</a>
                </div>    
        </div>
    </div>
</div>


<?= $this->endSection() ?>