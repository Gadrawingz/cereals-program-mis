<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('public/assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <link href="<?= base_url('public/assets/vendor/fonts/circular-std/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/libs/css/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/vendor/fonts/fontawesome/css/fontawesome-all.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/vendor/charts/chartist-bundle/chartist.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/public/assets/vendor/charts/morris-bundle/morris.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/vendor/charts/c3charts/c3.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/vendor/fonts/flag-icon-css/flag-icon.min.css'); ?>" rel="stylesheet">

    <title><?= esc($page_title) ?></title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="#">Cereal MIS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                        
                        
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('public/assets/images/avatar-1.jpg'); ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">
                                        <?php 
                                        if(session()->has('activeFarmer')) {
                                            echo $userData['firstname']." ".$userData['lastname'];
                                        } if(session()->has('activeAdmin')) {
                                            echo $adminData['firstname']." ".$adminData['lastname'];
                                        }
                                        ?>
                                    </h5>
                                    <?php 
                                    if(session()->has('activeFarmer')) {
                                        echo '<span class="status"></span><span style="font-size: 11px; color: #d5f5e3;">Active now</span>';
                                    } if(session()->has('activeAdmin')) {
                                        echo "(".$adminData['admin_role'].")";
                                    }
                                    ?>
                                </div>

                                <?php if(session()->has('activeFarmer')) { ?>
                                <a class="dropdown-item" href="<?= base_url('farmer/profile') ?>"><i class="fas fa-user mr-2"></i>View Profile</a>
                                
                                <a class="dropdown-item" href="<?= base_url('farmer/logout') ?>"><i class="fas fa-power-off mr-2"></i>Logout</a>

                                <?php } if(session()->has('activeAdmin')) { ?>
                                <a class="dropdown-item" href="<?= base_url('admin/profile') ?>"><i class="fas fa-user mr-2"></i>View Profile</a>
                                
                                <a class="dropdown-item" href="<?= base_url('admin/logout') ?>"><i class="fas fa-power-off mr-2"></i>Logout</a>
                                <?php } ?>

                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end navbar -->