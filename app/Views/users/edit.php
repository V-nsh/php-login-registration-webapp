<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('css/edit.css'); ?>">
    <title>Edit Profile</title>
</head>
<body class="container">
        <form class="edit-form" action="<?= base_url('user/editProfile') ?>" method="post">
            <?= csrf_field() ?>
            <label for="name">Name</label>
            <input type="text" name="name" value="<?= esc($name) ?>">

            <label for="email">Email</label>
            <input type="email" name="email" value="<?= esc($email) ?>">

            <label for="password">Please verify your password:</label>
            <input type="password" name="password" value="">

            <button type="submit">Save</button>
        </form>
</body>
</html>