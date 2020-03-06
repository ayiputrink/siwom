<div class="modal fade" id="validasiUserModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail User</h4>
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
                            <td id="detail_jabatan"></td>
                        </tr>
                        <tr>
                            <td>Divisi</td>
                            <td> : </td>
                            <td id="detail_divisi"></td>
                        </tr>
                        <tr>
                            <td>Bagian</td>
                            <td> : </td>
                            <td id="detail_bagian"></td>
                        </tr>
                        <tr>
                            <td>Nametag</td>
                            <td> : </td>
                            <td id="detail_nametag"></td>
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
            $('#verifikasi_select_divisi').change(function(){
                let id_divisi = $(this).val();
                let url = '<?= base_url().'ajax/get_bagian/' ?>';
                //console.log(url);
                $.post(url,{id_divisi: id_divisi},
                    function(data,status) {
                        let isi = '<option value="" disabled selected>Pilih Bagian Divisi</option>';
                        $.each($.parseJSON(data), function(i, item){
                            isi += '<option value="'+item.id_bagian+'">'+item.nama_bagian+'</option>';
                        });
                        $('#verifikasi_select_bagian').html(isi);
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
                        let divisi;
                        let bagian;
                        let nametag;
                        //console.log(data);
                        $.each($.parseJSON(data), function(i, item){
                            nik = item.nik;
                            nama = item.nama;
                            alamat = item.alamat;
                            email = item.email;
                            jabatan = item.nama_jabatan;
                            divisi = item.nama_divisi;
                            bagian = item.nama_bagian;
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
                        $('#detail_divisi').html(divisi);
                        $('#detail_bagian').html(bagian);
                        $('#detail_nametag').html(gambar);
                        $('#aktifkan').attr('data-idUser',id_user);
                        $('#blokir').attr('data-idUser',id_user);
                    }
                );
            });
        });
        </script>
<!--/ Page Specific Scripts --> 