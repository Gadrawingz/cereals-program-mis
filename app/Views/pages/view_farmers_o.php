
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
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">N<sup>o</sup></th>
                                                        <th class="border-0">Farmer Names </th>
                                                        <th class="border-0">Gender </th>
                                                        <th class="border-0">Telephone</th>
                                                        <th class="border-0">Prov/District</th>
                                                        <th class="border-0">Sector/Cell</th>
                                                        <th class="border-0">Village</th>
                                                        <th class="border-0">Status</th>
                                                        <th colspan="2" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($farmers): ?>
                                                        <?php 
                                                        $n = 1;
                                                        foreach($farmers as $farmer): ?>
                                                    <tr>
                                                        <td><?php echo $n; ?></td>
                                                        <td><?php echo $farmer['firstname']." ".$farmer['lastname']; ?> </td>
                                                        <td><?php echo $farmer['gender']; ?> </td>
                                                        <td><?php echo $farmer['telephone']; ?> </td>
                                                        <td>
                                                            <?php echo $farmer['province']; ?><br>
                                                            <i>(<?php echo $farmer['district']; ?>)</i>
                                                        </td>

                                                        <td>
                                                            <?php echo $farmer['sector']; ?><br>
                                                            <i>(<?php echo $farmer['cell']; ?>)</i>
                                                        </td>
                                                        <td>
                                                            <?php echo $farmer['village']; ?>
                                                        </td>
                                                        <td><span class="badge-dot badge-<?php 
                                                            echo $farmer['status'] == '0'?"danger":"success" ?> mr-1"></span>
                                                            <?php 
                                                            echo $farmer['status'] == '1'?"Active":"Inactive" ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <a class="btn btn-sm btn-primary" href="<?= site_url('farmer/enable/'.$farmer['farmer_id']) ?>" onclick="return confirm('Do you want to enable this farmer?')">Enable</a>
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
            