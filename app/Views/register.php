<?php

$session = session();
$alert = $session->getFlashdata('error');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- IMPORT REUIRED FILE CSS -->
    <?php include(APPPATH  . 'Views/imports/scripts/css_backend.php') ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1"><b>Register</b></a>
            </div>
            <div class="card-body">
                <?php if (session()->has('errors')) : ?>
                    <div class="alert alert-danger font-weight-bold text-center">
                        <!-- it will show error for every field -->
                        <?php foreach (session('errors') as $error) : ?>
                            <p> <?php echo $error ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php elseif (session()->getFlashdata('error') == 'exist') : ?>
                    <div class="alert alert-danger font-weight-bold text-center">
                        <p> username telah ada!</p>
                    </div>
                <?php endif; ?>
                <p class="login-box-msg">Buat akun baru</p>
                <form action="<?php echo site_url('register/process') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="nope" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-alt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="nope" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password_confirm" autocomplete="nope" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4 ">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1 mt-2">
                    <a href="<?php echo site_url('/') ?>" class="text-center">Kembali</a>
                </p>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- reuired file js  -->
    <?php include(APPPATH  . 'Views/imports/scripts/js_backend.php') ?>
</body>

</html>