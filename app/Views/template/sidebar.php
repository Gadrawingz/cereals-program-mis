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

                            <?php if(session()->has('activeFarmer')) { ?>
                            <li class="nav-divider bg-primary">
                                Farmer Menus
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('farmer/dashboard') ?>">View Dashboard</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="">Request for Cereal</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Manage My Cereals</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Report Harvest</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Manage All Harvests</a>
                            </li>

                            <?php } 
                            if(session()->has('activeAdmin') && session()->get('adminRole')=='Admin') {
                            ?>
                            <li class="nav-divider bg-primary">
                                <?php echo session()->get('adminRole') ?> Menus
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                                    <i class="fas fa-home fa-columns"></i>View Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-columns"></i>Manage Admins</a>
                                <div id="submenu-6" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('admin/register') ?>">Register new
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('admin/all') ?>">View All</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('admin/disabled') ?>">View Disabled</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-address-book fa-columns"></i>&nbsp;Add new cereal
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-sun fa-columns"></i>&nbsp;Manage all cereals
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-th-list fa-columns"></i>Cereal Report
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-th-list fa-columns"></i>General Report </a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                Farmers 
                                            </a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                Agronomists 
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                Harvests
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <?php } 
                            if(session()->has('activeAdmin') && session()->get('adminRole')=='Agronomist') {
                            ?>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-user-plus fa-columns"></i>Farmer Requests</a>
                                <div id="submenu-7" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                Account Requests
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                Cereal Requests
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-vials fa-columns"></i>Received Harvests
                                </a>
                            </li>

                            <?php } ?>


                



                            <li class="nav-divider bg-primary">
                                More settings
                            </li>

                            <?php if(session()->has('activeFarmer')) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('farmer/profile') ?>">
                                    <i class="fas fa-user-circle fa-columns"></i>View Profile
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('farmer/logout') ?>">
                                    <i class="fas fa-user-circle fa-columns"></i>Sign Out
                                </a>
                            </li>
                            <?php } if(session()->has('activeAdmin')) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin/profile') ?>">
                                    <i class="fas fa-user-circle fa-columns"></i>View Profile
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin/logout') ?>">
                                    <i class="fas fa-toggle-off fa-columns"></i>Sign Out
                                </a>
                            </li>
                            <?php } ?>

                        

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- end left sidebar -->

        <!-- wrapper  -->
        <div class="dashboard-wrapper">