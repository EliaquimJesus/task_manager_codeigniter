<?= $this->extend('layouts/main_layouts') ?>
<?= $this->section('content') ?>

<!-- Main page -->
<section class="container mt-5">
    <di class="row">
        <div class="col">
            <!-- Search Bar -->
            <?= form_open('search') ?>
            <div class="mb-3 d-flex align-items-center">
                <label class="me-3">Pesquisar:</label>
                <input type="text" name="text_search" class="form-control w-50 me-3">
                <button class="btn btn-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <?= form_close() ?>

            <!-- Status Filter -->
        </div>

        <div class="col">
            <!--status Filter -->
            <?= form_open('filter') ?>
            <div class="d-flex mb-3 align-items-center">
                <label class="me-3">Status:</label>
                <select name="select_status" class="form-select">
                    <?php foreach (STATUS_LIST as $key => $value) : ?>
                        <option value="<?= $key ?>"><?= $value ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?= form_close() ?>
        </div>

        <div class="col text-end">
            <!-- New task button -->
            <a href="<?= site_url('new_task') ?>" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Nova
                Tarefa</a>
        </div>
    </di>
    <hr>
</section>

<!-- -->
<?php if (count($tasks) > 0) : ?>
    <section class="container mt-3">
        <div class="row">
            <div class="col">
                <h3 class="mb-5">Tarefas</h3>
                <table class="table table-striped table-bordered" id="table_tasks">
                    <thead class="table-secondary">
                        <tr>
                            <th width="70%">Tarefas</th>
                            <th width="20%" class="text-center">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tasks as $task) : ?>
                            <tr>
                                <td><?= $task->task_name ?></td>
                                <td class="text-center"><?= STATUS_LIST[$task->task_status]  ?></td>
                                <td class="text-center">
                                    <a href="<?= site_url('edit_task/' . '?id=' . $task->id) ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-edit"></i></a>
                                    <a href="<?= site_url('delete_task/' . '?id=' . $task->id) ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

<?php else : ?>
    <!-- -->
    <section class="container mt-3">
        <div class="row">
            <div class="col text-center">
                Não foram encontradas tarefas...
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (count($tasks) > 0) : ?>
    <script>
        $(document).ready(function() {

            // datatable
            $('#table_tasks').DataTable({
                language: {
                    lengthMenu: "Mostrando _MENU_ registos por página.",
                    zeroRecords: "Nenhum registro encontrado.",
                    info: "Mostrando página _PAGE_ de _PAGES_",
                    infoEmpty: "Nenhum registo disponível",
                    infoFiltered: "(filtrado de _MAX_ registos no total)",
                    search: "Pesquisar:",
                    paginate: {
                        first: "Primeira",
                        last: "Última",
                        next: "Seguinte",
                        previous: "Anterior"
                    },
                    aria: {
                        sortAscending: ": ative para classificar a coluna em ordem crescente.",
                        sortDescending: ": ative para classificar a coluna em ordem decrescente."
                    }
                }
            });
        })
    </script>
<?php endif; ?>

<?= $this->endSection() ?>