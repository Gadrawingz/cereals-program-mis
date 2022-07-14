<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Farmer Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('public/assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/vendor/fonts/circular-std/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/libs/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/vendor/fonts/fontawesome/css/fontawesome-all.css'); ?>">
</head>

<body style="background: #bfc9ca; border-radius: 15px!important; margin-top: 80px;">
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="bg-secondary card-header text-center">
                <h2 class="p-3 bg-dark text-white">Farmer Login</h2>

                <span class="splash-description text-white">
                    Please enter your account info
                </span>
            </div>
            
            <div class="card-body">
                <form method="POST" action="<?= base_url('AuthController/checkFarmer') ?>">
                    <?= csrf_field(); ?>
                    <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('fail') ?>
                        </div>
                    <?php endif ?>

                    <?php if(!empty(session()->getFlashdata('success'))) : ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>     
                        </div>
                    <?php endif ?>

                    <div class="form-group">
                        <input class="form-control form-control-lg" id="telephone" type="text" placeholder="Telephone number" name="telephone" autocomplete="off" value="<?= set_value('telephone') ?>">
                        <div class="errorful">
                            <?= isset($validation) ? displayError($validation, 'telephone') : '' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password" placeholder="Password" name="password" value="<?= set_value('password') ?>">
                        <div class="errorful">
                            <?= isset($validation) ? displayError($validation, 'password') : '' ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="<?= site_url('farmer/register') ?>" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="<?= site_url('/') ?>" class="footer-link">Back Home</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <script src="<?= base_url('public/assets/vendor/jquery/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?= base_url('public/assets/vendor/bootstrap/js/bootstrap.bundle.js'); ?>"></script>
</body>
</html>