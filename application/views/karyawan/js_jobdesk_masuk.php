<script src="<?= base_url() ?>assets/js/vendor/footable/footable.all.min.js"></script>
<script src="<?= base_url() ?>assets/js/vendor/raty-fa/jquery.raty-fa.js"></script>
<script src="<?= base_url() ?>assets/js/vendor/typeahead/typeahead.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/js/vendor/handlebars/handlebars-v3.0.3.js"></script>
<script src="<?= base_url() ?>assets/js/page/ui-general.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-ui.js"></script>

<script>
    $(document).ready(function(){
        var url_all_jobdesk = '<?= base_url().'ajax/get_all_jobdesk/'.$this->session->userdata('user')->id_bagian.'/' ?>';

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
                $.post(url_all_jobdesk,
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
        //function end


        //call start
        get_jobdesk();
        $(window).load(function () {
			    $('#jobdeskList').footable();
		});
        //call end
    });
</script>