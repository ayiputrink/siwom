<section id="content">
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
											<input type="text" class="form-control" placeholder="Pencarian...">
											<span class="input-group-btn">
												<button class="btn btn-info btn-raised" type="button">Cari</button>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="boxs-body p-0">
								<div class="table-responsive">
									<table class="table mb-0" id="usersList">
										<thead>
											<tr>
												<th style="width:20px;">
													
												</th>
												<th>NIK</th>
												<th>Nama</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th style="width:30px;"></th>
											</tr>
										</thead>
										<tbody>
                                            <?php foreach($data_user as $value) : ?>
											<tr>
												<td>
													<div class="checkbox">
														<label>
															<input type="checkbox" name="optionsCheckboxes">
														</label>
													</div>
												</td>
												<td><?= $value['nik'] ?></td>
												<td><?= $value['nama'] ?></td>
                                                <td><?= $value['email'] ?></td>
                                                <td><?= $value['status'] ?></td>
                                                <td>
                                                    <button data-idUser="<?= $value['id_user'] ?>" class="btn btn-primary detailUser" data-toggle="modal" data-target="#validasiUserModal">Lihat Detail</button></td>
												
                                            </tr>
                                            <?php endforeach; ?>
											
										</tbody>
									</table>
								</div>
							</div>
							<!-- /boxs body -->

							<!-- boxs footer -->
							<div class="boxs-footer dvd dvd-top">
								<div class="row">
									<div class="col-sm-2 hidden-xs">
										<select class="form-control inline">
											<option value="0">Bulk action</option>
											<option value="1">Delete selected</option>
											<option value="2">Archive selected</option>
											<option value="3">Copy selected</option>
										</select>
									</div>
									<div class="col-sm-2">
										<button class="btn btn-default btn-raised">Apply</button>
									</div>
									<div class="col-sm-3 text-left">
										<!-- <small class="text-muted">showing 20-30 of 50 items</small> -->
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
							</div>
							<!-- /boxs footer -->

						</section>
						
					</div>
                </div>
</section>