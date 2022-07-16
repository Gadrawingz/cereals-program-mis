
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
                                        <form method="POST" action="<?= base_url('harvest/appsub') ?>">
                                            <?= csrf_field(); ?>
                                            <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                                            <div class="alert alert-danger"><?= session()->getFlashdata('fail') ?>
                                            </div>
                                            <?php endif ?>
                                            <?php if(!empty(session()->getFlashdata('success'))) : ?>
                                            <div class="alert alert-success"><?= session()->getFlashdata('success') ?>
                                            </div>
                                            <?php endif ?>

                                            <div class="form-group">
                                                <label for="cereal_id" class="col-form-label">Select cereal type</label>
                                                <select name="cereal_id" id="cereal_id" class="form-control form-control">

                                                    <?php
                                                    if(set_value('cereal_id')) {
                                                    ?>
                                                    <option value="<?= set_value('cereal_id') ?>">Okay, You Selected it!</option>
                                                    <?php } else { ?>
                                                    <option value="">Select cereal type</option>
                                                    <?php } ?>
                                                    
                                                    <?php
                                                    if($cereals):
                                                        foreach($cereals as $cer):
                                                    ?>
                                                    <option value="<?php echo $cer['cereal_id'] ?>"><?php echo $cer['cereal_type'] ?></option>
                                                    <?php
                                                    endforeach;
                                                    endif;
                                                    ?>
                                                </select>
                                                <div class="errorful">
                                                    <?= isset($validation) ? displayError($validation, 'cereal_id') : '' ?>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                                    <label for="season" class="col-form-label">Select Season</label>
                                                    <select name="season" id="season" class="form-control form-control">
                                                        <?php
                                                        if(set_value('season')) {
                                                        ?>
                                                        <option value="<?= set_value('season') ?>"><?= set_value('season') ?></option>
                                                        <?php } else { ?>
                                                        <option value="">Select season</option>
                                                        <?php } ?>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                    </select>
                                                    <div class="errorful">
                                                        <?= isset($validation) ? displayError($validation, 'season') : '' ?>
                                                            
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                                    <label for="season" class="col-form-label">Select outcome</label>
                                                    <select name="outcome" id="outcome" class="form-control form-control">
                                                        <?php
                                                        if(set_value('outcome')) {
                                                        ?>
                                                        <option value="<?= set_value('outcome') ?>"><?= set_value('outcome') ?></option>
                                                        <?php } else { ?>
                                                        <option value="">Select outcome</option>
                                                        <?php } ?>
                                                        <option value="High">High</option>
                                                        <option value="Medium">Medium</option>
                                                        <option value="Low">Low</option>
                                                    </select>
                                                    <div class="errorful">
                                                        <?= isset($validation) ? displayError($validation, 'outcome') : '' ?>
                                                            
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                                    <label for="quantity" class="col-form-label">Add acquired quantity in (Kgs)</label>
                                                    <input id="quantity" type="number" class="form-control form-control" name="quantity" value="<?= set_value('quantity') ?>">
                                                    <div class="errorful">
                                                    <?= isset($validation) ? displayError($validation, 'quantity') : '' ?>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                                    <label for="price" class="col-form-label">Add current price in (rwf)</label>
                                                    <input id="price" type="number" class="form-control form-control" name="price" value="<?= set_value('price') ?>">
                                                    <div class="errorful">
                                                    <?= isset($validation) ? displayError($validation, 'price') : '' ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="submit" name="register">Register</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end form -->
                    </div>
                </div>

            </div>
            <!-- footer -->
            