
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- pageheader  -->
                    <!-- end pageheader  -->
                    <div class="ecommerce-widget">
                        <div class="row">
                    <!-- ============================================================== -->
                    <!-- bar chart  -->
                    <!-- ============================================================== -->
                    <?php
                    if($dataStats):
                        foreach($dataStats as $data):
                            $month[]  = $data['month_name'];
                            $amount[] = $data['amount'];
                        endforeach;
                    endif;
                    ?>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <!-- <h4 class="card-header text-center">Statistics</h4> -->
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
            