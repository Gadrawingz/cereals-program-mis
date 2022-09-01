
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
                                <form method="POST" action="<?= base_url('fertilizer/approve') ?>">
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

                                            <input type="text" class="form-control" id="cell" value="<?php echo $cereal['cereal_name'] ?>" disabled>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="cereal_type">Cereal Type</label>

                                            <input type="text" class="form-control" id="cell" value="<?php echo $cereal['cereal_type'] ?>" disabled
                                            >
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="cereal_price">Cereal Price in <b>Rwf</b></label>
                                            <input type="text" class="form-control" id="cell" value="<?php echo $cereal['cereal_price'] ?>" disabled
                                            >
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="quantity">Quantity in <b>Kgs</b></label>
               
                                            <input type="text" class="form-control" id="cell" value="<?php echo $cereal['quantity'] ?>" disabled
                                            >
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="cereal_price"><b>Select corresponding fertilizer</b></label>

                                            <?php foreach($fertilizers as $f): ?>
                                                <div style="display: flex; flex-direction: column;">
                                                    <p style="display: flex; text-align: left; justify-content: left;">
                                                    <input type="checkbox" style="line-height: 30px" id="fert3" value="<?php echo $f->item_id; ?>" name="checked[]"> :
                                                    <label for="fert3"><span style="color: black;"><?php echo $f->item_type; ?></span></label>
                                                    </p>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-2">
                                            <label for="quantity">Add Quantity allowed in <b>Kgs</b></label>
               
                                            <input type="text" class="form-control" id="" value="2">
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
            