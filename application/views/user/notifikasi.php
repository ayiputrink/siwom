<section id="content">
	<div class="page page-tables-footable">
		<!-- bradcome -->
		<div class="b-b mb-10">
			<div class="row">
				<div class="col-sm-6 col-xs-12">

				</div>
			</div>
		</div>

		<div class="col-md-12 col-sm-12 col-xs-12">
			<section class="boxs">
				<div class="boxs-header">
					<h3 class="custom-font hb-cyan">
						<strong>Pemberitahuan </strong></h3>
					
				</div>
				<div class="boxs-body">
					<ul class="media-list feeds_widget m-0">
						
						<?php if(isset($parsing)) { ?>
						<?php if($parsing->num_rows() < 1) { ?>
						<li class="media">
							<div class="media-img"><i class="fa fa-info-circle"></i></div>
							<div class="media-body">
								<div class="media-heading text-warning"> <small
										class="pull-right text-muted">-:-</small></div>
								<small>Tidak ada Notifikasi.</small>
							</div>
						</li>
						<?php } else { ?>
						<?php foreach($parsing->result_array() as $data) { ?>
						<a href="<?= base_url() ?>notifikasi/detail/<?= $data['jenis_notifikasi'] ?>/<?= $data['id_notifikasi'] ?>/<?= $data['id_link'] ?>">
						<li class="media">
							<div class="media-img"><i class="fa fa-info-circle"></i></div>
							<div class="media-body">
								<div class="media-heading text-warning"> <small
										class="pull-right text-muted"><?= $data['created_at'] ?></small></div>
								<small><?= $data['isi_notifikasi'] ?> <?php if($data['status_notifikasi'] == 'diterima') {echo '(Notifikasi Baru)';} ?></small>
							</div>
						</li>
						</a>
						<?php } ?>
						<?php } ?>
						<?php } else { ?>
							<li class="media">
							<div class="media-img"><i class="fa fa-info-circle"></i></div>
							<div class="media-body">
								<div class="media-heading text-warning"> <small
										class="pull-right text-muted">-:-</small></div>
								<small>Tidak ada Notifikasi.</small>
							</div>
						</li>
						<?php } ?>
					</ul>
				</div>
			</section>
		</div>

	</div>
</section>
