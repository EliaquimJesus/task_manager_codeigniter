<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/bootstrap.min.css')?>">

    <!-- Font Awsome -->
    <link rel="stylesheet" href="<?= base_url('assets/fontawsome/css/all.min.css')?>">
</head>
<body>
    
    <!-- render section -->
    <?= $this->renderSection('content') ?>

    <!-- Bootstrap Js -->
    <script src="<?= base_url('assets/bootstrap/bootstrap.bundle.min.js')?>"></script>

</body>
</html>
