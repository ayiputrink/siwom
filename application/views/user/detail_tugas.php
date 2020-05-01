<section id="content">
	<div class="page page-tables-footable">
		<!-- bradcome -->
		<div class="b-b mb-10">
			<div class="row">
				<div class="col-sm-6 col-xs-12">

				</div>
			</div>
		</div>

		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<section class="boxs">
					<!-- boxs header -->
					<div class="boxs-header">
						<h3 class="custom-font hb-blue">
							<strong>Tabel</strong> Item Tugas</h3>
					</div>
					<div class="boxs-widget">

						<div class="row">
							<div class="col-sm-12 col-xs-12">
								<table>
									<tr>
										<td>Dari</td>
										<td> : <?= $parsing[0]['dari'] ?></td>
									</tr>
									<tr>
										<td>Untuk</td>
										<td> : <?= $parsing[0]['kepada'] ?></td>
									</tr>
									<tr>
										<td>Judul</td>
										<td> : <?= $parsing[0]['judul'] ?></td>
									</tr>
									<tr>
										<td>Lampiran</td>
										<td> :
											<?= ($parsing[0]['lampiran'] != null ? '<a href="'.base_url().'upload/lampiran/'.$parsing[0]['lampiran'].'" target="_blank">Unduh</a>' : 'Tidak ada lampiran') ?>
										</td>
									</tr>
									<tr>
										<td>Deadline</td>
										<td> : <?= $parsing[0]['deadline'] ?></td>
									</tr>
									<tr>
										<td>Status Tugas</td>
										<td> : <?= $parsing[0]['status_tugas'] ?></td>
									</tr>
								</table>
							</div>
						</div>

						<div class="row">

							<div class="col-sm-12 col-xs-12">
								<div class="input-group">
									
									<?php if($this->session->userdata('user')->hak_akses == 'Manajer') { ?>
									<button id="edittugas" class="btn btn-warning" data-toggle="modal"
										data-target="#edittugasModal">Edit Tugas</button>
									<button id="hapustugas" class="btn btn-danger">Hapus Tugas</button>
									<?php } ?>
								</div>
							</div>
						</div>

						<div class="boxs-body p-0">
							<div class="table-responsive">

								<div role="tabpanel" class="tab-pane active" id="todo">

									<?php if($this->session->userdata('user')->hak_akses == 'Manajer') { ?>
									<div class="form-group">
										<input type="text" id="isiItem" value="" placeholder="Buat item tugas baru..." class="form-control" required/>
										<button id="aksiItem" class="btn btn-raised btn-info btn-block">
											<span class="float fa fa-plus"></span></button>
									</div>
									<?php } ?>

									<ul class="todo-list" id="kontenItem">
									
									</ul>

								</div>
							</div>
						</div>


				</section>

				<section class="boxs">
					<div class="boxs-header">
						<h3 class="custom-font hb-amber">
							<strong>Kumpulkan Tugas </strong></h3>

					</div>
					<div class="boxs-body">

            <?php if($this->session->userdata('user')->hak_akses == 'Karyawan') { ?>
						<form id="formAssign" enctype="multipart/form-data" role="form" method="post">
							<input id="assignLampiran" type="file" name="lampiran" placeholder="pilih file" class="filestyle" required>

							<div class="form-group">
								<input type="text" name="deskripsi" value="" placeholder="Deskripsi..." class="form-control" required/>

								<button id="btnKumpultugas" class="btn btn-raised btn-info btn-block">
									<span class="float fa fa-plus"></span></button>
							</div>
						</form>
            <?php } ?>

						<ul class="media-list feeds_widget m-0" id="kontenAssign">
							Tidak ada data.
						</ul>
					</div>
				</section>

				<section class="boxs">
					<div class="boxs-header">
						<h3 class="custom-font hb-cyan">
							<strong>Komentar </strong></h3>

					</div>
					<div class="boxs-body">
						<div class="form-group">
							<input id="isiKomentar" type="text" value="" placeholder="Tulis komentar disini..." class="form-control" required/>
							<button id="aksiKomentar" class="btn btn-raised btn-info btn-block">
							<span class="float fa fa-plus"></span></button>
						</div>
						<ul class="media-list feeds_widget m-0" id="kontenKomentar">
							Tidak ada data.
						</ul>
					</div>
				</section>

			</div>
		</div>
	</div>
</section>
<!--/ CONTENT -->
