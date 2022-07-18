
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
                                    <div class="card-header">
                                        <a class="btn btn-sm btn-success float-right" href="<?= site_url('admin/register') ?>">Register new</a>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">N<sup>o</sup></th>
                                                        <th class="border-0">Admin Names </th>
                                                        <th class="border-0">Gender </th>
                                                        <th class="border-0">Telephone</th>
                                                        <th class="border-0">Admin Role</th>
                                                        <th class="border-0">Admin Status</th>
                                                        <th colspan="2" class="text-center">Action&nbsp;&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($admins): ?>
                                                        <?php 
                                                        $n = 1;
                                                        foreach($admins as $admin): ?>
                                                    <tr>
                                                        <td><?php echo $n; ?></td>
                                                        <td><?php echo $admin['firstname']." ".$admin['lastname']; ?> </td>
                                                        <td><?php echo $admin['gender']; ?> </td>
                                                        <td><?php echo $admin['telephone']; ?> </td>
                                                        <td><?php echo $admin['admin_role']; ?></td>
                                                        <td><span class="badge-dot badge-brand mr-1"></span>
                                                            <?php 
                                                            echo $admin['status'] == '1'?"Active":"Inactive"; 
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <a class="btn btn-sm btn-primary" href="<?= site_url('admin/enable/'.$admin['admin_id']) ?>" onclick="return confirm('Do you want to enable this row?')">Enable</a>
                                                        </td>
                                                    </tr>
                                                    <?php $n++; endforeach; ?>
                                                <?php endif; ?>
                                                
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                                                    </tr>
                                                </tfoot>
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
            