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
            <a href="<?= site_url('new') ?>" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Nova
                Tarefa</a>
        </div>
    </di>
</section>

<!-- -->
<section class="container mt-3">
    <div class="row">
        <div class="col">
            <h3>Tarefas</h3>
        </div>
    </div>
</section>

<!-- -->
<section class="container mt-3">
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tarefas</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>A</td>
                        <td>B</td>
                        <td>C</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- -->
<section class="container mt-3">
    <div class="row">
        <div class="col text-center">
            Não foram encontradas tarefas...
        </div>
    </div>
</section>

<?= $this->endSection() ?>