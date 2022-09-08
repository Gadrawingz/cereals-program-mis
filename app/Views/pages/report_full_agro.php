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
                                            
                                            <form method="POST" action="<?= base_url('fertilizer/save') ?>">
                                                <div class="form-row row ml-2 mr-2">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                        <label for="seller">Find Report by Agro-dealer</label>
                                                        <select name="seller" class="form-control" id="seller">
                                                            <option value="">Gasabo</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                        <label for="seller">Find Report by District</label>
                                                        <select name="seller" class="form-control" id="seller">
                                                            <option value="">Gasabo</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-row row ml-2 mr-2">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mt-2 mb-2">
                                                        <button class="btn btn-lg btn-primary" name="submit">Search Report</button>
                                                    </div>
                                                </div>

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
            