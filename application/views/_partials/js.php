<script src="<?= base_url() ?>assets/bundles/libscripts.bundle.js"></script>
    <script src="<?= base_url() ?>assets/bundles/vendorscripts.bundle.js"></script>

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
                var id_divisi = $(this).val();
                var url = '<?= base_url().'ajax/get_bagian/' ?>';
                //console.log(url);
                $.post(url,{id_divisi: id_divisi},
                    function(data,status) {
                        var isi = '<option value="" disabled selected>Pilih Bagian Divisi</option>';
                        $.each($.parseJSON(data), function(i, item){
                            isi += '<option value="'+item.id_bagian+'">'+item.nama_bagian+'</option>';
                        });
                        $('#verifikasi_select_bagian').html(isi);
                    }
                );
            });
        });
        </script>
<!--/ Page Specific Scripts --> 