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
                                                <thead class="bg-dark">
                                                    <tr class="border-0">
                                                        <th class="text-white">N<sup>o</sup></th>
                                                        <th class="text-white">Cereal Name/Type </th>
                                                        <th class="text-white">Farmer Names </th>
                                                        <th class="text-white">Quantity/Price</th>
                                                        <th class="text-white">Total Price</th>
                                                        <th class="text-white">Season/Result</th>
                                                        <th class="text-white">Status </th>
                                                        <th class="text-white">Date </th>
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

                                                        <td>
                                                            <?php echo $hv->firstname." ".$hv->lastname; ?><br>
                                                            (<?php echo $hv->district_name ?>)
                                                            
                                                        </td>

                                                        <td>
                                                            <?php echo $hv->hquantity; ?> kgs<br>(<?php echo $hv->current_price." rwf";?>)
                                                        </td>
                                                        <td><?php echo $hv->hquantity * $hv->current_price; ?> rwf </td>
                                                        <td><?php echo $hv->hseason."/ ".$hv->result; ?> </td>
                                                        <td><span class="badge-dot badge-<?php echo $hv->harvestatus==1?"success":"danger";?> mr-1"></span>
                                                            <?php 
                                                            echo $hv->harvestatus == 1?"Approved":"Pending";?>
                                                        </td>
                                                        <td><?php echo $hv->harvest_date; ?></td>
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
            