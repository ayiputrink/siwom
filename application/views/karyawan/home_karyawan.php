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
                    <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                        <div class="boxs top_report_chart l-blue">
                            <div class="boxs-body">
                                <h3 class="mt-0"><?= $tugas ?> Tugas</h3>
                                <p>Total Tugas</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                        <div class="boxs top_report_chart l-parpl">
                            <div class="boxs-body">
                                <h3 class="mt-0"><?= $tugas_selesai ?> Tugas</h3>
                                <p>Tugas Selesai</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                        <div class="boxs top_report_chart l-seagreen">
                            <div class="boxs-body">
                                <h3 class="mt-0"><?= $tugas_belum ?> Tugas</h3>
                                <p>Tugas Belum Selesai</p>
                            </div>
                            
                        </div>
                    </div>
                    
                    
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="boxs top_report_chart l-parpl">
                            <div class="boxs-body">
                                <h3 class="mt-0">Jobdesk Bagian <?= $this->session->userdata('user')->nama_bagian ?> : </h3>
                                <h4><?= ($data_bagian[0]['jobdesk'] == '' || $data_bagian[0]['jobdesk'] == null ? 'Data Jobdesk Tidak Ada' : $data_bagian[0]['jobdesk']) ?></h4>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
</section>