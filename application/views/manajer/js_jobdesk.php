<div class="modal fade" id="validasiUserModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail User  <button data-idUser="" class="btn btn-warning editUser" data-toggle="modal" data-target="#editUserModal">Edit</button> <button data-idUser="" class="btn btn-danger hapusUser">Hapus</button> </h4>
 
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
                <form id="formEditUser" enctype="multipart/form-data" method="POST" class="form-horizontal" role="form">
                                    
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
                                            <input id="edit_nametag" type="file" name="nametag" class="filestyle" data-buttonText="Upload Nametag" data-iconName="fa fa-inbox">
                                        </div>
                                    </div>
                                    <hr class="line-dashed full-witdh-line" />
                                    
                                </form>
                </div>
                <div class="modal-footer">
                    <button id="editUser" data-idUser="" type="button" class="aktifkan btn btn-raised btn-success" data-dismiss="modal">Edit</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahJobdeskModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Jobdesk</h4>
                </div>
                <div class="modal-body">
                <form id="formTambahJobdesk" enctype="multipart/form-data" method="POST" class="form-horizontal" role="form">
                                    
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Kepada</label>
                                        <div class="col-sm-10">
                                        <span class="help-block mb-0">
                                        Arti Warna : <br>
                                        <div class="btn btn-raised btn-success btn-sm"></div> : Beban Kerja Ringan <br>
                                        <div class="btn btn-raised btn-warning btn-sm"></div> : Beban Kerja Sedang <br>
                                        <div class="btn btn-raised btn-primary btn-sm"></div> : Beban Kerja Berat
                                        </span>
                                            <select data-id="" id="pilih_karyawan" tabindex="3" name="kepada" class="chosen-select" style="width: 400px;">
                                                <option value="" disabled selected>Pilih Karyawan</option>
                                             
                                            </select>
                                        </div>
                                    </div>
                                    <hr class="line-dashed full-witdh-line" />
                                    <div class="form-group">
                                        <label for="input03" class="col-sm-2 control-label">Judul</label>
                                        <div class="col-sm-10">
                                            <input id="tambah_judul" type="text" name="judul" class="form-control" id="input03">
                                            <span class="help-block mb-0">Subject Jobdesk.</span>
                                        </div>
                                    </div>
                                    <hr class="line-dashed full-witdh-line" />
                                    <div class="form-group">
                                        <label for="input04" class="col-sm-2 control-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <input id="tambah_deskripsi" type="text" name="deskripsi" class="form-control" id="input04">
                                            <span class="help-block mb-0">Deskripsi Jobdesk.</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="input04" class="col-sm-2 control-label">Waktu Deadline</label>
                                        <div class="col-sm-10">
                                            <input id="deadline" type="text" name="deadline" class="form-control">
                                            <span class="help-block mb-0">Waktu Deadline.</span>
                                        </div>
                                    </div>
                                    <hr class="line-dashed full-witdh-line" />
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Lampiran (.zip)</label>
                                        <div class="col-sm-10">
                                            <input id="tambah_lampiran" type="file" name="lampiran" class="filestyle" data-buttonText="Upload Lampiran" data-iconName="fa fa-inbox">
                                        </div>
                                    </div>
                                    <hr class="line-dashed full-witdh-line" />
                                    
                                </form>
                </div>
                <div class="modal-footer">
                    <button id="aksiTambahJobdesk" data-idUser="" type="button" class="btn btn-raised btn-success" data-dismiss="modal">Tambahkan</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
                </div>
            </div>
        </div>
    </div>

  
    <script src="<?= base_url() ?>assets/js/vendor/footable/footable.all.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/raty-fa/jquery.raty-fa.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/typeahead/typeahead.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/handlebars/handlebars-v3.0.3.js"></script>
    <script src="<?= base_url() ?>assets/js/page/ui-general.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery-ui.js"></script>
      

    <script>
        $(document).ready(function(){
            var base = '<?= base_url() ?>';
            var url_edit = '<?= base_url().'ajax/update_jobdesk/' ?>';
            var url_tambah = '<?= base_url().'ajax/insert_jobdesk/' ?>';
            var url_all_jobdesk = '<?= base_url().'ajax/get_all_jobdesk/'.$this->session->userdata('user')->id_bagian.'/' ?>';
            var url_jobdesk_belum = '<?= base_url().'ajax/get_jobdesk_belum/'.$this->session->userdata('user')->id_bagian.'/' ?>';
            var url_jobdesk_selesai = '<?= base_url().'ajax/get_jobdesk_selesai/'.$this->session->userdata('user')->id_bagian.'/' ?>';
            var url_delete_jobdesk = '<?= base_url().'ajax/delete_jobdesk/' ?>';
            var url_all_beban = '<?= base_url().'ajax/get_all_beban/'.$this->session->userdata('user')->id_bagian.'/' ?>';
            var dataDetail;
            var DateDiff = {
                inDays: function(d1, d2) {
                    var t2 = d2.getTime();
                    var t1 = d1.getTime();

                    return parseInt((t2-t1)/(24*3600*1000));
                },

                inWeeks: function(d1, d2) {
                    var t2 = d2.getTime();
                    var t1 = d1.getTime();

                    return parseInt((t2-t1)/(24*3600*1000*7));
                },

                inMonths: function(d1, d2) {
                    var d1Y = d1.getFullYear();
                    var d2Y = d2.getFullYear();
                    var d1M = d1.getMonth();
                    var d2M = d2.getMonth();

                    return (d2M+12*d2Y)-(d1M+12*d1Y);
                },

                inYears: function(d1, d2) {
                    return d2.getFullYear()-d1.getFullYear();
                }
            }

            //function start
        
            function get_jobdesk() {
                $.post(url_jobdesk_belum,
                function(data,status){
                    let isi;
                    let jumlah = $.parseJSON(data).length;
                    $.each($.parseJSON(data),function(i, item){
                        d1 = new Date(item.created_at_tugas);
                        d2 = new Date(item.deadline);
                        if(item.deadline != null && item.deadline != '0000-00-00') {
                            if(DateDiff.inDays(d1, d2) > 0) {
                                var deadline = DateDiff.inDays(d1, d2)+` hari mendatang `;
                            } else {
                                var deadline = 'Telat '+DateDiff.inDays(d1, d2)*-1+` hari`;
                            }
                        } else {
                            var deadline = 'Tidak ada deadline';
                        }
                        isi += 
                        `
                        <tr>
												<td>
															<input type="checkbox" name="optionsCheckboxes" style="width:20px;height:20px;">
													
												</td>
            
												<td class="jobdesk-`+item.id_jobdesk+`">`+jumlah+`</td>
												<td class="kepada-`+item.id_jobdesk+`">`+item.kepada+`</td>
                                                <td class="judul-`+item.id_jobdesk+`">`+item.judul+`</td>
                                                <td class="status-`+item.id_jobdesk+`">`+item.status_jobdesk+`</td>
                                                <td class="deadline-`+item.id_jobdesk+`">`+deadline+`</td>
                                                <td>
                                                    <a href="<?= base_url() ?>jobdesk/detail/`+item.id_jobdesk+`"><button data-idJobdesk="`+item.id_jobdesk+`" class="btn btn-primary detailJobdesk">Lihat Detail</button></a>
                                                </td>
												
                                            </tr>
                        `;
                        //console.log(isi);
                        $('#isiTabelJobdesk').html(isi);
                        jumlah--;
                    });
                    if(isi == null){
                        isi += 
                        `
                        <tr>
												<td colspan="7" align="center">
													Maaf data kosong
													
												</td>									
                                            </tr>
                        `;
                        $('#isiTabelJobdesk').html(isi);
                    }
                });
            }

            function get_all_beban() {
                $.post(url_all_beban, function(data,status){
                    let isi;
                    $.each($.parseJSON(data), function(i, item){
                        if(item.beban_kerja == 'Ringan'){
                            isi += `
                                <option class="text text-success" value="`+item.id_user+`">`+item.nama+` | Jumlah tugas : `+item.jumlah_tugas+`</option>
                            `;
                        } else if(item.beban_kerja == 'Sedang'){
                            isi += `
                                <option class="text text-warning" value="`+item.id_user+`">`+item.nama+` | Jumlah tugas : `+item.jumlah_tugas+`</option>
                            `;
                        } else if(item.beban_kerja == 'Berat'){
                            isi += `
                                <option class="text text-danger" value="`+item.id_user+`">`+item.nama+`  | Jumlah tugas : `+item.jumlah_tugas+`</option>
                            `;
                        }
                    });
                    $('#pilih_karyawan').append(isi);
                });
            }
            //Function End


            //calling function start
            get_jobdesk();
            get_all_beban();
            $("#deadline").datepicker();
            
            $(window).load(function () {
			    $('#jobdeskList').footable();
		    });
            //calling function end



            //Event Start -----------------------------------------
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

            $(document).on('click', "#aktifkan",function(){
                var id_user = $(this).attr('data-idUser');
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
                        $.post(url_aktifkan,{id_user: id_user},
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

            $(document).on('click', "#blokir",function(){
                var id_user = $(this).attr('data-idUser');
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
                    $.post(url_blokir,{id_user: id_user},
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
            
           

            $(document).on('click', ".editUser",function(){
                $('#edit_nik').val($('#detail_nik').html());
                $('#edit_nama').val($('#detail_nama').html());
                $('#edit_alamat').val($('#detail_alamat').html());
                $('#edit_email').val($('#detail_email').html());
                $('#edit_jabatan').attr('data-id',$('#detail_jabatan').attr('data-id'));
                $('#edit_divisi').attr('data-id',$('#detail_divisi').attr('data-id'));
                $('#edit_bagian').attr('data-id',$('#detail_bagian').attr('data-id'));
                $('#editUser').attr('data-iduser',$(this).attr('data-iduser'));
                var id_divisi = $('#detail_divisi').attr('data-id');
              
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

            $(document).on('click', ".detailUser",function(){
                dataDetail = $(this);
                detail($(this));
            });

        $(document).on('click', "#editUser",function(e){
            e.preventDefault();
            // var editNik = $('#edit_nik').val();
            // var editNama = $('#edit_nama').val();
            // var editAlamat = $('#edit_alamat').val();
            // var editEmail = $('#edit_email').val();
            // var editJabatan = $('#edit_jabatan').val();
            // var editDivisi = $('#edit_divisi').val();
            // var editBagian = $('#edit_bagian').val();
            // var editNametag = $('#edit_nametag')[0].files[0];
            var form = $('#formEditUser')[0];
            var formEditUser = new FormData(form);
            var files = $('#edit_nametag')[0].files[0];
            formEditUser.append('id_user',$(this).attr('data-iduser'));
            
            $.ajax({
                url: url_edit,
                type: 'post',
                data: formEditUser,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response != 0){
                        //$("#img").attr("src",response);
                        detail(dataDetail);
                        get_user();
                        //console.log(response); 
                    }else{
                        alert('file not uploaded');
                    }
                },
            });

        });

        $(document).on('click', "#aksiTambahJobdesk",function(e){
            e.preventDefault();
            var form = $('#formTambahJobdesk')[0];
            var formTambahUser = new FormData(form);
            
            $.ajax({
                url: url_tambah,
                type: 'post',
                data: formTambahUser,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response != 0){
                        //$("#img").attr("src",response);
                        //detail(dataDetail);
                        //console.log(response); 
                        get_jobdesk();
                        form.reset();
                        Swal.fire(
                            'Berhasil!',
                            'Menambahkan jobdesk.',
                            'success'
                        );
                    }else{
                        alert('file not uploaded');
                    }
                },
            });
        });

        $(document).on('click', "#tambahUser",function(e){
            e.preventDefault();
            $.post(url_jabatan,
                    function(data,status) {
                        let jabatan = '<option value="" disabled selected>Pilih Jabatan</option>';
                        $.each($.parseJSON(data), function(i, item){
                                jabatan += '<option value="'+item.id_jabatan+'">'+item.nama_jabatan+'</option>';   
                        });
                        $('#tambah_jabatan').html(jabatan);
                    }
                );
                $.post(url_divisi,
                    function(data,status) {
                        let divisi = '<option value="" disabled selected>Pilih Divisi</option>';
                        $.each($.parseJSON(data), function(i, item){
                                divisi += '<option value="'+item.id_divisi+'">'+item.nama_divisi+'</option>';
                        });
                        $('#tambah_divisi').html(divisi);
                    }
                );
        });

        $(document).on('click', ".hapusUser",function(){
            var id_user = $(this).attr('data-idUser');
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Akan menghapus user ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, Hapus!',
                cancelButtonText: 'Batalkan',
                }).then((result) => {
                if (result.value) {
                        $.post(url_delete_user,{id_user: id_user},
                        function(data,status) {
                            Swal.fire(
                            'Dihapus!',
                            'User sudah terhapus.',
                            'success'
                            );
                            $('#validasiUserModal').modal('toggle');
                            get_user();
                        }
                    );  
                    
                }
            });
        });


        //penutup ready
        });
</script>