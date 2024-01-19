<?= $this->extend('layouts/main_layouts') ?>
<?= $this->section('content') ?>

<!-- New task form with bootstrap -->
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h3>Editar Tarefa</h3>

            <div class="col-md-6 col-sm-12">
                <hr>
                <?= form_open('edit_task_submit', ['novalidate' => true]) ?>

                <!-- get encrypted id -->
                <div class="mb-3">
                    <input type="hidden" name="id_task" value="<?= encrypt($tasks->id) ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Nome da tarefa:</label>
                    <input type="text" name="text_tarefa" class="form-control" placeholder="Nome da tarefa" required value="<?= old('text_tarefa', $tasks->task_name) ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Descrição da tarefa:</label>
                    <textarea name="text_descricao" class="form-control" rows="3"><?= old('text_descricao', $tasks->task_description) ?></textarea>
                </div>

                <!-- update status-->
                <div class="mb-3">
                    <label class="me-3">Status:</label>
                    <select name="select_status" class="form-select w-25">
                        <?php foreach (STATUS_LIST as $key => $value) : ?>
                            <option value="<?= $key ?>" <?= check_status($key, $tasks->task_status) ?>>
                                <?= $value ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="text-center">
                    <a href="<?= site_url('/') ?>" class="btn btn-primary px-5">Cancelar</a>
                    <button type="submit" class="btn btn-secondary px-5">Gravar</button>
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
</div>


<?= $this->endSection() ?>