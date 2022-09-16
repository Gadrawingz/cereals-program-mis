
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- pageheader  -->
                    <!-- Gad-Iradufasha's coding -> @gadrawingz, @donnekt -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title"><?= esc($page_title) ?> </h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="#" class="breadcrumb-link">
                                                <?= esc($breadcrumb) ?> 
                                                </a>
                                            </li>
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
                                <form method="POST" action="<?= base_url('cereal/approval') ?>">
                                    <?= csrf_field(); ?>
                                    <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                                    <div class="alert alert-danger"><?= session()->getFlashdata('fail') ?></div>
                                    <?php endif ?>

                                    <?php if(!empty(session()->getFlashdata('success'))) : ?>
                                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                                    <?php endif ?>

                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="cereal_name">Cereal Name</label>
                                            <input type="hidden" class="form-control" id="app_id" name="app_id" value="<?php echo $app['app_id'] ?>">
                                            
                                            <input type="hidden" value="<?php echo $app['app_id'] ?>" name="app_id">
                                            <input type="hidden" value="<?php echo $app['cereal_id'] ?>" name="cereal_id">
                                            <input type="hidden" value="<?php echo $cereal['cereal_type'] ?>" name="cereal_type">
                                            <input type="hidden" value="<?php echo $cereal['cereal_price'] ?>" name="cereal_price">
                                            <input type="hidden" value="<?php echo $cereal['season'] ?>" name="season">
                                            <input type="hidden" value="<?php echo $app['quantity'] ?>" name="quantity">
                                            <input type="hidden" value="<?php echo $app['farmer_id'] ?>" name="farmer_id">
                                            <input type="hidden" value="<?php echo $farmer['firstname'] ?>" name="firstname">
                                            <input type="hidden" value="<?php echo $farmer['lastname'] ?>" name="lastname">
                                            <input type="hidden" value="<?php echo $farmer['telephone'] ?>" name="telephone">

                                            <input type="text" class="form-control" id="" value="<?php echo $cereal['cereal_name'] ?>" disabled>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="cereal_type">Cereal Type</label>
                                            <input type="text" class="form-control" id="" value="<?php echo $cereal['cereal_type'] ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="form-row" style="border-bottom: 5px solid blue; margin-bottom: 12px!important;">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="cereal_price">Cereal Price</label>
                                            <input type="text" class="form-control" id="" value="<?php echo $cereal['cereal_price'] ?> rwf(s)" disabled
                                            >
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="c_quantity">Cereal Quantity (kg</label>

                                            <input type="hidden" value="<?php echo $app['quantity']?>" name="c_quantity_untouch">
               
                                            <input type="number" class="form-control" id="c_quantity" value="<?php echo isset($app['quantity'])?set_value('c_quantity'):$app['quantity']; ?>" name="c_quantity">
                                            <div class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'c_quantity') : '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row" style="padding-top: 10px!important;">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="f_quantity">Fertilizer quantity allowed in <b>Kgs</b></label>
               
                                            <input type="number" class="form-control" id="" value="<?= set_value('f_quantity') ?>" name="f_quantity">
                                            <div class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'f_quantity') : '' ?>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="fert1">Fertilizer <b>#1</b> <span class="text-danger">(Required)</span></label>

                                            <select name="fert1" class="form-control" id="fert1">
                                                <?php
                                                if(set_value('fert1')) {
                                                ?>
                                                <option value="<?= set_value('fert1') ?>"><?= set_value('fert1') ?></option>
                                                <?php } else { ?>
                                                <option value="">Select Fertilizer (1)</option>
                                                <?php } ?>
                                                
                                                <?php foreach($ferts as $f): ?>
                                                <option value="<?php echo $f->item_id; ?>"><?php echo $f->item_type; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="fert2">Fertilizer <b>2nd type</b> <span class="text-primary">(Optional)</span></label>
                                            <select name="fert2" class="form-control" id="fert2">
                                                <?php
                                                if(set_value('fert2')) {
                                                ?>
                                                <option value="<?= set_value('fert2') ?>"><?= set_value('fert2') ?></option>
                                                <?php } else { ?>
                                                <option value="">Select Fertilizer</option>
                                                <?php } ?>
                                                
                                                <?php foreach($ferts as $f): ?>
                                                <option value="<?php echo $f->item_id; ?>"><?php echo $f->item_type; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="fert3">Fertilizer <b>3rd type</b> <span class="text-primary">(Optional)</span></label>
                                            <select name="fert3" class="form-control" id="fert3">
                                                <?php
                                                if(set_value('fert3')) {
                                                ?>
                                                <option value="<?= set_value('fert3') ?>"><?= set_value('fert3') ?></option>
                                                <?php } else { ?>
                                                <option value="">Select Fertilizer</option>
                                                <?php } ?>
                                                
                                                <?php foreach($ferts as $f): ?>
                                                <option value="<?php echo $f->item_id; ?>"><?php echo $f->item_type; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="">
                                        <button class="btn btn-lg btn-primary" type="submit" name="register">Approve Request</button>
                                    </div>
                                
                                </form>
                            </div>
                        </div>
                        </div>
                        <!-- end validation form -->

                    </div>
                </div>


            </div>
            <!-- footer -->
            