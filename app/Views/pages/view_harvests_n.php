
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
                                                        <th>Cereal Name/Type </th>
                                                        <th>Season </th>
                                                        <th>Quantity/Price</th>
                                                        <th>Total Price</th>
                                                        <th>Harvest Result</th>
                                                        <th>Status </th>
                                                        <th>Date </th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if($harvests): 
                                                    $n = 1;
                                                    foreach($harvests as $hv): 
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $n; ?></td>
                                                        <td>
                                                            <?php echo $hv->cereal_type."<br>(".$hv->cereal_name; ?>)
                                                        </td>

                                                        <td><?php echo $hv->hseason; ?> </td>

                                                        <td>
                                                            <?php echo $hv->hquantity; ?> kgs<br>(<?php echo $hv->current_price." rwf";?>)
                                                        </td>
                                                        <td><?php echo $hv->hquantity * $hv->current_price; ?> rwf </td>
                                                        <td><?php echo $hv->result; ?> </td>
                                                        <td><span class="badge-dot badge-<?php echo $hv->harvestatus==1?"success":"danger";?> mr-1"></span>
                                                            <?php 
                                                            echo $hv->harvestatus == 1?"Approved":"Pending";?>
                                                        </td>
                                                        <td><?php echo $hv->harvest_date; ?></td>
                                                        <td class="text-center">
                                                            <a class="btn btn-sm btn-primary" href="<?= site_url('harvest/approve/'.$hv->harvest_id) ?>" onclick="return confirm('Do you want to approve this harvest?')">Approve</a>
                                                        </td>
                                                    </tr>
                                                    <?php $n++; endforeach;endif; ?>
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
            <!-- footer -->
            