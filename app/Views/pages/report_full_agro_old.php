            <script type="text/javascript">

            function printReport() {
                var divContents = document.getElementById("report_id").innerHTML;
                var a = window.open('', '', 'height=800, width=1000');
                a.document.write('<div>'); // @gadrawingz
                a.document.write('<center><h1>Printable Report</h1></center><hr>');
                a.document.write(divContents);
                a.document.write('</div>');
                a.document.close();
                a.print();
            }

            </script>

            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- pageheader  -->
                    <!-- Gad-Iradufasha's coding -> @gadrawingz, @donnekt -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h1 class="text-center">General Report | Agro-dealer</h1>
                        </div>
                    </div>
                    <!-- end pageheader  -->
                    <div class="ecommerce-widget">
                        <div class="row">
                            <!-- recent orders -->
                            <div class="col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-bordered" id="report_id">
                                            <center><br>
                                                <h3><span class="text-primary">All Harvests Report</span></h3>
                                            </center>
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
                                                    </tr>
                                                    <?php $n++; endforeach;endif; ?>
                                                </tbody>
                                            </table>
                                            <br><br>
                                            

                                            <center>
                                                <h3><span class="text-primary">All recent cereal application</span>
                                                </h3>
                                            </center>

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
                                                        <td class="bg-primary"><?php echo $cr->season; ?> </td>
                                                        <td><span class="badge-dot badge-<?php echo $cr->appstatus==1?"success":"danger";?> mr-1"></span>
                                                            <?php 
                                                            echo $cr->appstatus == 1?"Approved":"Pending";?>
                                                        </td>
                                                        <td><?php echo $cr->app_date; ?></td>
                                                    </tr>
                                                    <?php $n++; endforeach; endif; ?>
                                                </tbody>
                                            </table>

                                            
                                        </div>

                                        <p class="text-center mt-3">
                                            <a href="#" onclick="printReport()" class="btn btn-lg btn-success">Print Report</a>
                                        </p><br>
                                    </div>
                                </div>
                            </div>
                            <!-- * -->
                        </div>
            
                    </div>
                </div>
            </div>
            <!-- footer -->
            