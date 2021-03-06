

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
    <script src="<?= base_url() ?>assets/js/datatables.min.js"></script> 
    <script src="<?= base_url() ?>assets/js/jquery-ui.js"></script>

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
            $('.cekNotifikasi').click(function(){
                var id_user = '<?= $this->session->userdata('user')->id_user ?>';
                let notifikasi = '';
                $.post('<?= base_url() ?>ajax/get_notifikasi',{id_user:id_user},function(value){
                    $.each($.parseJSON(value),function(i, item){
                        notifikasi += `
                                <li class="list-group-item">
                                    <a role="button" tabindex="0" class="media">
                                        <span class="pull-left media-object media-icon">
                                            <i class="fa fa-info-circle"></i>
                                        </span>
                                        <div class="media-body">
                                            <span class="block">${item.isi_notifikasi}</span>
                                            <!-- <small class="text-muted">8 texts</small> -->
                                        </div>
                                    </a>
                                </li>
                        `;
                    });
                    console.log(notifikasi);
                    if (notifikasi != '') {
                        $('.list-notifikasi').html(notifikasi);
                    }
                });
                
            });
            
             $("#tanggal").datepicker({
                dateFormat:'yy-mm-d'
             });
             
        });
    </script>

      
<!--/ Page Specific Scripts --> 