<div class="modal fade" id="validasiUserModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail User                    <button data-idUser="" class="btn btn-warning editUser" data-toggle="modal" data-target="#editUserModal">Edit</button></h4>
 
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <td width="100px">NIK</td>
                            <td width="10px"> : </td>
                            <td id="detail_nik"></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td> : </td>
                            <td id="detail_nama"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td> : </td>
                            <td id="detail_alamat"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td> : </td>
                            <td id="detail_email"></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td> : </td>
                            <td data-id="" id="detail_jabatan"></td>
                        </tr>
                        <tr>
                            <td>Divisi</td>
                            <td> : </td>
                            <td data-id="" id="detail_divisi"></td>
                        </tr>
                        <tr>
                            <td>Bagian</td>
                            <td> : </td>
                            <td data-id="" id="detail_bagian"></td>
                        </tr>
                        <tr>
                            <td>Nametag</td>
                            <td> : </td>
                            <td data-id="" id="detail_nametag"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button id="aktifkan" data-idUser="" type="button" class="aktifkan btn btn-raised btn-success" data-dismiss="modal">Aktifkan</button>
                    <button id="blokir" data-idUser="" type="button" class="blokir btn btn-raised btn-danger" data-dismiss="modal">Blokir</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editUserModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit User</h4>
                </div>
                <div class="modal-body">
                <form enctype="multipart/form-data" method="POST" action="<?= base_url() ?>verifikasi/aksi_verifikasi/" class="form-horizontal" role="form">
                                    
                                    <hr class="line-dashed full-witdh-line" />
                                    <div class="form-group">
                                        <label for="input03" class="col-sm-2 control-label">NIK</label>
                                        <div class="col-sm-10">
                                            <input id="edit_nik" type="text" name="nik" class="form-control" id="input03">
                                            <span class="help-block mb-0">NIK karyawan.</span>
                                        </div>
                                    </div>
                                    <hr class="line-dashed full-witdh-line" />
                                    <div class="form-group">
                                        <label for="input03" class="col-sm-2 control-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input id="edit_nama" type="text" name="nama" class="form-control" id="input03">
                                            <span class="help-block mb-0">Nama karyawan.</span>
                                        </div>
                                    </div>
                                    <hr class="line-dashed full-witdh-line" />
                                    <div class="form-group">
                                        <label for="input04" class="col-sm-2 control-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input id="edit_alamat" type="text" name="alamat" class="form-control" id="input04">
                                            <span class="help-block mb-0">Alamat karyawan.</span>
                                        </div>
                                    </div>
                                    <hr class="line-dashed full-witdh-line" />
                                    <div class="form-group">
                                        <label for="input04" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input id="edit_email" type="email" name="email" class="form-control" id="input04">
                                            <span class="help-block mb-0">Email karyawan.</span>
                                        </div>
                                    </div>
                                    <hr class="line-dashed full-witdh-line" />
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <select data-id="" id="edit_jabatan" tabindex="3" name="id_jabatan" class="chosen-select" style="width: 400px;">
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
                                            <select data-id="" id="edit_divisi" tabindex="3" id="verifikasi_select_divisi" name="id_divisi" class="verifikasi_select_divisi chosen-select" style="width: 400px;">
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
                                            <select data-id="" id="edit_bagian" tabindex="3" id="verifikasi_select_bagian" name="id_bagian" class="verifikasi_select_bagian chosen-select" style="width: 400px;">
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
                                    
                                </form>
                </div>
                <div class="modal-footer">
                    <button id="edit" data-idUser="" type="button" class="aktifkan btn btn-raised btn-success" data-dismiss="modal">Edit</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
                </div>
            </div>
        </div>
    </div>

<script src="<?= base_url() ?>assets/bundles/libscripts.bundle.js"></script>
    <script src="<?= base_url() ?>assets/bundles/vendorscripts.bundle.js"></script>
    
    <!-- <script src="<?= base_url() ?>assets/bundles/sweetalertscripts.bundle.js"></script> -->
    <script src="<?= base_url() ?>assets/js/sweetalert.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
    <script src="<?= base_url() ?>assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>     
    <script src="<?= base_url() ?>assets/js/vendor/animsition/js/jquery.animsition.min.js"></script> 
    <script src="<?= base_url() ?>assets/js/vendor/screenfull/screenfull.min.js"></script> 
    <script src="<?= base_url() ?>assets/js/vendor/slider/bootstrap-slider.min.js"></script> 
    <script src="<?= base_url() ?>assets/js/vendor/colorpicker/js/bootstrap-colorpicker.min.js"></script> 
    <script src="<?= base_url() ?>assets/js/vendor/touchspin/jquery.bootstrap-touchspin.min.js"></script> 
    <script src="<?= base_url() ?>assets/js/vendor/daterangepicker/moment.min.js"></script> 
    <script src="<?= base_url() ?>assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script> 
    <script src="<?= base_url() ?>assets/js/vendor/chosen/chosen.jquery.min.js"></script> 
    <script src="<?= base_url() ?>assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script> 

    <!--  Custom JavaScripts -->
    <script src="<?= base_url() ?>assets/bundles/mainscripts.bundle.js"></script>

    <script >
        $(window).load(function(){
            $('#ex1').slider({
                formatter: function(value) {
                    return 'Current value: ' + value;
                }
            });
            $("#ex1").on("slide", function(slideEvt) {
                $("#ex1SliderVal").text(slideEvt.value);
            });

            $("#ex2, #ex3, #ex4, #ex5").slider();
          
            //*load wysiwyg editor
        });
    </script> 

        <script>
        $(document).ready(function(){
            $('.verifikasi_select_divisi').change(function(){
                let id_divisi = $(this).val();
                let url = '<?= base_url().'ajax/get_bagian/' ?>';
                //console.log(url);
                $.post(url,{id_divisi: id_divisi},
                    function(data,status) {
                        let isi = '<option value="" disabled selected>Pilih Bagian Divisi</option>';
                        $.each($.parseJSON(data), function(i, item){
                            isi += '<option value="'+item.id_bagian+'">'+item.nama_bagian+'</option>';
                        });
                        $('.verifikasi_select_bagian').html(isi);
                    }
                );
            });

            $('#aktifkan').click(function(){
                var id_user = $(this).attr('data-idUser');
                var url = '<?= base_url() ?>Ajax/aktifkan_user/';
                Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Akan mengaktifkan user ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, Aktifkan!',
                cancelButtonText: 'Batalkan',
                }).then((result) => {
                if (result.value) {
                        $.post(url,{id_user: id_user},
                        function(data,status) {
                            Swal.fire(
                            'Diaktifkan!',
                            'User sudah aktif.',
                            'success'
                            );
                            $('.status-'+id_user).html('active');
                        }
                    );  
                    
                }
                });
            });

            $('#blokir').click(function(){
                var id_user = $(this).attr('data-idUser');
                var url = '<?= base_url() ?>Ajax/blokir_user/';
                Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Akan memblokir user ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, Blokir!',
                cancelButtonText: 'Batalkan',
                }).then((result) => {
                if (result.value) {
                    $.post(url,{id_user: id_user},
                        function(data,status) {
                            Swal.fire(
                            'Diblokir!',
                            'User sudah terblokir.',
                            'success'
                            );
                            $('.status-'+id_user).html('suspend');
                        }
                    );
                    
                }
                });
            });

            $('.editUser').click(function(){
                $('#edit_nik').val($('#detail_nik').html());
                $('#edit_nama').val($('#detail_nama').html());
                $('#edit_alamat').val($('#detail_alamat').html());
                $('#edit_email').val($('#detail_email').html());
                $('#edit_jabatan').attr('data-id',$('#detail_jabatan').attr('data-id'));
                $('#edit_divisi').attr('data-id',$('#detail_divisi').attr('data-id'));
                $('#edit_bagian').attr('data-id',$('#detail_bagian').attr('data-id'));
                var id_divisi = $('#detail_divisi').attr('data-id');
                var url_jabatan = '<?= base_url() ?>Ajax/get_jabatan/';
                var url_divisi = '<?= base_url() ?>Ajax/get_all_divisi/';
                var url_bagian = '<?= base_url() ?>Ajax/get_bagian/';
                $.post(url_jabatan,
                    function(data,status) {
                        let jabatan = '<option value="" disabled selected>Pilih Jabatan</option>';
                        $.each($.parseJSON(data), function(i, item){
                            if(item.id_jabatan == $('#edit_jabatan').attr('data-id')){
                                jabatan += '<option value="'+item.id_jabatan+'" selected>'+item.nama_jabatan+'</option>';
                            } else {
                                jabatan += '<option value="'+item.id_jabatan+'">'+item.nama_jabatan+'</option>';
                            }
                            
                        });
                        $('#edit_jabatan').html(jabatan);
                    }
                );
                $.post(url_divisi,
                    function(data,status) {
                        let divisi = '<option value="" disabled selected>Pilih Divisi</option>';
                        $.each($.parseJSON(data), function(i, item){
                            if(item.id_divisi == $('#edit_divisi').attr('data-id')){
                                divisi += '<option value="'+item.id_divisi+'" selected>'+item.nama_divisi+'</option>';
                            } else {
                                divisi += '<option value="'+item.id_divisi+'">'+item.nama_divisi+'</option>';
                            }
                        });
                        $('#edit_divisi').html(divisi);
                    }
                );
                $.post(url_bagian,{id_divisi: id_divisi},
                    function(data,status) {
                        let bagian = '<option value="" disabled selected>Pilih Bagian Divisi</option>';
                        $.each($.parseJSON(data), function(i, item){
                            if(item.id_bagian == $('#edit_bagian').attr('data-id')){
                                bagian += '<option value="'+item.id_bagian+'" selected>'+item.nama_bagian+'</option>';
                            } else {
                                bagian += '<option value="'+item.id_bagian+'">'+item.nama_bagian+'</option>';
                            }
                        });
                        $('#edit_bagian').html(bagian);
                    }
                );
            });

            $('.detailUser').click(function(){
                var id_user = $(this).attr('data-idUser');
                let url = '<?= base_url().'ajax/get_detail_user/' ?>';
                $.post(url,{id_user: id_user},
                    function(data,status) {
                        let nik;
                        let nama;
                        let alamat;
                        let email;
                        let jabatan;
                        let id_jabatan;
                        let divisi;
                        let id_divisi;
                        let bagian;
                        let id_bagian;
                        let nametag;
                        //console.log(data);
                        $.each($.parseJSON(data), function(i, item){
                            nik = item.nik;
                            nama = item.nama;
                            alamat = item.alamat;
                            email = item.email;
                            jabatan = item.nama_jabatan;
                            id_jabatan = item.id_jabatan;
                            divisi = item.nama_divisi;
                            id_divisi = item.id_divisi;
                            bagian = item.nama_bagian;
                            id_bagian = item.id_bagian;
                            nametag = item.nametag;
                        });
                        //console.log(nametag);
                        if(nametag != null) {
                            var src = '<?= base_url() ?>upload/user/'+nametag;
                            var gambar = '<img src="'+src+'" width="400px" height="300px" alt="nametag">';
                        } else {
                            var gambar = 'User belum mengunggah gambar';
                        }
                        
                        $('#detail_nik').html(nik);
                        $('#detail_nama').html(nama);
                        $('#detail_alamat').html(alamat);
                        $('#detail_email').html(email);
                        $('#detail_jabatan').html(jabatan);
                        $('#detail_jabatan').attr('data-id',id_jabatan);
                        $('#detail_divisi').html(divisi);
                        $('#detail_divisi').attr('data-id',id_divisi);
                        $('#detail_bagian').html(bagian);
                        $('#detail_bagian').attr('data-id',id_bagian);
                        $('#detail_nametag').html(gambar);
                        $('#aktifkan').attr('data-idUser',id_user);
                        $('#blokir').attr('data-idUser',id_user);
                        $('.editUser').attr('data-idUser',id_user);
                    }
                );
            });
        });
        </script>
<!--/ Page Specific Scripts --> 