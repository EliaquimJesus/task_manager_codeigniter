<?= $this->extend('layouts/main_layouts') ?>
<?= $this->section('content') ?>

<!-- Login form with bootstrap -->
<div class="d-flex align-items-center" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-6 col-10">
                <div class="card bg-light text-dark rounded-3 p-5">
                    <?= form_open('login_submit', ['novalidate' => true]) ?>
                    <h3 class="text-center">Login</h3>
                    <hr>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="text_utilizador" placeholder="Utilizador" value="<?= old('text_utilizador', '') ?>" required>
                        <!-- Error -->
                        <?= !empty($validation_errors['text_utilizador']) ? '<p class="text-danger">' . $validation_errors['text_utilizador'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="text_password" placeholder="Password" value="<?= old('text_password', '') ?>" required>
                        <!-- Error -->
                        <?= !empty($validation_errors['text_password']) ? '<p class="text-danger">' . $validation_errors['text_password'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary w-100">Entrar</button>
                    </div>
                    <?= form_close() ?>
                    <!-- <?php if (!empty($validation_errors)) : ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($validation_errors as $error) : ?>
                            <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?> -->
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>