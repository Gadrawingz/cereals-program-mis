
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- pageheader  -->
                    <!-- Gad-Iradufasha's coding -> @gadrawingz, @donnekt -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title"><?= $page_title ?></h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?= $breadcrumb ?></a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><?= $page_title ?></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end pageheader  -->
                    <!-- ===================================================== -->
                    <div class="ecommerce-widget">

                        <div class="row">
                            <!-- ============================================= -->
                            <div class="col-lg-12 col-md-6 col-sm-12 col-12">
                                <?php
                                if(!empty(session()->getFlashdata('fail'))) :
                                ?>
                                <div class="alert alert-danger text-center"><?= session()->getFlashdata('fail') ?>
                                </div>
                                <?php 
                                endif;
                                if(!empty(session()->getFlashdata('success'))) :
                                ?>
                                <div class="alert alert-success text-center"><?= session()->getFlashdata('success') ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <!-- ============================================= -->
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted"><?= $cardData['card1_a']; ?></h5>
                                        <div class="metric-value d-inline-block">
                                            <h2 class="mb-1"><?= $cardData['card1_b']; ?></h2>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">Yes</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue"></div>
                                </div>
                            </div>
                        
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted"><?= $cardData['card2_a']; ?></h5>
                                        <div class="metric-value d-inline-block">
                                            <h2 class="mb-1"><?= $cardData['card2_b']; ?></h2>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light "><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1">No</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue3"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- ========================================== -->
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted"><?= $cardData['card3_a']; ?></h5>
                                        <div class="metric-value d-inline-block">
                                            <h2 class="mb-1"><?= $cardData['card3_b']; ?></h2>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">Yes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- =========================================== -->
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted"><?= $cardData['card4_a']; ?></h5>
                                        <div class="metric-value d-inline-block">
                                            <h2 class="mb-1"><?= $cardData['card4_b']; ?></h2>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light "><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1">No</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end total orders  -->
                        </div>
                    
                    </div>
                </div>
            </div>
            <!-- footer -->
            