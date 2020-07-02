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

        <?php if($is_kuesioner) { ?>
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-cyan">
                        <strong>Kuesioner </strong>Karyawan</h3>
                </div>
                <div class="boxs-body">
                    <p>Anda telah bekerja di perusahaan ini lebih dari 1 bulan, silahkan berikan tanggapan anda mengenai beban kerja.</p>

                    <form method="POST" action="<?= base_url() ?>home/isi_kuesioner" role="form">
                        <div class="form-group">
                            <h4>1. Saya mengerjakan banyak pekerjaan setiap harinya yang harus segera diselesaikan ?</h4>
                            <select name="soal1" class="chosen-select" style="width: 100%" id="" required>
                                <option value="" disabled selected>Pilih Opsi</option>
                                <option value="1">Tidak Berat</option>
                                <option value="2">Sedang</option>
                                <option value="3">Berat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h4>2. Target yang harus saya capai dalam pekerjaan terlalu tinggi ?</h4>
                            <select name="soal2" class="chosen-select" style="width: 100%" id="" required>
                                <option value="" disabled selected>Pilih Opsi</option>
                                <option value="1">Tidak Berat</option>
                                <option value="2">Sedang</option>
                                <option value="3">Berat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h4>3. Saya mendapatkan dan menyelesaikan pekerjaan dengan tingkat kesulitan yang tinggi ?</h4>
                            <select name="soal3" class="chosen-select" style="width: 100%" id="" required>
                                <option value="" disabled selected>Pilih Opsi</option>
                                <option value="1">Tidak Berat</option>
                                <option value="2">Sedang</option>
                                <option value="3">Berat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h4>4. Tugas yang selalu diberikan terkadang sifatnya mendadak dengan jangka waktu yang singkat ?</h4>
                            <select name="soal4" class="chosen-select" style="width: 100%" id="" required>
                                <option value="" disabled selected>Pilih Opsi</option>
                                <option value="1">Tidak Berat</option>
                                <option value="2">Sedang</option>
                                <option value="3">Berat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h4>5. Pimpinan saya sering mengharuskan setiap pegawai memiliki target kerja baik di dalam maupun luar kantor</h4>
                            <select name="soal5" class="chosen-select" style="width: 100%" id="" required>
                                <option value="" disabled selected>Pilih Opsi</option>
                                <option value="1">Tidak Berat</option>
                                <option value="2">Sedang</option>
                                <option value="3">Berat</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-raised btn-primary">Kirim</button>
                    </form>
                </div>
            </section>
        </div>
        <?php } ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="boxs top_report_chart l-parpl">
                    <div class="boxs-body">
                        <h3 class="mt-0">Jobdesk Bagian <?= $this->session->userdata('user')->nama_bagian ?> : </h3>
                        <h4><?= ($data_bagian[0]['jobdesk_karyawan'] == '' || $data_bagian[0]['jobdesk_karyawan'] == null ? 'Data Jobdesk Tidak Ada' : $data_bagian[0]['jobdesk_karyawan']) ?></h4>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>