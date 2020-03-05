
        <!--  CONTENT  -->
        <section id="content">
            <div class="page page-forms-common">
                <!-- bradcome -->
                <div class="b-b mb-10">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <h1 class="h3 m-0">Verifikasi Data</h1>
                            <small class="text-muted">Silahkan verifikasi untuk mendapatkan akses SIWOM</small>
                        </div>
                    </div>
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-md-12">

                        <section class="boxs">
                            <div class="boxs-header">
                                <h3 class="custom-font hb-blush">
                                    <strong>Form</strong> Verifikasi</h3>

                            </div>
                            <?php if($user->nametag != null) { ?>
                            <div class="boxs-body">
                                <h3>Terimakasih Sudah Melakukan Verifikasi Silahkan Tunggu Konfirmasi Oleh Admin</h3>
                            </div>
                            <?php } else { ?>
                            <div class="boxs-body">
                                <form enctype="multipart/form-data" method="POST" action="<?= base_url() ?>verifikasi/aksi_verifikasi/" class="form-horizontal" role="form">
                                    
                                    <hr class="line-dashed full-witdh-line" />
                                    <div class="form-group">
                                        <label for="input03" class="col-sm-2 control-label">NIK</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nik" class="form-control" id="input03">
                                            <span class="help-block mb-0">NIK karyawan.</span>
                                        </div>
                                    </div>
                                    <hr class="line-dashed full-witdh-line" />
                                    <div class="form-group">
                                        <label for="input04" class="col-sm-2 control-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="alamat" class="form-control" id="input04">
                                            <span class="help-block mb-0">Alamat karyawan.</span>
                                        </div>
                                    </div>
                                    <hr class="line-dashed full-witdh-line" />
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <select tabindex="3" name="id_jabatan" class="chosen-select" style="width: 400px;">
                                                <option value="" disabled selected>Pilih Jabatan</option>
                                                <?php foreach ($jabatan as $value) { ?>
                                                    <option value="<?= $value['id_jabatan'] ?>"><?= $value['nama_jabatan'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <hr class="line-dashed full-witdh-line" />
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Divisi</label>
                                        <div class="col-sm-10">
                                            <select tabindex="3" id="verifikasi_select_divisi" name="id_divisi" class="chosen-select" style="width: 400px;">
                                            <option value="" disabled selected>Pilih Divisi</option>
                                                <?php 
                                                foreach ($divisi as $value) {
                                                ?>
                                                <option value="<?= $value['id_divisi'] ?>"><?= $value['nama_divisi'] ?></option>    
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <hr class="line-dashed full-witdh-line" />
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Bagian</label>
                                        <div class="col-sm-10">
                                            <select tabindex="3" id="verifikasi_select_bagian" name="id_bagian" class="chosen-select" style="width: 400px;">
                                                <option value="" disabled selected>Pilih Bagian Divisi</option>

                                            </select>
                                        </div>
                                    </div>
                                    <hr class="line-dashed full-witdh-line" />
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nametag Karyawan</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="nametag" class="filestyle" data-buttonText="Upload Nametag" data-iconName="fa fa-inbox">
                                        </div>
                                    </div>
                                    <hr class="line-dashed full-witdh-line" />
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button type="submit" class="btn btn-raised btn-default">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <!--/ CONTENT -->
       