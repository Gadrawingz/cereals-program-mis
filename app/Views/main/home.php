<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <!-- Gad-Iradufasha's coding -> @gadrawingz, @donnekt -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= esc($page_title) ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('public/assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/vendor/fonts/circular-std/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/libs/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/vendor/fonts/fontawesome/css/fontawesome-all.css'); ?>">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body style="background-image: url('public/assets/images/main.jpg'); border-radius: 15px!important;">
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <center>
    <div class="col-md-6 col-lg-6 col-6">

        <div class="card" style="background: #fef9e7!important; border-radius: 50px!important;">
            <div class="card-header bg-danger-light txt-white" style="color: black!important; border-bottom: 4px solid #000;">
                <h1 class="mb-1"><?= esc($page_title) ?></h1>
            </div>

            <div class="card-body">
                <p class="lead">
                    <?= esc($page_content) ?> 
                </p>
                
                <div class="card-body border-top">
                    <!-- <h4>Outline Buttons</h4> -->
                    <a href="<?= site_url('admin/login') ?>" class="btn btn-lg btn-outline-primary">
                        Admin Login
                    </a>
                    <a href="<?= site_url('farmer/login') ?>" class="btn btn-lg btn-dark">
                        Farmer Login
                    </a>
                    <a href="<?= site_url('farmer/register') ?>" class="btn btn-lg btn-outline-secondary">
                        Farmer Signup
                    </a>
                </div>

            </div>
            
        </div>
    </div>
    </center>
</body>

 
</html>