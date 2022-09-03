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
                            <h1 class="text-center">General overview</h1>
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
                                            <center>
                                                <h3><span class="text-primary">General Overview</span></h3>
                                            </center>

                                            <table class="table" style="width: 100%">
                                                <thead class="bg-light">
                                                    <tr class="bg-primary" style="color: white!important;">
                                                        <th class="text-white text-center" style="font-size: 18px">
                                                            <?= $cardData['all_far_title']; ?>
                                                        </th>

                                                        <th class="text-white text-center" style="font-size: 18px">
                                                            <?= $cardData['active_fc_title']; ?>
                                                        </th>

                                                        <th class="text-white text-center" style="font-size: 18px">
                                                            <?= $cardData['inactive_fc_title']; ?>
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <center><p class="text-center" style="font-size: 18px; color: #000;"><?= $cardData['all_far_count']; ?> farmer(s)</p></center>
                                                        </td>

                                                        <td>
                                                            <center><p class="text-center" style="font-size: 18px; color: #000;"><?= $cardData['active_fc_count']; ?> farmer(s)</p></center>
                                                        </td>

                                                        <td>
                                                            <center><p class="text-center" style="font-size: 18px; color: #000;"> <?= $cardData['inactive_fc_count']; ?> farmer(s)</p></center>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br><br>
                                            

                                            <center>
                                                <h3><span class="text-primary">Cereal & Harvest Overview</span>
                                                </h3>
                                            </center>

                                            <table class="table" style="width: 100%">
                                                <thead class="bg-light">
                                                    <tr class="bg-dark" style="color: white!important;">
                                                        
                                                        <th class="text-white text-center bg-primary" style="font-size: 18px">
                                                            <?= $cardData['all_c_title']; ?>
                                                        </th>

                                                        <th class="text-white text-center bg-primary" style="font-size: 18px">
                                                            <?= $cardData['c_req_title']; ?>
                                                        </th>

                                                        <th class="text-white text-center bg-dark" style="font-size: 18px">
                                                            <?= $cardData['all_h_title']; ?>
                                                        </th>

                                                        <th class="text-white text-center bg-dark" style="font-size: 18px">
                                                            <?= $cardData['all_ft_title']; ?>
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <center><p style="font-size: 18px; color: #000;"><?= $cardData['all_c_count']; ?> cereal(s)</p></center>
                                                        </td>

                                                        <td>
                                                            <center><p style="font-size: 18px; color: #000;"><?= $cardData['c_req_count']; ?> cereal request(s)</p></center>
                                                        </td>

                                                        <td>
                                                            <center><p style="font-size: 18px; color: #000;"><?= $cardData['all_h_count']; ?> harvest(s)</p></center>
                                                        </td>

                                                        <td>
                                                            <center><p style="font-size: 18px; color: #000;"><?= $cardData['all_ft_count']; ?> fertilizer(s)</p></center>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            
                                        </div>

                                        <p class="text-center mt-3">
                                            <a href="#" onclick="printReport()" class="btn btn-lg btn-success">Print Report</a>&nbsp;&nbsp;
                                            <a href="<?= base_url('report/full-agro') ?>" class="btn btn-lg btn-outline-secondary">View Full Reports</a>

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
            