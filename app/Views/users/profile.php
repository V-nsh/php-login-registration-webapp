<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('css/userProfile.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/common.css'); ?>">
    <title><?= esc($title) ?></title>
</head>
<body class="container">
        <?= session()->getFlashdata('success') ?>
        <?= session()->getFlashdata('error') ?>
        <h1><?= esc($user->name) ?></h1>
        <a href="<?= esc(base_url('/')) ?>">Logout</a>
        <h3>email: <?= esc($user->email) ?></h3>
        <h3>id: <?= esc($user->id) ?></h3>
        <a href="<?= esc(base_url('user/edit')) ?>">
            <button>Edit</button>
        </a>
        <a href="<?= esc(base_url('user/delete')) ?>">
            <button>Delete</button>
        </a>
</body>
</html>
