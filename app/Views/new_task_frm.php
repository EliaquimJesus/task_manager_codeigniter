<?= $this->extend('layouts/main_layouts') ?>
<?= $this->section('content') ?>

<!-- New task form with bootstrap -->
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h3>Nova Tarefa</h3>
            <hr>
            <div class="col-md-6 col-sm-12">
                <?= form_open('new_task_submit') ?>
                <div class="mb-3">
                    <label for="" class="form-label">Nome da tarefa:</label>
                    <input type="text" name="text_tarefa" class="form-control" placeholder="Nome da tarefa" required value="<?= old('text_tarefa', '') ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Descrição da tarefa:</label>
                    <textarea name="text_descricao" class="form-control" rows="3"><?= old('text_descricao', '') ?></textarea>
                </div>
                <div class="text-start">
                    <a href="<?= site_url('/') ?>" class="btn btn-primary px-5">Cancelar</a>
                    <button type="submit" class="btn btn-secondary px-5">Gravar</button>
                </div>
                <?= form_close() ?>
            </div>

        </div>
    </div>
</div>


<?= $this->endSection() ?>