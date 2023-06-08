<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('css/header.css'); ?>">
    <title>Welcome to APTCODER</title>
</head>
<body>
    <header>
        <div class="menu">
            <ul>
                <li><a href="<?= base_url('user/signin') ?>">Login</a></li>
                <li><a href="<?= base_url('user/register')?>">Register</a></li>
            </ul>
        </div>
    <h1><?= esc($title) ?></h1>
    </header>
</body>
</html>