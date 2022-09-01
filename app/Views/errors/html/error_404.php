
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>404 Page Not Found</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('public/assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <link href="<?= base_url('public/assets/vendor/fonts/circular-std/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/libs/css/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/vendor/fonts/fontawesome/css/fontawesome-all.css'); ?>" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper p-0">
        <!-- wrapper  -->
        <div class="bg-light text-center mt-5">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="error-section">
                            <img src="../assets/images/error-img.png" alt="" class="img-fluid">
                            <div class="error-section-content">
                                <h1 class="display-3">Page Not Found</h1>
                                <p>
                                	<?php if (! empty($message) && $message !== '(null)') : ?>
                                		<?= nl2br(esc($message)) ?>
                                	<?php else : ?>
                                		Sorry! Cannot seem to find the page you were looking for.
                                	<?php endif ?>
                                </p>
                                <a href="<?= base_url('/') ?>" class="btn btn-secondary btn-lg">Back to homepage</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer -->
            <div class="bg-white p-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-dark text-center">
                            Copyright © <?php echo date('Y') ?>. All rights reserved
                        </div>
                    </div>
                </div>
            </div>
            <!-- end footer -->
            <!-- end wrapper -->
            <!-- end footer -->
        </div>
    </div>
    <!-- end main wrapper -->
    <!-- end main wrapper -->
    <!-- Optional JavaScript -->
    <script src="<?= base_url('public/assets/vendor/jquery/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?= base_url('public/assets/vendor/bootstrap/js/bootstrap.bundle.js'); ?>"></script>
    <script src="<?= base_url('public/assets/vendor/slimscroll/jquery.slimscroll.js'); ?>"></script>
    <script src="<?= base_url('public/assets/libs/js/main-js.js'); ?>"></script>

</body>
 
</html>