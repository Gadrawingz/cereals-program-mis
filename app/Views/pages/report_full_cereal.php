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
                    <!-- end pageheader  -->
                    <div class="ecommerce-widget">
                        
                        <div class="row">
                            <!-- recent orders -->
                            <div class="col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-bordered" id="report_id">
                                            <center>
                                                <h3 style="margin-top: 20px!important;">
                                                    <span class="text-primary">
                                                        <?= esc($page_title) ?>
                                                    </span>
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
                                                            <?php echo "by: ".$cr->firstname." ".$cr->lastname; ?><br>
                                                            (<?php echo $cr->district_name; ?>)
                                                        </td>
                                                        <td><?php echo $cr->quantity; ?> kg(s) </td>
                                                        <td class="text-white bg-primary"><?php echo $cr->season; ?> </td>
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
                                            <a href="#" onclick="printReport()" class="btn btn-lg btn-success">Print Report</a>&nbsp;&nbsp;
                                        </p><hr>
                                    </div>
                                </div>
                            </div>

                        </div>
            
                    </div>
                </div>
            </div>
            <!-- footer -->
            