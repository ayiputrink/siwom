<script src="<?= base_url() ?>assets/js/vendor/footable/footable.all.min.js"></script>
<script src="<?= base_url() ?>assets/js/vendor/raty-fa/jquery.raty-fa.js"></script>
<script src="<?= base_url() ?>assets/js/vendor/typeahead/typeahead.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/js/vendor/handlebars/handlebars-v3.0.3.js"></script>
<script src="<?= base_url() ?>assets/js/page/ui-general.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-ui.js"></script>

<script>
    $(document).ready(function(){
        var url_all_tugas = '<?= base_url().'ajax/get_tugas_masuk/' ?>';

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
        function get_tugas() {
                $.post(url_all_tugas,
                function(data,status){
                    let isi;
                    let jumlah = $.parseJSON(data).length;
                    $.each($.parseJSON(data),function(i, item){
                        d1 = new Date(item.created_at_tugas);
                        d2 = new Date(item.deadline);
                        if(item.deadline != null && item.deadline != '0000-00-00') {
                            // if(DateDiff.inDays(d1, d2) > 0) {
                            //     var deadline = DateDiff.inDays(d1, d2)+` hari mendatang `;
                            // } else {
                            //     var deadline = 'Telat '+DateDiff.inDays(d1, d2)*-1+` hari`;
                            // }
                            var deadline = item.deadline;
                            var today = new Date();
                            var dd = String(today.getDate()).padStart(2, '0');
                            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                            var yyyy = today.getFullYear();

                            today = yyyy + '-' + mm + '-' + dd;
                            if(item.deadline < today && item.status_tugas != 'selesai'){
                                var warna_deadline = 'text-danger';
                            } else {
                                var warna_deadline = '';
                            }
                        } else {
                            var deadline = 'Tidak ada deadline';
                            var warna_deadline = '';
                        }
                        var progress = '';
                        $.post('<?= base_url() ?>'+'ajax/get_progress/'+item.id_tugas,function(result){
                            progress = $.parseJSON(result);
                            $('.progress-'+item.id_tugas).html(progress+'%');
                        });
                        isi += 
                        `
                        <tr>
												<td>
														
													
												</td>
            
												<td class="tugas-`+item.id_tugas+`">`+jumlah+`</td>
												<td class="kepada-`+item.id_tugas+`">`+item.kepada+`</td>
                                                <td class="judul-`+item.id_tugas+`">`+item.judul+`</td>
                                                <td class="progress-`+item.id_tugas+`"></td>
                                                <td class="status-`+item.id_tugas+`">`+item.status_tugas+`</td>
                                                <td class="deadline-`+item.id_tugas+` `+warna_deadline+`">`+deadline+`</td>
                                                <td>
                                                    <a href="<?= base_url() ?>tugas/detail/`+item.id_tugas+`"><button data-idtugas="`+item.id_tugas+`" class="btn btn-primary detailtugas">Lihat Detail</button></a>
                                                </td>
												
                                            </tr>
                        `;
                        //console.log(isi);
                        $('#isiTabeltugas').html(isi);
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
                        $('#isiTabeltugas').html(isi);
                    }
                });
            }
        //function end


        //call start
        get_tugas();
        $(window).load(function () {
			    $('#tugasList').footable();
		});
        //call end
    });
</script>