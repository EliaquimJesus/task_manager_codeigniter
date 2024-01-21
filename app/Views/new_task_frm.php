<?= $this->extend('layouts/main_layouts') ?>
<?= $this->section('content') ?>

<!-- New task form with bootstrap -->
<div class="container mt-5">
    <div class="row justify-content-center">

            <div class="col-md-6 col-sm-12">
                <h3>Nova Tarefa</h3>    
                <hr>
                <?= form_open('new_task_submit', ['novalidate' => true]) ?>
                <div class="mb-3">
                    <label for="" class="form-label">Nome da tarefa:</label>
                    <input type="text" name="text_tarefa" class="form-control" placeholder="Nome da tarefa" required
                        value="<?= old('text_tarefa', '') ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Descrição da tarefa:</label>
                    <textarea name="text_descricao" class="form-control"
                        rows="3"><?= old('text_descricao', '') ?></textarea>
                </div>
                <hr>
                <div class="text-center">
                    <a href="<?= site_url('/') ?>" class="btn btn-primary px-5"><i class="fa-solid fa-ban me-2"></i>Cancelar</a>
                    <button type="submit" class="btn btn-secondary px-5"><i class="fa-regular fa-floppy-disk me-2"></i>Gravar</button>
                </div>
                <?= form_close() ?>
                <?php if (!empty($validation_errors)) : ?>
                <div class="alert alert-danger mt-3">
                    <?php foreach ($validation_errors as $error) : ?>
                    <?= $error ?>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

    </div>
</div>


<?= $this->endSection() ?>