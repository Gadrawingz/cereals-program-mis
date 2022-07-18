
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- pageheader  -->
                    <!-- Gad-Iradufasha's coding -> @gadrawingz, @donnekt -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2"><?= $page_title ?> <h3>
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

                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"><?= $cardData['admins_title']; ?></h5>
                                <div class="card-body">
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?= $cardData['admins_count']; ?></h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                        <span class="icon-circle-small icon-box-xs text-danger bg-danger-light"><i class="fa fa-fw fa-user"></i></span>
                                    </div>
                                </div>
                                <div class="card-body bg-primary-light p-t-40 p-b-40">
                                    <div id="sparkline-revenue"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"><?= $cardData['agro_title']; ?> </h5>
                                <div class="card-body">
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?= $cardData['agro_count']; ?></h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                        <span class="icon-circle-small icon-box-xs text-danger bg-danger-light"><i class="fa fa-fw fa-user"></i></span>
                                    </div>
                                </div>
                                <div class="card-body text-center bg-primary-light p-t-40 p-b-40">
                                    <div id="sparkline-revenue2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"><?= $cardData['cereals_title']; ?></h5>
                                <div class="card-body">
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?= $cardData['cereals_count']; ?></h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                        <span class="icon-circle-small icon-box-xs text-primary bg-primary-light"><i class="fa fa-fw fa-th"></i></span>
                                    </div>
                                </div>
                                <div class="card-body bg-secondary-light p-t-40 p-b-40">
                                    <div id="sparkline-revenue3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"><?= $cardData['harvests_title']; ?></h5>
                                <div class="card-body">
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?= $cardData['harvests_count']; ?></h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                        <span class="icon-circle-small icon-box-xs text-primary bg-primary-light"><i class="fa fa-fw fa-th"></i></span>
                                    </div>
                                </div>
                                <div class="card-body bg-secondary-light p-b-40 p-t-40">
                                    <div id="sparkline-revenue4"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- footer -->
            