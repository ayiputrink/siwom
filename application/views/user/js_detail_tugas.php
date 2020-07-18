<div class="modal fade" id="edittugasModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Tugas</h4>
			</div>
			<div class="modal-body">
				<form id="formEdittugas" enctype="multipart/form-data" method="POST" class="form-horizontal" role="form">

					<hr class="line-dashed full-witdh-line" />
					<div class="form-group">
						<label for="input03" class="col-sm-2 control-label">Judul</label>
						<div class="col-sm-10">
							<input id="edit_judul" type="text" name="judul" class="form-control" id="input03">
							<span class="help-block mb-0">Judul Tugas.</span>
						</div>
					</div>
					<hr class="line-dashed full-witdh-line" />
					<div class="form-group">
						<label for="input03" class="col-sm-2 control-label">Deskripsi</label>
						<div class="col-sm-10">
							<input id="edit_deskripsi" type="text" name="deskripsi" class="form-control" id="input03">
							<span class="help-block mb-0">Deskripsi Tugas.</span>
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
						<label for="input03" class="col-sm-2 control-label">Kompleksitas</label>
						<div class="col-sm-10">
							<select data-id="" id="edit_kompleksitas" tabindex="3" name="kompleksitas" class="chosen-select"
								style="width: 400px;">
												
							</select>
							<span class="help-block mb-0">Kompleksitas Tugas.</span>
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
						<label class="col-sm-2 control-label">Status Tugas</label>
						<div class="col-sm-10">
							<select data-id="" id="edit_status_tugas" tabindex="3" name="status_tugas" class="chosen-select"
								style="width: 400px;">
								<option value="" disabled selected>Pilih Status</option>
								
							</select>
						</div>
					</div>
					<hr class="line-dashed full-witdh-line" />
					<div class="form-group">
						<label for="input03" class="col-sm-2 control-label">Feedback</label>
						<div class="col-sm-10">
							<select data-id="" id="edit_feedback" tabindex="3" name="feedback" class="chosen-select"
								style="width: 400px;">
												
							</select>
							<span class="help-block mb-0">Feedback Tugas.</span>
						</div>
					</div>
					<hr class="line-dashed full-witdh-line" />


				</form>
			</div>
			<div class="modal-footer">
				<button id="aksiEdittugas" data-idtugas="" type="button" class="aktifkan btn btn-raised btn-success"
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
		$('#btnKumpultugas').click(function(e){
			e.preventDefault();
			var form = $('#formAssign')[0];
            var formAssign = new FormData(form);
            var files = $('#assignLampiran')[0].files[0];
			var id_tugas = '<?= $this->uri->segment(3) ?>';
			formAssign.append('id_tugas', id_tugas);
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
                            'Mengumpulkan Tugas.',
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
			var id_tugas = '<?= $this->uri->segment(3) ?>';
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
			form.append('id_tugas', id_tugas);
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
			var id_tugas = '<?= $this->uri->segment(3) ?>';
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
			form.append('id_tugas', id_tugas);
			form.append('isi_item', isi_item);
			$.ajax({
                url: '<?= base_url('ajax/insert_item_tugas') ?>',
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
                            'Menambahkan Item Tugas.',
                            'success'
                            );
						get_item();
                    }else{
                        alert('file not uploaded');
                    }
                },
            });
		});

		$('#hapustugas').click(function(){
			var id_tugas = '<?= $this->uri->segment(3) ?>';
			Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Akan menghapus tugas Ini ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, Hapus!',
                cancelButtonText: 'Batalkan',
                }).then((result) => {
                if (result.value) {
                    $.post('<?= base_url('ajax/delete_tugas/') ?>',{id_tugas: id_tugas},
                        function(data,status) {
                            Swal.fire(
                            'Berhasil!',
                            'Berhasil Menghapus Tugas.',
                            'success'
                            );
							window.setTimeout(function(){
							// Move to a new location or you can do something else
							window.location.href = "<?= base_url('tugas/karyawan/') ?>";
							}, 3000);
                        }
                    );
                }
                });
		});

		$('#edittugas').click(function(){
			var id_tugas = '<?= $this->uri->segment(3) ?>'; 
			$.post('<?= base_url('ajax/get_tugas_detail/') ?>',{id_tugas:id_tugas},
				function(data,status){
					let tugas = $.parseJSON(data);
					$('#edit_judul').val(tugas[0].judul);
					$('#edit_deskripsi').val(tugas[0].deskripsi);
					let deadline = (tugas[0].deadline).split('-');
					$('#edit_deadline').val(deadline[1]+'/'+deadline[2]+'/'+deadline[0]);
					if(tugas[0].kompleksitas == 'tidak kompleks'){
						$('#edit_kompleksitas').append(
							`
							<option value="tidak kompleks" selected>Tidak Kompleks</option>
							<option value="sedang">Sedang</option>
							<option value="kompleks">Kompleks</option>
							`
						);
					} else if (tugas[0].kompleksitas == 'sedang'){
						$('#edit_kompleksitas').append(
							`
							<option value="tidak kompleks">Tidak Kompleks</option>
							<option value="sedang" selected>Sedang</option>
							<option value="kompleks">Kompleks</option>
							`
						);
					} else if (tugas[0].kompleksitas == 'kompleks'){
						$('#edit_kompleksitas').append(
							`
							<option value="tidak kompleks">Tidak Kompleks</option>
							<option value="sedang">Sedang</option>
							<option value="kompleks" selected>Kompleks</option>
							`
						);
					}
					if(tugas[0].status_tugas == 'selesai'){
						$('#edit_status_tugas').append(
							`
							<option value="belum selesai">Belum Selesai</option>
							<option value="selesai" selected>Selesai</option>
							`
						);
					} else if (tugas[0].status_tugas == 'belum selesai'){
						$('#edit_status_tugas').append(
							`
							<option value="belum selesai" selected>Belum Selesai</option>
							<option value="selesai">Selesai</option>
							`
						);
					}
					if(tugas[0].feedback == 'tidak puas'){
						$('#edit_feedback').append(
							`
							<option value="" disabled>Pilih Feedback</option>
							<option value="tidak puas" selected>Tidak Puas</option>
							<option value="cukup">Cukup</option>
							<option value="puas">Puas</option>
							`
						);
					} else if (tugas[0].feedback == 'cukup'){
						$('#edit_feedback').append(
							`
							<option value="" disabled>Pilih Feedback</option>
							<option value="tidak puas">Tidak Puas</option>
							<option value="cukup" selected>Cukup</option>
							<option value="puas">Puas</option>
							`
						);
					} else if (tugas[0].feedback == 'puas'){
						$('#edit_feedback').append(
							`
							<option value="" disabled>Pilih Feedback</option>
							<option value="tidak puas">Tidak Puas</option>
							<option value="cukup">Cukup</option>
							<option value="puas" selected>Puas</option>
							`
						);
					} else if (tugas[0].feedback == null){
						$('#edit_feedback').append(
							`
							<option value="" selected disabled>Pilih Feedback</option>
							<option value="tidak puas">Tidak Puas</option>
							<option value="cukup">Cukup</option>
							<option value="puas">Puas</option>
							`
						);
					}
				}
			);
		});

		function get_assign(){
			var hak_akses = '<?= $this->session->userdata('user')->hak_akses ?>';
			var id_tugas = '<?= $this->uri->segment(3) ?>';
			$.post('<?= base_url('ajax/get_assign_where/') ?>'+id_tugas,
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

		$('#aksiEdittugas').click(function(){
			var id_tugas = '<?= $this->uri->segment(3); ?>';
			var formEdittugas = new FormData($('#formEdittugas')[0]);
			formEdittugas.append('id_tugas',id_tugas);
			$.ajax({
                url: '<?= base_url('ajax/update_tugas/') ?>',
                type: 'post',
                data: formEdittugas,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response != 0){
                        location.reload();
						//console.log(formEdittugas); 
                    }else{
                        alert('file not uploaded');
                    }
                },
            });
		});

		$(document).on('click','.deleteItem',function(e){
			e.preventDefault();
			var id_item_tugas = $(this).attr('data-idItemtugas');
			Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Akan menghapus Item tugas Ini ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, Hapus!',
                cancelButtonText: 'Batalkan',
                }).then((result) => {
                if (result.value) {
                    $.post('<?= base_url('ajax/delete_item_tugas/') ?>',{id_item_tugas: id_item_tugas},
                        function(data,status) {
                            Swal.fire(
                            'Berhasil!',
                            'Berhasil Menghapus Item Tugas.',
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
                text: "Akan menghapus tugas yang telah dikumpulkan Ini ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, Hapus!',
                cancelButtonText: 'Batalkan',
                }).then((result) => {
                if (result.value) {
                    $.post('<?= base_url('ajax/delete_assign_tugas/') ?>',{id_assign: id_assign},
                        function(data,status) {
                            Swal.fire(
                            'Berhasil!',
                            'Berhasil Menghapus tugas yang dikumpulkan.',
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
			var id_item_tugas = $(this).attr('data-idItemtugas');
			if($(this).is(":checked")){
				status_item = 'selesai';
			} else {
				status_item = 'belum selesai';
			}
			$.post('<?= base_url('ajax/update_item_tugas') ?>',{status_item:status_item,id_item_tugas:id_item_tugas},
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
			var id_tugas = '<?= $this->uri->segment(3) ?>';
			var id_user_aktif = '<?= $this->session->userdata('user')->id_user ?>';
			$.post('<?= base_url('ajax/get_komentar') ?>',{id_tugas:id_tugas},
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
			var id_tugas = '<?= $this->uri->segment(3) ?>';
			$.post('<?= base_url('ajax/get_item_tugas') ?>',{id_tugas:id_tugas},
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
													<input class="cekbox-item" data-idItemtugas="${item.id_item_tugas}" type="checkbox" name="optionsCheckboxes" <?= ($this->session->userdata('user')->hak_akses == 'Karyawan') ? 'onclick="return false"' : '' ?> ${cek}>
													<span class="checkbox-material"><span class="check"></span></span>
													${item.isi_item}</label> 
												<?= ($this->session->userdata('user')->hak_akses == 'Manajer') ? '<button id="deleteItem" data-idItemtugas="${item.id_item_tugas}" type="button" class="btn btn-danger deleteItem"><i class="glyphicon glyphicon-trash hapusItem"></i></button>' : ''?>
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
