<?= $this->extend('layouts/main_layouts') ?>
<?= $this->section('content') ?>

<!-- Main page -->
<section class="container mt-5">
    <di class="row ">
        <div class="col">
            <!-- Search Bar -->
            <div class="mb-3 d-flex align-items-center">
                <label class="me-3">Pesquisar:</label>
                <input type="text" name="text_search" class="form-control w-50 me-3">
                <button class="btn btn-secondary " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>

            <!-- Status Filter -->
        </div>

        <div class="col">
            <!--status Filter -->
            <div class="d-flex mb-3 align-items-center">
                <label class="me-3">Status:</label>
                <select name="select_status" class="form-select">
                    <?php foreach (STATUS_LIST as $key => $value) : ?>
                    <option value="<?= $key ?>" <?= check_status($key, !empty(@$status) ? @$status : '') ?>>
                        <?= $value ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
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
                        <td><a href="<?= site_url('task_details/' . encrypt($task->id)) ?>" style="text-decoration: none;"><?= $task->task_name ?></a><br>
                            <small class="opacity-25"><?= $task->task_description ?></small>
                        </td>
                        <td class="text-center"><?= STATUS_LIST[$task->task_status]  ?></td>
                        <td class="text-center">
                            <a href="<?= site_url('edit_task/' . encrypt($task->id)) ?>"
                                class="btn btn-primary btn-sm"><i class="fa-solid fa-edit"></i></a>
                            <a href="<?= site_url('delete_task/' . encrypt($task->id)) ?>"
                                class="btn btn-primary btn-sm"><i class="fa-solid fa-trash"></i></a>
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

<!-- Modal to delete task -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- END Modal to delete task -->


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

// filter change
document.querySelector('select[name="select_status"]').addEventListener('change', (e) => {
    let status = e.target.value;
    window.location.href = `<?= site_url('filter') ?>/${status}`;
})
</script>


<?= $this->endSection() ?>