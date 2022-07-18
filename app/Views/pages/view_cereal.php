
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
                                <form method="POST" action="<?= base_url('cereal/update/'.$cereal['cereal_id']) ?>">
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
                                            <input type="hidden" class="form-control" id="cereal_id" name="cereal_id" value="<?php echo $cereal['cereal_id'] ?>">

                                            <select name="cereal_name" class="form-control" id="cereal_name">
                                                <?php
                                                if(set_value('cereal_name')) {
                                                ?>
                                                <option value="<?= set_value('cereal_name') ?>"><?= set_value('cereal_name') ?></option>
                                                <?php } else { ?>
                                                <option value="<?php echo $cereal['cereal_name'] ?>"><?php echo $cereal['cereal_name'] ?></option>
                                                <?php } ?>

                                                <option value="Rice">Rice</option>
                                                <option value="Oats">Oats</option>
                                                <option value="Rye">Rye</option>
                                                <option value="Sorghum">Sorghum</option>
                                                <option value="Wheat">Wheat</option>
                                                <option value="Corn">Corn(Maize)</option>
                                                <option value="Quinoa">Quinoa</option>
                                                <option value="Barley">Barley</option>
                                                <option value="Buckwheat">Buckwheat</option>
                                                <option value="Millet">Millet</option>
                                            </select>
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'cereal_name') : '' ?>
                                            </span>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="cereal_type">Cereal Type</label>
               
                                            <input type="text" class="form-control" id="cereal_type" name="cereal_type" value="<?php echo $cereal['cereal_type'] ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'cereal_type') : '' ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="cereal_price">Cereal Price in <b>Rwf</b></label>
                                            <input type="number" class="form-control" id="cereal_price" name="cereal_price" value="<?php echo $cereal['cereal_price'] ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'cereal_price') : '' ?>
                                            </span>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="quantity">Quantity in <b>Kgs</b></label>
               
                                            <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $cereal['quantity'] ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'quantity') : '' ?>
                                            </span>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="land_type">Land Type</label>
                                            <select name="land_type" class="form-control" id="land_type">
                                
                                                <?php
                                                if(set_value('land_type')) {
                                                ?>
                                                <option value="<?= set_value('land_type') ?>"><?= set_value('land_type') ?></option>
                                                <?php } else { ?>
                                                <option value="<?php echo $cereal['land_type'] ?>"><?php echo $cereal['land_type'] ?></option>
                                                <?php } ?>

                                                <option value="Forest Land">Forest Land</option>
                                                <option value="Coastal Land">Coastal Land</option>
                                                <option value="Grass Land">Grass Land</option>
                                                <option value="Water Area">Water Area</option>
                                                <option value="Farm Land">Farm Land</option>
                                                <option value="Wet Land">Wet Land</option>
                                                <option value="Desert Land">Desert Land</option>
                                                <option value="Mountain">Mountain</option>
                                                <option value="Urban Land">Urban Land</option>
                                            </select>
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'land_type') : '' ?>
                                            </span>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="season">Season</label>
               
                                            <select name="season" class="form-control" id="season">
                                                <?php
                                                if(set_value('season')) {
                                                ?>
                                                <option value="<?= set_value('season') ?>"><?= set_value('season') ?></option>
                                                <?php } else { ?>
                                                <option value="<?php echo $cereal['season'] ?>"><?php echo $cereal['season'] ?></option>
                                                <?php } ?>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                            </select>
                                            <div class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'season') : '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="rainy">Good for rainy season?</label>
                                            
                                            <select name="rainy" class="form-control" id="rainy">
                                                <?php
                                                if(set_value('rainy')) {
                                                ?>
                                                <option value="<?= set_value('rainy') ?>"><?= set_value('rainy')=='1'?"Yes":"No" ?></option>
                                                <?php } else { ?>
                                                <option value="<?php echo $cereal['rainy'] ?>"><?php echo $cereal['rainy']==1?"Yes":"No" ?></option>
                                                <?php } ?>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                            <div class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'rainy') : '' ?>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="sunny">Good for sunny season?</label>
                                            <select name="sunny" class="form-control" id="sunny">
                                                <?php
                                                if(set_value('sunny')) {
                                                ?>
                                                <option value="<?= set_value('sunny') ?>"><?= set_value('sunny')=='1'?"Yes":"No" ?></option>
                                                <?php } else { ?>
                                                <option value="<?php echo $cereal['sunny'] ?>"><?php echo $cereal['sunny']==1?"Yes":"No" ?></option>
                                                <?php } ?>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                            <div class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'sunny') : '' ?>
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
            