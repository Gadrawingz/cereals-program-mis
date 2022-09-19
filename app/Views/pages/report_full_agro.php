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
                    <div class="ecommerce-widget">
                        <div class="row">
                            <!-- recent orders -->
                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-bordered" id="report_id">
                                            <br>
                                            <h2><span class="ml-3 text-primary">Agro-dealer Report</span></h2><hr><br>
                                            
                                            <form method="POST" action="<?= base_url('report/find-cereal') ?>">
                                                <div class="form-row row ml-2 mr-2">
                                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
                                                        <label for="seller">Find report about <span class="text-danger">Cereal</span> requested</label>
                                                        
                                                        <select name="cereal_repo" class="form-control" id="">
                                                            <?php
                                                            foreach($agro_dealers as $agro): ?>
                                                            <option value="<?php echo $agro->district; ?>"><?php echo $agro->firstname." ".$agro->lastname." (".$agro->district_name.")"; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                                        <label for="seller">***************</label>
                                                        <button style="width: 100%!important;" class="btn form-control btn-primary" type="submit">
                                                            Search Report
                                                        </button>
                                                    </div>
                                                </div><br><hr><br>
                                            </form>

                                            <form method="POST" action="<?= base_url('report/find-harvest') ?>">
                                                <div class="form-row row ml-2 mr-2">
                                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
                                                        <label for="seller">Find report about <span class="text-danger">Harvest</span> acquired</label>
                                                        
                                                        <select name="harvest_repo" class="form-control" id="">
                                                            <?php
                                                            foreach($agro_dealers as $agro): ?>
                                                            <option value="<?php echo $agro->district; ?>"><?php echo $agro->firstname." ".$agro->lastname." (".$agro->district_name.")"; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                                        <label for="seller">***************</label>
                                                        <button style="width: 100%!important;" class="btn form-control btn-primary" type="submit">
                                                            Search Report
                                                        </button>
                                                    </div>
                                                </div><br>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- * -->
                        </div>
            
                    </div>
                </div>
            </div>
            <!-- footer -->
            