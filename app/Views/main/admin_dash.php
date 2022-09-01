
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- pageheader  -->
                    <!-- Gad-Iradufasha's coding -> @gadrawingz, @donnekt -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2"><?= $page_title ?> <h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-inline-block">
                                            <h5 class="text-muted"><?= $cardData['cereals_title']; ?></h5>
                                            <h2 class="mb-0"> <?= $cardData['cereals_count']; ?></h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                        <i class="fa fa-cart-plus fa-fw fa-sm text-primary"></i>
                                    </div>
                                </div>
                                <div class="campaign-img">
                                    <img src="<?= base_url('public/assets/images/banner_9.jpg'); ?>" style="width: 100%; height: 300px;" alt="user"class=" user-avatar-xl">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-inline-block">
                                            <h5 class="text-muted"><?= $cardData['harvests_title']; ?></h5>
                                            <h2 class="mb-0"> <?= $cardData['harvests_count']; ?></h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                                        <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
                                    </div>
                                </div>
                                <div class="campaign-img">
                                    <img src="<?= base_url('public/assets/images/img_1.jpg'); ?>" style="width: 100%; height: 300px;" alt="user"class=" user-avatar-xl">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- footer -->
            