<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Farmer Registration</title>
    <!-- Bootstrap CSS -->
    <!-- Gad-Iradufasha's coding -> @gadrawingz, @donnekt -->
    <link rel="stylesheet" href="<?= base_url('public/assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/vendor/fonts/circular-std/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/libs/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/vendor/fonts/fontawesome/css/fontawesome-all.css'); ?>">
</head>

<body>
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ======================================================= -->
        <!-- navbar -->
        <!-- ======================================================= -->
         <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="#">Cereal MIS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse">
                    <center><h2 style="margin-top: 15px; margin-left: 40px; color: darkblue; font-size: 32px">Welcome to Cereal Program</h2></center>
                </div>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                    
                        <li class="nav-item dropdown connection">
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- =========================================================== -->
        <!-- end navbar -->
        <!-- =========================================================== -->
        <!-- left sidebar -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                <!-- Welcome -->
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ======================================================= -->
        <!-- end left sidebar -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- pageheader -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2 class="pageheader-title">Farmer Registration</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="<?= base_url('farmer/save') ?>">
                                    <?= csrf_field(); ?>

                                    <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                                    <div class="alert alert-danger"><?= session()->getFlashdata('fail') ?></div>
                                    <?php endif ?>

                                    <?php if(!empty(session()->getFlashdata('success'))) : ?>
                                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                                    <?php endif ?>

                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="firstname">Firstname</label>
                                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?= set_value('firstname') ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'firstname') : '' ?>
                                            </span>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="lastname">Lastname</label>
               
                                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= set_value('lastname') ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'lastname') : '' ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="province">Province</label>
                                            <select name="province" class="form-control" id="province">
                                                <?php
                                                if(set_value('province')) {
                                                ?>
                                                <option value="<?= set_value('province') ?>"><?= set_value('province') ?></option>
                                                <?php } else { ?>
                                                <option value="">Select Province</option>
                                                <?php } ?>
                
                                                <option value="East">East</option>
                                                <option value="West">West</option>
                                                <option value="North">North</option>
                                                <option value="South">South</option>
                                                <option value="Kigali City">Kigali City</option>
                                            </select>
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'province') : '' ?>
                                            </span>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="district">District</label>
               
                                            <select name="district" class="form-control" id="district">

                                                <?php
                                                if(set_value('district')) {
                                                ?>
                                                <option value="<?= set_value('district') ?>"><?= set_value('district') ?></option>
                                                <?php } else { ?>
                                                <option value="">Select District</option>
                                                <?php } ?>
                                            </select>

                                            <div class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'district') : '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mb-2">
                                            <label for="sector">Sector</label>
                                            <input type="text" class="form-control" id="sector" name="sector" value="<?= set_value('sector') ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'sector') : '' ?>
                                            </span>
                                        </div>
                                        
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mb-2">
                                            <label for="cell">Cell</label>
               
                                            <input type="text" class="form-control" id="cell" name="cell" value="<?= set_value('cell') ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'cell') : '' ?>
                                            </span>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mb-2">
                                            <label for="village">Village</label>
               
                                            <input type="text" class="form-control" id="village" name="village" value="<?= set_value('village') ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'village') : '' ?>
                                            </span>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="gender">Gender/Sex</label>
               
                                            <select name="gender" class="form-control" id="gender">
                                                <?php
                                                if(set_value('gender')) {
                                                ?>
                                                <option value="<?= set_value('gender') ?>"><?= set_value('gender') ?></option>
                                                <?php } else { ?>
                                                <option value="">Select Gender</option>
                                                <?php } ?>

                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <div class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'gender') : '' ?>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="telephone">Telephone</label>
                                            <input type="number" class="form-control" id="telephone" name="telephone" value="<?= set_value('telephone') ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'telephone') : '' ?>
                                            </span>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="password">Password</label>
               
                                            <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password') ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'password') : '' ?>
                                            </span>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="cpassword">Confirm Password</label>
               
                                            <input type="password" class="form-control" id="cpassword" name="cpassword" value="<?= set_value('cpassword') ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'cpassword') : '' ?>
                                            </span>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit" name="register">Register</button>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="<?= base_url('farmer/login'); ?>" class="btn btn-outline-success" style="float: right;">Go to Login</a>
                                </form>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end validation form -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>
                        <!-- footer -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                             Copyright © <?= date('Y'); ?> Concept. All rights reserved. by Emile Niyindora</a>.
                        </div>
                    </div>
                </div>
            </div>
            <!-- end footer -->
        </div>
        <!-- end wrapper  -->
    </div>
    <!-- end main wrapper -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="<?= base_url('public/assets/vendor/jquery/jquery-3.3.1.min.js'); ?>"></script>
    <!-- bootstap bundle js -->
    <script src="<?= base_url('public/assets/vendor/bootstrap/js/bootstrap.bundle.js'); ?>"></script>
    <!-- slimscroll js -->
    <script src="<?= base_url('public/assets/vendor/slimscroll/jquery.slimscroll.js'); ?>"></script>
    <!-- main js -->
    <script src="<?= base_url('public/assets/libs/js/main-js.js'); ?>"></script>
    <script src="<?= base_url('public/assets/libs/js/gad.mapping.js'); ?>"></script>
</body>
</html>
<!-- Gad-Iradufasha's coding -> @gadrawingz, @donnekt -->