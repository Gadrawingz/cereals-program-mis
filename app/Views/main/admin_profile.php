
            <div class="influence-profile">
                <div class="container-fluid dashboard-content">
                    <!-- pageheader -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2"><?= esc($page_title) ?></h3>
                            </div>
                        </div>
                    </div>
                    <!-- end pageheader -->
                    <!-- content -->
                    <div class="row">
                        <!-- All data -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="influence-profile-content pills-regular">
                                <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true">Basic Info</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="user-address-tab" data-toggle="pill" href="#user-address" role="tab" aria-controls="user-address" aria-selected="false">User Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="edit-profile-tab" data-toggle="pill" href="#edit-profile" role="tab" aria-controls="edit-profile" aria-selected="false">Edit Profile</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                        
                                        <div class="section-block">
                                            <h3 class="section-title">Basic information</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="media influencer-profile-data d-flex align-items-center p-2">
                                                            
                                                            <div class="media-body ">
                                                                <div class="influencer-profile-data">
                                                                
                                                                    <p>
                                                                        <span class="m-r-20 d-inline-block">Registered since <span class="m-l-10  text-primary"><?= $adminData['created_at'] ?></span>
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-top card-footer p-0">
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">Firstname</h4>
                                                    <p><?= $adminData['firstname'] ?></p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">Lastname</h4>
                                                    <p><?= $adminData['lastname'] ?></p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">Telephone</h4>
                                                    <p><?= $adminData['telephone'] ?></p>
                                                </div>
                                                <div class="campaign-metrics d-xl-inline-block">
                                                    <h4 class="mb-0">Gender</h4>
                                                    <p><?= $adminData['gender'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        



                                    <div class="tab-pane fade" id="user-address" role="tabpanel" aria-labelledby="user-address-tab">
                                        <div class="section-block">
                                            <h3 class="section-title">Full Address</h3>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="mb-1">Province/District</h4>
                                                        <p><?= $adminData['province'] ?> / <?= $adminData['district'] ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h3 class="mb-1">Sector</h3>
                                                        <p><?= $adminData['sector'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h3 class="mb-1">Cell</h3>
                                                        <p><?= $adminData['cell'] ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h3 class="mb-1">Village</h3>
                                                        <p><?= $adminData['village'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                                        <div class="card">
                                            <h3 class="card-header text-center">Change Password</h3>
                                            <div class="card-body">
                                                <form method="POST" action="<?= site_url('admin/change-pass') ?>" autocomplete="off">
                                                    <?= csrf_field(); ?>
                                                    <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                                                    <div class="alert alert-danger col-xl-6 offset-xl-3 text-center"><?= session()->getFlashdata('fail') ?></div>
                                                    <?php endif ?>
                                                    <?php if(!empty(session()->getFlashdata('success'))) : ?>
                                                    <div class="alert alert-success col-xl-6 offset-xl-3 text-center"><?= session()->getFlashdata('success') ?></div>
                                                    <?php endif ?>

                                                    <div class="row">
                                                        <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                                            <div class="form-group">
                                                                <label for="current">Current Password</label>
                                                                <input type="text" class="form-control form-control-md" id="current" name="current" value="<?= set_value('current') ?>">
                                                                <span class="errorful">
                                                                    <?= isset($validation) ? displayError($validation, 'current') : '' ?>
                                                                </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password">New Password</label>
                                                                <input type="password" class="form-control form-control-md" id="password" name="password" value="<?= set_value('password') ?>">
                                                                <span class="errorful">
                                                                    <?= isset($validation) ? displayError($validation, 'password') : '' ?>
                                                                </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cpassword">Confirm Password</label>
                                                                <input type="password" class="form-control form-control-md" id="cpassword" name="cpassword" value="<?= set_value('cpassword') ?>">
                                                                <span class="errorful">
                                                                    <?= isset($validation) ? displayError($validation, 'cpassword') : '' ?>
                                                                </span>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary float-right">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end campaign tab one -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end campaign data -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>