<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sign In</title>
</head>
<body>
    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>

    <div class="col-5">
        <form action="<?= esc($baseURL) ?>user/loginAuth" method="post">
            <?= csrf_field() ?>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" value="<?= set_value('email') ?>"><br>
            </div>
            
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" value="<?= set_value('password') ?>"><br>
            </div>
    
            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-success">Login</button>
            </div>
        </form>
    </div>
</body>
</html>