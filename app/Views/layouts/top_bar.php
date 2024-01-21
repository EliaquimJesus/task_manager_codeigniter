<header class="contaiber-fluid">
    <div class="row align-items-center bg-secondary text-white">
        <div class="col mx-5">
            <h4><a href="<?= site_url('/') ?>" style="text-decoration: none;"><?= APP_NAME ?></a></h4>
        </div>
        <div class="col p-4 text-end">
            <i class="fa-regular fa-user me-2"></i></i><?= session()->utilizador ?>
            <span class="opacity-50 mx-3">|</span>
            <a href="<?= site_url('logout') ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-right-from-bracket me-2"></i>Sair</a>
        </div>
    </div>
</header>