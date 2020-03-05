<section id="content">
            <div class="page dashboard-page">
                <!-- bradcome -->
                <div class="b-b mb-20">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <h1 class="h3 m-0">Dashboard</h1>
                            <small class="text-muted">Selamat Datang di SIWOM</small> <br>
                            <small class="text-primary">Anda Masuk Sebagai <?= $this->session->userdata('user')->hak_akses ?></small>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                        <div class="boxs top_report_chart l-blue">
                            <div class="boxs-body">
                                <h3 class="mt-0">52.3 Gb</h3>
                                <p>Total User</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                        <div class="boxs top_report_chart l-parpl">
                            <div class="boxs-body">
                                <h3 class="mt-0">31.8%</h3>
                                <p>User Aktif</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                        <div class="boxs top_report_chart l-seagreen">
                            <div class="boxs-body">
                                <h3 class="mt-0">$ 21,501</h3>
                                <p>User Belum Terverifikasi</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                        <div class="boxs top_report_chart l-amber">
                            <div class="boxs-body">
                                <h3 class="mt-0">1,195</h3>
                                <p>User Diblokir</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
</section>