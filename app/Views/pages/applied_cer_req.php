
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
                                                        <th>Farmer Name </th>
                                                        <th>Quantity </th>
                                                        <th>Season </th>
                                                        <th>Status </th>
                                                        <th>Date </th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if($cereals): 
                                                    $n = 1;
                                                    foreach($cereals as $cr): 
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $n; ?></td>
                                                        <td>
                                                            <?php echo $cr->cereal_name; ?><br>
                                                            <span class="text-primary"><?php echo $cr->cereal_type; ?></span>
                                                        </td>
                                                        <td>
                                                            <?php echo "by: ".$cr->firstname; ?>
                                                        </td>
                                                        <td><?php echo $cr->quantity; ?> kg(s) </td>
                                                        <td><?php echo $cr->season; ?> </td>
                                                        <td><span class="badge-dot badge-<?php echo $cr->appstatus==1?"success":"danger";?> mr-1"></span>
                                                            <?php 
                                                            echo $cr->appstatus == 1?"Approved":"Pending";?>
                                                        </td>
                                                        <td><?php echo $cr->app_date; ?></td>
                                                        <?php
                                                        echo $cr->appstatus==0? '
                                                        <td class="text-center">
                                                            <a class="btn btn-sm btn-primary" href="'.site_url('cereal/app-rev/'.$cr->app_id).'">&nbsp;Review&nbsp;</a>
                                                        </td>
                                                        ':'
                                                        <td class="text-center">
                                                            <button class="btn btn-sm btn-warning" onmouseup="return alert(\'Nothing to do\')" disabled><u><strong>Approved</strong></u></a>
                                                        </td>
                                                        '; ?>
                                                    </tr>
                                                    <?php $n++; endforeach; endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end recent orders  -->
                        </div>
            
                    </div>
                </div>
            </div>
            <!-- footer -->
            