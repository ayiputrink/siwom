<div class="modal fade" id="editJobdeskModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Jobdesk</h4>
			</div>
			<div class="modal-body">
				<form id="formEditJobdesk" enctype="multipart/form-data" method="POST" class="form-horizontal" role="form">

					<hr class="line-dashed full-witdh-line" />
					<div class="form-group">
						<label for="input03" class="col-sm-2 control-label">Judul</label>
						<div class="col-sm-10">
							<input id="edit_judul" type="text" name="judul" class="form-control" id="input03">
							<span class="help-block mb-0">Judul Jobdesk.</span>
						</div>
					</div>
					<hr class="line-dashed full-witdh-line" />
					<div class="form-group">
						<label for="input03" class="col-sm-2 control-label">Deskripsi</label>
						<div class="col-sm-10">
							<input id="edit_deskripsi" type="text" name="deskripsi" class="form-control" id="input03">
							<span class="help-block mb-0">Deskripsi Jobdesk.</span>
						</div>
					</div>
					<hr class="line-dashed full-witdh-line" />
					<div class="form-group">
						<label class="col-sm-2 control-label">Lampiran</label>
						<div class="col-sm-10">
							<input id="edit_lampiran" type="file" name="lampiran" class="filestyle"
								data-buttonText="Lampiran" data-iconName="fa fa-inbox">
						</div>
					</div>
					<hr class="line-dashed full-witdh-line" />
					<div class="form-group">
						<label for="input04" class="col-sm-2 control-label">Waktu Deadline</label>
						<div class="col-sm-10">
							<input id="edit_deadline" type="text" name="deadline" class="form-control">
							<span class="help-block mb-0">Waktu Deadline.</span>
						</div>
					</div>
                    <hr class="line-dashed full-witdh-line" />
					<div class="form-group">
						<label class="col-sm-2 control-label">Status Jobdesk</label>
						<div class="col-sm-10">
							<select data-id="" id="edit_status_jobdesk" tabindex="3" name="status_jobdesk" class="chosen-select"
								style="width: 400px;">
								<option value="" disabled selected>Pilih Status</option>
								
							</select>
						</div>
					</div>
					<hr class="line-dashed full-witdh-line" />


				</form>
			</div>
			<div class="modal-footer">
				<button id="aksiEditJobdesk" data-idJobdesk="" type="button" class="aktifkan btn btn-raised btn-success"
					data-dismiss="modal">Edit</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
			</div>
		</div>
	</div>
</div>

<script src="<?= base_url() ?>assets/js/jquery-ui.js"></script>

<script>
	$(document).ready(function(){
		var base_url = '<?= base_url() ?>';
		$('#btnKumpulJobdesk').click(function(e){
			e.preventDefault();
			var form = $('#formAssign')[0];
            var formAssign = new FormData(form);
            var files = $('#assignLampiran')[0].files[0];
			var id_jobdesk = '<?= $this->uri->segment(3) ?>';
			formAssign.append('id_jobdesk', id_jobdesk);
			$.ajax({
                url: '<?= base_url('ajax/insert_assignment') ?>',
                type: 'post',
                data: formAssign,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response != 0){
                        // detail(dataDetail);
                        // get_user(); 
						form.reset();
						get_assign();
						Swal.fire(
                            'Berhasil!',
                            'Mengumpulkan Jobdesk.',
                            'success'
                            );
                    }else{
                        alert('file not uploaded');
                    }
                },
            });
		});

		$('#aksiKomentar').click(function(e){
			e.preventDefault();
			form = new FormData();
			var id_jobdesk = '<?= $this->uri->segment(3) ?>';
			var isi_komentar = $('#isiKomentar').val();
			if(isi_komentar == null || isi_komentar == ''){
				Swal.fire(
                            'Perhatian!',
                            'Kolom komentar tidak boleh kosong.',
                            'warning'
                            );
				return false;
			}
			var id_user = '<?= $this->session->userdata('user')->id_user ?>';
			form.append('id_jobdesk', id_jobdesk);
			form.append('isi_komentar', isi_komentar);
			form.append('id_user', id_user);
			$.ajax({
                url: '<?= base_url('ajax/insert_komentar') ?>',
                type: 'post',
                data: form,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response != 0){
                        // detail(dataDetail);
                        // get_user(); 
						$('#isiKomentar').val('');
						get_komentar();
                    }else{
                        alert('file not uploaded');
                    }
                },
            });
		});

		$('#aksiItem').click(function(e){
			e.preventDefault();
			form = new FormData();
			var id_jobdesk = '<?= $this->uri->segment(3) ?>';
			var isi_item = $('#isiItem').val();
			if(isi_item == null || isi_item == ''){
				Swal.fire(
                            'Perhatian!',
                            'Kolom item tidak boleh kosong.',
                            'warning'
                            );
				return false;
			}
			var id_user = '<?= $this->session->userdata('user')->id_user ?>';
			form.append('id_jobdesk', id_jobdesk);
			form.append('isi_item', isi_item);
			$.ajax({
                url: '<?= base_url('ajax/insert_item_jobdesk') ?>',
                type: 'post',
                data: form,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response != 0){
                        // detail(dataDetail);
                        // get_user(); 
						$('#isiItem').val('');
						Swal.fire(
                            'Berhasil!',
                            'Menambahkan Item Jobdesk.',
                            'success'
                            );
						get_item();
                    }else{
                        alert('file not uploaded');
                    }
                },
            });
		});

		$('#hapusJobdesk').click(function(){
			var id_jobdesk = '<?= $this->uri->segment(3) ?>';
			Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Akan menghapus Jobdesk Ini ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, Hapus!',
                cancelButtonText: 'Batalkan',
                }).then((result) => {
                if (result.value) {
                    $.post('<?= base_url('ajax/delete_jobdesk/') ?>',{id_jobdesk: id_jobdesk},
                        function(data,status) {
                            Swal.fire(
                            'Berhasil!',
                            'Berhasil Menghapus Jobdesk.',
                            'success'
                            );
							window.setTimeout(function(){
							// Move to a new location or you can do something else
							window.location.href = "<?= base_url('jobdesk/karyawan/') ?>";
							}, 3000);
                        }
                    );
                }
                });
		});

		$('#editJobdesk').click(function(){
			var id_jobdesk = '<?= $this->uri->segment(3) ?>'; 
			$.post('<?= base_url('ajax/get_jobdesk_detail/') ?>',{id_jobdesk:id_jobdesk},
				function(data,status){
					let jobdesk = $.parseJSON(data);
					$('#edit_judul').val(jobdesk[0].judul);
					$('#edit_deskripsi').val(jobdesk[0].deskripsi);
					let deadline = (jobdesk[0].deadline).split('-');
					$('#edit_deadline').val(deadline[1]+'/'+deadline[2]+'/'+deadline[0]);
					if(jobdesk[0].status_jobdesk == 'selesai'){
						$('#editStatusJobdesk').append(
							`
							<option value="belum selesai">Belum Selesai</option>
							<option value="selesai" selected>Selesai</option>
							`
						);
					} else if (jobdesk[0].status_jobdesk == 'belum selesai'){
						$('#edit_status_jobdesk').append(
							`
							<option value="belum selesai" selected>Belum Selesai</option>
							<option value="selesai">Selesai</option>
							`
						);
					}
				}
			);
		});

		function get_assign(){
			var hak_akses = '<?= $this->session->userdata('user')->hak_akses ?>';
			$.post('<?= base_url('ajax/get_assign') ?>',
                function(data,status){
					let isi = ``;
					$.each($.parseJSON(data),function(i, item){
						isi += `
							<li class="media">
								<div class="media-img"><i class="fa fa-check"></i></div>
								<div class="media-body">
									<div class="media-heading text-success"> <small class="pull-right text-muted">${item.created_at} 	${ (hak_akses == 'Karyawan') ? '<i data-idAssign="'+item.id_assign+'" class="glyphicon glyphicon-trash deleteAssign"></i>' : ''} </small>
									</div>
									<small>${item.deskripsi}. <a href="${base_url}upload/lampiran_assignment/${item.lampiran}" target="_blank">Unduh File</a></small>
								</div>
							</li>
						`;
					});
					$('#kontenAssign').html(isi);
				}
			);
		}

		$('#aksiEditJobdesk').click(function(){
			var id_jobdesk = '<?= $this->uri->segment(3); ?>';
			var formEditJobdesk = new FormData($('#formEditJobdesk')[0]);
			formEditJobdesk.append('id_jobdesk',id_jobdesk);
			$.ajax({
                url: '<?= base_url('ajax/update_jobdesk/') ?>',
                type: 'post',
                data: formEditJobdesk,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response != 0){
                        location.reload();
						//console.log(formEditJobdesk); 
                    }else{
                        alert('file not uploaded');
                    }
                },
            });
		});

		$(document).on('click','.deleteItem',function(e){
			e.preventDefault();
			var id_item_jobdesk = $(this).attr('data-idItemJobdesk');
			Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Akan menghapus Item Jobdesk Ini ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, Hapus!',
                cancelButtonText: 'Batalkan',
                }).then((result) => {
                if (result.value) {
                    $.post('<?= base_url('ajax/delete_item_jobdesk/') ?>',{id_item_jobdesk: id_item_jobdesk},
                        function(data,status) {
                            Swal.fire(
                            'Berhasil!',
                            'Berhasil Menghapus Item Jobdesk.',
                            'success'
                            );
							get_item();
                        }
                    );
                }
                });
		});

		$(document).on('click','.deleteAssign',function(e){
			e.preventDefault();
			var id_assign = $(this).attr('data-idAssign');
			Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Akan menghapus Jobdesk yang telah dikumpulkan Ini ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, Hapus!',
                cancelButtonText: 'Batalkan',
                }).then((result) => {
                if (result.value) {
                    $.post('<?= base_url('ajax/delete_assign_jobdesk/') ?>',{id_assign: id_assign},
                        function(data,status) {
                            Swal.fire(
                            'Berhasil!',
                            'Berhasil Menghapus Jobdesk yang dikumpulkan.',
                            'success'
                            );
							get_assign();
                        }
                    );
                }
                });
		});

		$(document).on('click','.deleteKomentar',function(e){
			e.preventDefault();
			var id_komentar = $(this).attr('data-idKomentar');
			Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Akan menghapus Komentar Ini ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, Hapus!',
                cancelButtonText: 'Batalkan',
                }).then((result) => {
                if (result.value) {
                    $.post('<?= base_url('ajax/delete_komentar/') ?>',{id_komentar: id_komentar},
                        function(data,status) {
                            Swal.fire(
                            'Berhasil!',
                            'Berhasil Menghapus Komentar.',
                            'success'
                            );
							get_komentar();
                        }
                    );
                }
                });
		});

		$(document).on('change','.cekbox-item',function(){
			var status_item;
			var id_item_jobdesk = $(this).attr('data-idItemJobdesk');
			if($(this).is(":checked")){
				status_item = 'selesai';
			} else {
				status_item = 'belum selesai';
			}
			$.post('<?= base_url('ajax/update_item_jobdesk') ?>',{status_item:status_item,id_item_jobdesk:id_item_jobdesk},
				function(data,status){
					Swal.fire(
                            'Berhasil!',
                            'Berhasil Memperbarui Item.',
                            'success'
                            );
				}
			);
		});

		function get_komentar(){
			var id_jobdesk = '<?= $this->uri->segment(3) ?>';
			var id_user_aktif = '<?= $this->session->userdata('user')->id_user ?>';
			$.post('<?= base_url('ajax/get_komentar') ?>',{id_jobdesk:id_jobdesk},
                function(data,status){
					let isi = ``;
					$.each($.parseJSON(data),function(i, item){
						isi += `
							<li class="media">
								<div class="media-img"><i class="fa fa-user"></i></div>
								<div class="media-body">
									<div class="media-heading">${item.nama} <small class="pull-right text-muted">${item.created_at}  ${( item.id_user == id_user_aktif ? '<i data-idKomentar="'+item.id_komentar+'" class="glyphicon red glyphicon-trash deleteKomentar"></i>' : '')}</small></div>
									<small>${item.isi_komentar}</small>
								</div>
							</li>
						`;
					});
					$('#kontenKomentar').html(isi);
				}
			);
		}

		function get_item(){
			var id_jobdesk = '<?= $this->uri->segment(3) ?>';
			$.post('<?= base_url('ajax/get_item_jobdesk') ?>',{id_jobdesk:id_jobdesk},
                function(data,status){
					let isi = ``;
					$.each($.parseJSON(data),function(i, item){
						let cek;
						if(item.status_item == 'belum selesai'){
							cek = '';
						} else if (item.status_item == 'selesai') {
							cek = 'checked';
						}
						isi += `
										<li>
											<div class="checkbox">
												<label>
													<input class="cekbox-item" data-idItemJobdesk="${item.id_item_jobdesk}" type="checkbox" name="optionsCheckboxes" <?= ($this->session->userdata('user')->hak_akses == 'Karyawan') ? 'onclick="return false"' : '' ?> ${cek}>
													<span class="checkbox-material"><span class="check"></span></span>
													${item.isi_item}</label> 
												<?= ($this->session->userdata('user')->hak_akses == 'Manajer') ? '<button id="deleteItem" data-idItemJobdesk="${item.id_item_jobdesk}" type="button" class="btn btn-danger deleteItem"><i class="glyphicon glyphicon-trash hapusItem"></i></button>' : ''?>
											</div>
										</li>
						`;
					});
					$('#kontenItem').html(isi);
					
				}
			);
		}

		//panggil
		get_assign();
		get_komentar();
		get_item();
		$("#edit_deadline").datepicker();
	});
</script>
