
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- pageheader  -->
                    <!-- end pageheader  -->
                    <div class="ecommerce-widget">
                        <div class="row">
                    <!-- ============================================================== -->
                    <!-- bar chart  -->
                    <!-- ============================================================== -->
                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <div class="card">
                            <!-- <h4 class="card-header text-center">Statistics</h4> -->
                                <?php
                                /*
                                if($dataStats):
                                    foreach($dataStats as $data):

                                    echo "<p style='font-size: 18px!important;margin: 0;'>The month of ".$data['month_name']." received <span class='text-danger'>".$data['requests']."</span> requests this year<p>";
                                endforeach;
                                endif;

                                $month_array = array();
                                if($dataStats):
                                foreach($dataStats as $data):
                                $month[]    = $data['month_name'];
                                $requests[] = $data['requests'];
                                print("'".$data['month_name']."'".", ");
                                $month[] = ("'".$data['month_name']."'".", ");
                                endforeach;
                                endif;
                                */
                                ?>
                                <style type="text/css">
                                    td, th {
                                        font-size: 18px;
                                    }
                                </style>
                            <div class="table-bordered table-bordered">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">N<sup>o</sup></th>
                                                        <th class="border-0">Month </th>
                                                        <th class="border-0 text-center">Total Cereal Requests </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($dataStats): ?>
                                                        <?php 
                                                        $n = 1;
                                                        foreach($dataStats as $data): ?>
                                                    <tr>
                                                        <td><?php echo $n; ?></td>
                                                        <td><?php echo $data['month_name']; ?> </td>
                                                        <td class="text-center"><?php echo $data['requests']; ?> requests </td>
                                                    </tr>
                                                    <?php $n++; endforeach; ?>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>

                            <div class="card-body">
                                <canvas id="chartjs_bar"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end bar chart  -->
                    <!-- ============================================================== -->
                </div>
            
                    </div>
                </div>
            </div>
            <!-- footer -->