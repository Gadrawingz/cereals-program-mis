            <style type="text/css">
                table tr {
                    border: 2px solid darkblue;!important; 
                }
            </style>
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
                                    <?php 
                                    if(session()->has('activeAdmin') && session()->get('adminRole')=='Admin') {
                                    ?>
                                    <div class="card-header">
                                        <a class="btn btn-sm btn-success float-right" href="<?= site_url('fertilizer/register') ?>">Register new</a>
                                    </div>
                                    <?php } ?>
                                    <div class="card-body p-0">
                                        <div class="table-bordered">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">N<sup>o</sup></th>
                                                        <th class="border-0">Fertilizer/Category </th>
                                                        <th class="border-0">Quantity </th>
                                                        <th class="border-0">Price/kg</th>
                                                        <th class="border-0">Final Values<br>Farmer's Price </th>
                                                        <th class="border-0">Company Name </th>
                                                        <th colspan="2" class="text-center">Action&nbsp;&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($ferts): ?>
                                                        <?php 
                                                        $n = 1;
                                                        foreach($ferts as $f): ?>
                                                    <tr>
                                                        <td><?php echo $n; ?></td>
                                                        
                                                        <td>
                                                            <p class="btn text-dark" data-toggle="tooltip" data-placement="bottom" title="<?php echo $f['category']; ?>">
                                                                <?php echo $f['item_type']; ?>
                                                            </p>
                                                        </td>

                                                        <td><b><?php echo $f['quantity']; ?>kg(s)</b></td>

                                                        <td><?php echo $f['price_per_kg']; ?> rwf(s)  </td>
                                                        <td>
                                                            <mark class="text-primary" title="Nkunganire">Subsidy Value</mark><br>
                                                            =<?php
                                                            echo $f['subsidy_value']."rwf(s)";
                                                            ?><hr>
                                                            <mark class="text-success">Farmer's price</mark><br>
                                                            =<?php
                                                            echo $f['price_per_kg'] - $f['subsidy_value']."rwf(s)";
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <p class="text-primary" data-toggle="tooltip"style="width: 100%; text-align: left;" data-placement="bottom" title="<?php echo $f['telephone']; ?>">
                                                                <?php echo $f['name']; ?>
                                                            </p>
                                                        </td>
                                                        <td class="text-center">
                                                            <a class="btn btn-sm btn-primary" href="<?= site_url('fertilizer/edit/'.$f['item_id']) ?>">Update</a>
                                                        </td>
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
            