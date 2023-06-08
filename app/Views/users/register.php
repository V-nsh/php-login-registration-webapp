<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('css/register.css'); ?>">
    <title>Register</title>
</head>
<body>
    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>

    <div class="container">
        <form action="/user/register" method="post">
            <?= csrf_field() ?>
    
            <label for="name">Name</label>
            <input type="text" name="name" value="<?= set_value('name') ?>"><br>
    
            <label for="email">Email</label>
            <input type="email" name="email" value="<?= set_value('email') ?>"><br>
    
            <label for="password">Password</label>
            <input type="password" name="password" value="<?= set_value('password') ?>"><br>
    
            <label for="password_confirm">Confirm Password</label>
            <input type="password" name="password_confirm" value="<?= set_value('password_confirm') ?>"><br>
    
            <button type="submit" name="submit">Register</button>
        </form>
    </div>
</body>
</html>