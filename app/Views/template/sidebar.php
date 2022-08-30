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

                            <?php if(session()->has('activeUser')) { ?>
                            <li class="nav-divider bg-primary">
                                Farmer Menus
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('farmer/dashboard') ?>"><i class="fas fa-home fa-columns"></i>View Dashboard</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('cereal/apply') ?>"><i class="fas fa-leaf fa-columns"></i>Apply for cereals</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('cereal/mine') ?>"><i class="fas fa-th-list fa-columns"></i>My Cereals</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('harvest/register') ?>"><i class="fas fa-vials fa-columns"></i>Register Harvest</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('harvest/mine') ?>"><i class="fas fa-th-list fa-columns"></i>My Harvests</a>
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
                                            <a class="nav-link" href="<?= base_url('admin/all') ?>">View Active Admins</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('admin/disabled') ?>">View Blocked Admins</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('cereal/register') ?>">
                                    <i class="fas fa-plus fa-columns"></i>&nbsp;Add new cereal
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('cereal/all') ?>">
                                    <i class="fas fa-leaf fa-columns"></i>View all cereals
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#report-1" aria-controls="report-1"><i class="fas fa-th-large fa-columns"></i>General Report </a>
                                <div id="report-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">

                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                Agrodealers 
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                Farmers 
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                Cereals 
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
                            if(session()->has('activeAdmin') && session()->get('adminRole')=='Agrodealer') {
                            ?>

                            <li class="nav-divider bg-primary">Agro-dealer's  menus</li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                                    <i class="fas fa-home fa-columns"></i>View Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#sm-farmer" aria-controls="sm-farmer"><i class="fas fa-user-plus fa-columns"></i>Manage Farmers</a>
                                <div id="sm-farmer" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('farmer/active') ?>">Active Farmers</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('farmer/inactive') ?>">Inactive Farmers</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#cereals-o" aria-controls="cereals-o"><i class="fas fa-leaf fa-columns"></i>Manage Cereals</a>
                                <div id="cereals-o" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('cereal/all') ?>">
                                                Cereals List
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('cereal/requests') ?>">
                                                Cereal Requests
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#harvests" aria-controls="harvests"><i class="fas fa-vials fa-columns"></i>Manage Harvests</a>
                                <div id="harvests" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('harvest/checked') ?>">
                                                Checked Harvests
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('harvest/unchecked') ?>">
                                                Unchecked Harvests
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#mopa-api" aria-controls="mopa-api"><i class="fas fa-book fa-columns"></i>MOPA BOOK</a>
                                <div id="mopa-api" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('cereal/regions') ?>">
                                                &bull; Cereals & Regions
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('cereal/requests') ?>">
                                                &bull; Add fertilizer info
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('cereal/requests') ?>">
                                                &bull; Fertilizer's Table
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <?php } ?>


                            <li class="nav-divider bg-primary">
                                More settings
                            </li>

                            <?php if(session()->has('activeUser')) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('farmer/profile') ?>">
                                    <i class="fas fa-user-circle fa-columns"></i>View Profile
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('farmer/logout') ?>">
                                    <i class="fas fa-toggle-off fa-columns"></i>Sign Out
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
        <!-- Gad-Iradufasha's coding -> @gadrawingz, @donnekt -->
        <!-- wrapper  -->
        <div class="dashboard-wrapper">
