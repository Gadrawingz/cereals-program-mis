<?php
/**
 * @var string $page_title     
 * >> The page title (automatically created by CI from the $data array)
 * @var string $page_subtitle  
 * >> The page subtitle (automatically created by CI from the $data array)
 * @var string $page_footer  
 * >> The page subtitle (automatically created by CI from the $data array)
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
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

<body style="background: #154360; border-radius: 15px!important;">
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <center>
    <div class="col-md-6 col-lg-6 col-6">

        <div class="card">
            <div class="card-header">
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
                        Register Farmer
                    </a>
                </div>

            </div>
            
        </div>
    </div>
    </center>
</body>

 
</html>