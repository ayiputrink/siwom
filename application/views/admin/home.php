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
                        <h3 class="mt-0"><?= $total_user ?> User</h3>
                        <p>Total User</p>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                <div class="boxs top_report_chart l-parpl">
                    <div class="boxs-body">
                        <h3 class="mt-0"><?= $tugas ?> Tugas</h3>
                        <p>Tugas Belum Selesai</p>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                <div class="boxs top_report_chart l-seagreen">
                    <div class="boxs-body">
                        <h3 class="mt-0"><?= $unverified ?> User</h3>
                        <p>User Belum Terverifikasi</p>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                <div class="boxs top_report_chart l-amber">
                    <div class="boxs-body">
                        <h3 class="mt-0"><?= $blocked ?> User</h3>
                        <p>User Diblokir</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="boxs top_report_chart l-slategray">
                    <div class="boxs-body">
                        <h3 class="mt-0 center text-center"><?= $data_training ?> Jumlah</h3>
                        <p class="center-block text-center">Data Training</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>