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
                            <h1 class="">AGRO DEALER</h1>
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
                                            <br>
                                            <h2><span class="ml-3 text-primary">Search for report Accordingly</span></h2><hr><br>
                                            
                                            <form method="POST" action="<?= base_url('') ?>">
                                                <div class="form-row row ml-2 mr-2">
                                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
                                                        <label for="seller">Find Report by Agro-dealer</label>
                                                        
                                                        <select name="district" class="form-control" id="district">
                                                            <?php
                                                            foreach($districts as $dist): ?>
                                                            <option value="<?php echo $dist->district_id; ?>"><?php echo $dist->district_name; ?></option>
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
            