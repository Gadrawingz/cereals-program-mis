
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
                            <!-- recent orders -->
                            <div class="col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <?php 
                                    if(session()->has('activeAdmin') && session()->get('adminRole')=='Admin') {
                                    ?>
                                    <div class="card-header">
                                        <a class="btn btn-sm btn-success float-right" href="<?= site_url('cereal/register') ?>">Register new</a>
                                    </div>
                                    <?php } ?>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">N<sup>o</sup></th>
                                                        <th class="border-0">Cereal Name </th>
                                                        <th class="border-0">Price </th>
                                                        <th class="border-0">Quantity </th>
                                                        <th class="border-0">Land Type</th>
                                                        <th class="border-0">Season </th>
                                                        <th class="border-0">Rainy </th>
                                                        <th class="border-0">Sunny </th>
                                                        <th class="border-0">Status </th>
                                                        <th colspan="2" class="text-right">Action&nbsp;&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($cereals): ?>
                                                        <?php 
                                                        $n = 1;
                                                        foreach($cereals as $cr): ?>
                                                    <tr>
                                                        <td><?php echo $n; ?></td>
                                                        <td>
                                                            <?php echo $cr['cereal_type']; ?><br>
                                                            <span class="text-primary text-sm">(<?php echo $cr['cereal_name']; ?>)</i>
                                                                
                                                        </td>
                                                        <td>
                                                            <b><?php echo $cr['cereal_price']; ?></b> rwf
                                                        </td>
                                                        <td><?php echo $cr['quantity']; ?> kgs </td>
                                                        <td><?php echo $cr['land_type']; ?> </td>
                                                        <td><?php echo $cr['season']; ?></td>

                                                        <td>
                                                        <?php 
                                                            echo $cr['rainy']==1?"Yes": "No";
                                                        ?>   
                                                        </td>

                                                        <td>
                                                        <?php
                                                            echo $cr['sunny']==1?"Yes": "No";
                                                        ?>   
                                                        </td>

                                                        <td>
                                                            <span class="badge-dot badge-<?php 
                                                            echo $cr['status']==1?'success': 'danger';?> mr-1"></span>
                                                        <?php 
                                                            echo $cr['status']==1?"Available": "Unavailable";
                                                        ?>   
                                                        </td>

                                                        <?php
                                                        if(session()->has('activeAdmin') && session()->get('adminRole')=='Admin') {
                                                        ?>
                                                        <td class="float-right">
                                                            <a class="btn btn-sm btn-primary" href="<?= site_url('cereal/edit/'.$cr['cereal_id']) ?>">Edit</a>&nbsp;
                                                            <a class="btn btn-sm btn-danger" href="<?= site_url('cereal/delete/'.$cr['cereal_id']) ?>" onclick="return confirm('Do you want to delete this row?')">Delete</a>
                                                        </td>
                                                        <?php } else { ?>
                                                        <td class="float-right">
                                                            <button class="btn btn-sm btn-danger" disabled onclick="return alert('No action to perform here')">View Only</button>
                                                        </td>
                                                        <?php } ?>

                                                    </tr>
                                                    <?php $n++; endforeach; ?>
                                                <?php endif; ?>
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
            