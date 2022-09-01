
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
                            <!-- recent orders -->
                            <div class="col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-striped table-bordered">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th>N<sup>o</sup></th>
                                                        <th>Company/Supplier </th>
                                                        <th>District </th>
                                                        <th>Contact No. </th>
                                                        <th>Date Updated</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if($regions): 
                                                    $n = 1;
                                                    foreach($regions as $region): 
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $n; ?></td>
                                                        <td>
                                                            <?php echo $region->supplier_name; ?>
                                                        </td>
                                                        <td>
                                                            <p class="btn btn-primary" data-toggle="tooltip"style="width: 100%; text-align: left;" data-placement="right" title=" <?php echo $region->province_name; ?>">
                                                            <?php echo $region->district_name; ?>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <b><?php echo $region->telephone; ?></b>
                                                        </td>
                                                        <td>
                                                            <?php echo $region->created_at; ?>
                                                        </td>
                                                    </tr>
                                                    <?php $n++; endforeach; endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                    </div>
                </div>
            </div>
            