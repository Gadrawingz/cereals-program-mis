
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- pageheader  -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title"><?= esc($page_title) ?> </h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">
                                                <?= esc($breadcrumb) ?>
                                            </a></li>
                                            <li class="breadcrumb-item active" aria-current="page">
                                                <?= esc($page_title) ?>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end pageheader  -->
                    <div class="ecommerce-widget">
                        
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="<?= base_url('AdminController/update') ?>">
                                    <?= csrf_field(); ?>

                                    <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                                    <div class="alert alert-danger"><?= session()->getFlashdata('fail') ?></div>
                                    <?php endif ?>

                                    <?php if(!empty(session()->getFlashdata('success'))) : ?>
                                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                                    <?php endif ?>

                                    <div class="form-row">
                                        <input type="hidden" class="form-control" id="admin_id" name="admin_id" value="<?php echo $admin['admin_id'] ?>">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="firstname">Firstname</label>
                                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $admin['firstname'] ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'firstname') : '' ?>
                                            </span>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="lastname">Lastname</label>
               
                                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $admin['lastname'] ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'lastname') : '' ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="province">Province</label>
                                            <select name="province" class="form-control" id="province">
                                                <option value="<?php echo $admin['province'] ?>"><?php echo $admin['province'] ?></option>
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
                                                <option value="<?php echo $admin['district'] ?>"><?php echo $admin['district'] ?></option>
                                            </select>
                                            <div class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'district') : '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mb-2">
                                            <label for="sector">Sector</label>
                                            <input type="text" class="form-control" id="sector" name="sector" value="<?php echo $admin['sector'] ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'sector') : '' ?>
                                            </span>
                                        </div>
                                        
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mb-2">
                                            <label for="cell">Cell</label>
               
                                            <input type="text" class="form-control" id="cell" name="cell" value="<?php echo $admin['cell'] ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'cell') : '' ?>
                                            </span>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mb-2">
                                            <label for="village">Village</label>
               
                                            <input type="text" class="form-control" id="village" name="village" value="<?php echo $admin['village'] ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'village') : '' ?>
                                            </span>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mb-2">
                                            <label for="gender">Gender/Sex</label>
               
                                            <select name="gender" class="form-control" id="gender">
                                                <option value="<?php echo $admin['gender'] ?>"><?php echo $admin['gender'] ?></option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <div class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'gender') : '' ?>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mb-2">
                                            <label for="telephone">Telephone</label>
                                            <input type="number" class="form-control" id="telephone" name="telephone" value="<?php echo $admin['telephone'] ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'telephone') : '' ?>
                                            </span>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mb-2">
                                            <label for="admin_role">Admin Role</label>
               
                                            <select name="admin_role" class="form-control" id="admin_role">
                                                <option value="<?php echo $admin['admin_role'] ?>"><?php echo $admin['admin_role'] ?></option>
                                                <option value="Agronomist">Agronomist</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                            <div class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'admin_role') : '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit" name="register">Update</button>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="reset" class="btn btn-outline-danger" style="float: right;">Reset</button>
                                </form>
                            </div>
                        </div>
                        </div>
                        <!-- end validation form -->

                    </div>
                </div>


            </div>
            <!-- footer -->
            