<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/bootstrap.min.css') ?>">

    <!-- Font Awsome -->
    <!--<link rel="stylesheet" href="<?= base_url('assets/fontawsome/css/all.min.css') ?>">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Datatables -->
    <?php if (!empty($datatables)) : ?>
        <link rel="stylesheet" href="<?= base_url('assets/datatables/datatables.min.css') ?>">
        <script src="<?= base_url('assets/datatables/jQuery-3.7.0/jquery-3.7.0.js') ?>"></script>
    <?php endif; ?>
</head>

<body>

    <!-- render top bar when logged in -->
    <?php if (session()->has('id')) : ?>
        <?= $this->include('layouts/top_bar.php') ?>
    <?php endif; ?>

    <!-- render section -->
    <?= $this->renderSection('content') ?>

    <!-- Bootstrap Js -->
    <script src="<?= base_url('assets/bootstrap/bootstrap.bundle.min.js') ?>"></script>

    <!-- Datatables -->
    <?php if (!empty($datatables)) : ?>
        <script src="<?= base_url('assets/datatables/datatables.min.js') ?>"></script>
    <?php endif; ?>

</body>

</html>