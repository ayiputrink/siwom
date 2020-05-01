	<!--  CONTENT  -->
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
								<strong>Tabel</strong> User</h3>
						</div>
						<div class="boxs-widget">
							<div class="row">

								<div class="col-sm-12 col-xs-12">
									<div class="input-group">
										<button id="tambahUser" class="btn btn-info" data-toggle="modal"
											data-target="#tambahUserModal">Tambah User</button>
									</div>
								</div>
							</div>
							<!-- <div class="row">
									
									<div class="col-sm-12 col-xs-12">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Pencarian...">
											<span class="input-group-btn">
												<button class="btn btn-info btn-raised" type="button">Cari</button>
											</span>
										</div>
									</div>
								</div>
							</div> -->
							<div class="boxs-body p-0">
								<div class="table-responsive">
									<div class="form-group">
										<label for="filter" style="padding-top: 10px">Cari:</label>
										<input id="filter" type="text"
											class="form-control rounded w-md mb-10 inline-block" />
									</div>
									<table class="table mb-0 footable table table-custom" id="usersList"
										data-filter="#filter" data-page-size="10">
										<thead>
											<tr>
												<th style="width:20px;">

												</th>
												<th>No</th>
												<th>NIK</th>
												<th>Nama</th>
												<th>Email</th>
												<th>Status</th>
												<th style="width:30px;"></th>
											</tr>
										</thead>
										<tbody id="isiTabelUser">


										</tbody>
										<tfoot>
											<tr>
												<td colspan="5" class="text-right">
													<ul class="pagination">
													</ul>
												</td>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
							<!-- /boxs body -->

							<!-- boxs footer -->
							<!-- <div class="boxs-footer dvd dvd-top">
								<div class="row">
									<div class="col-sm-2 hidden-xs">
										<select class="form-control inline">
											<option value="0">Aksi</option>
											<option value="1">Hapus</option>

										</select>
									</div>
									<div class="col-sm-2">
										<button class="btn btn-default btn-raised">Terapkan</button>
									</div>
									<div class="col-sm-3 text-left">
									
									</div>
									<div class="col-sm-5 text-right">
										<ul class="pagination m-0">
											<li>
												<a href>
													<i class="fa fa-chevron-left"></i>
												</a>
											</li>
											<li>
												<a href>1</a>
											</li>
											<li>
												<a href>2</a>
											</li>
											<li>
												<a href>3</a>
											</li>
											<li>
												<a href>
													<i class="fa fa-chevron-right"></i>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div> -->
							<!-- /boxs footer -->

					</section>

				</div>
			</div>
		</div>
	</section>
	<!--/ CONTENT -->
