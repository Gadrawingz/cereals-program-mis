
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
                                <form method="POST" action="<?= base_url('fertilizer/update/'.$fert['item_id']) ?>">
                                    <?= csrf_field(); ?>

                                    <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                                    <div class="alert alert-danger"><?= session()->getFlashdata('fail') ?></div>
                                    <?php endif ?>

                                    <?php if(!empty(session()->getFlashdata('success'))) : ?>
                                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                                    <?php endif ?>

                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="category">Fertilizer Category</label>
                                            <select name="category" class="form-control" id="category">
                                
                                                <?php
                                                if(set_value('category')) {
                                                ?>
                                                <option value="<?= set_value('category') ?>"><?= set_value('category') ?></option>
                                                <?php } else { ?>
                                                <option value="<?php echo $fert['category']; ?>"><?php echo $fert['category']; ?></option>
                                                <?php } ?>
                                                <option value="Macro-Nutrient">Macro-Nutrient</option>
                                                <option value="Compounds/Blends">Compounds/Blends</option>
                                            </select>
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'category') : '' ?>
                                            </span>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="type">Fertilizer Type</label>
               
                                            <input type="text" class="form-control" id="type" name="type" value="<?php echo $fert['item_type'] ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'type') : '' ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="price">Fertilizer Price in <b>rwf</b> <span class="text-primary">(Igiciro kitunganiwe)</span></label>
                                            <input type="number" class="form-control" id="price" name="price" value="<?php echo $fert['price_per_kg'] ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'price') : '' ?>
                                            </span>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="quantity">Quantity in <b>kgs</b> <span class="text-primary">(Ingano y'ibyakiriwe)</span></label></label>
                                            <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $fert['quantity'] ?>">
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'quantity') : '' ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="subsidy_value">Subsidy value in <b>rwf</b> <span class="text-primary">(Nkunganire ya Leta)</span></label>
                                            <input type="number" class="form-control" id="subsidy_value" name="subsidy_value" value="<?php echo $fert['subsidy_value'] ?>">
                                            
                                            <span class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'subsidy_value') : '' ?>
                                            </span>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="seller">Company/Seller</label>
                                            <select name="seller" class="form-control" id="seller">
                                                <?php
                                                if(set_value('seller') && $sellers) {
                                                ?>
                                                <option value="<?= set_value('seller') ?>"><?= set_value('seller') ?></option>
                                                <?php } else { ?>
                                                <option value="<?php echo $fert['comp_id']; ?>">Select Again</option>
                                                <?php } ?>

                                                <?php foreach($sellers as $seller): ?>
                                                <option value="<?php echo $seller->comp_id; ?>"><?php echo $seller->name; ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                            <div class="errorful">
                                                <?= isset($validation) ? displayError($validation, 'seller') : '' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit" name="register">Register</button>
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
            