<div class="modal fade" id="editJobdeskModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Jobdesk</h4>
			</div>
			<div class="modal-body">
				<form id="formEditUser" enctype="multipart/form-data" method="POST" class="form-horizontal" role="form">

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

		function get_assign(){
			$.post('<?= base_url('ajax/get_assign') ?>',
                function(data,status){
					let isi = ``;
					$.each($.parseJSON(data),function(i, item){
						isi += `
							<li class="media">
								<div class="media-img"><i class="fa fa-check"></i></div>
								<div class="media-body">
									<div class="media-heading text-success"> <small class="pull-right text-muted">${item.created_at}</small>
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

		function get_komentar(){
			var id_jobdesk = '<?= $this->uri->segment(3) ?>';
			$.post('<?= base_url('ajax/get_komentar') ?>',{id_jobdesk:id_jobdesk},
                function(data,status){
					let isi = ``;
					$.each($.parseJSON(data),function(i, item){
						isi += `
							<li class="media">
								<div class="media-img"><i class="fa fa-user"></i></div>
								<div class="media-body">
									<div class="media-heading">${item.nama} <small class="pull-right text-muted">${item.created_at}</small></div>
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
						isi += `
										<li>
											<div class="checkbox">
												<label>
													<input type="checkbox" name="optionsCheckboxes"
														<?= ($this->session->userdata('user')->hak_akses == 'Karyawan') ? 'onclick="return false"' : '' ?>>
													${item.isi_item}</label> <button type="button" class="btn btn-danger delete">
													<i class="glyphicon glyphicon-trash"></i>
												</button>
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
	});
</script>
