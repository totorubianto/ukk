<div class="main-content">
	<!-- Top navbar -->
	<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
		<div class="container-fluid">
			<!-- Brand -->
			<a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Vendor</a>
			<!-- Form -->
			<form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
				<div class="form-group mb-0">
					<div class="input-group input-group-alternative">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-search"></i></span>
						</div>
						<input class="form-control" placeholder="Search" type="text">
					</div>
				</div>
			</form>
			<!-- User -->
			<ul class="navbar-nav align-items-center d-none d-md-flex">
				<li class="nav-item dropdown">
					<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<div class="media align-items-center">
							<span class="avatar avatar-sm rounded-circle">
								<img alt="Image placeholder" src="<?php echo base_url() ?>assets/assets/img/theme/team-4-800x800.jpg">
							</span>
							<div class="media-body ml-2 d-none d-lg-block">
								<a href="<?php echo base_url() ?>admin/logout" class="mb-0 text-sm  font-weight-bold">
									<?php echo $this->session->userdata('nama_admin'); ?></a>
							</div>
						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
						<div class=" dropdown-header noti-title">
							<h6 class="text-overflow m-0">Welcome!</h6>
						</div>
						<a href="./examples/profile.html" class="dropdown-item">
							<i class="ni ni-single-02"></i>
							<span>My profile</span>
						</a>
						<a href="./examples/profile.html" class="dropdown-item">
							<i class="ni ni-settings-gear-65"></i>
							<span>Settings</span>
						</a>
						<a href="./examples/profile.html" class="dropdown-item">
							<i class="ni ni-calendar-grid-58"></i>
							<span>Activity</span>
						</a>
						<a href="./examples/profile.html" class="dropdown-item">
							<i class="ni ni-support-16"></i>
							<span>Support</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#!" class="dropdown-item">
							<i class="ni ni-user-run"></i>
							<span>Logout</span>
						</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
	<!-- Header -->
	<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
		<div class="container-fluid">
			<div class="header-body">
				<!-- Card stats -->
				<div class="row">
					<div class="col-xl-3 col-lg-6">
						<div class="card card-stats mb-4 mb-xl-0">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title text-uppercase text-muted mb-0">Maskapai</h5>
										<span class="h2 font-weight-bold mb-0"><?php echo $this->db->count_all('vendor'); ?></span>
									</div>
									<div class="col-auto">
										<div class="icon icon-shape bg-danger text-white rounded-circle shadow">
											<i class="fas fa-chart-bar"></i>
										</div>
									</div>
								</div>
								<p class="mt-3 mb-0 text-muted text-sm">
									<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
									<span class="text-nowrap">Kenaikan Harian</span>
								</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6">
						<div class="card card-stats mb-4 mb-xl-0">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title text-uppercase text-muted mb-0">User</h5>
										<span class="h2 font-weight-bold mb-0">
											<?php echo $this->db->count_all('users'); ?>
										</span>
									</div>
									<div class="col-auto">
										<div class="icon icon-shape bg-warning text-white rounded-circle shadow">
											<i class="fas fa-chart-pie"></i>
										</div>
									</div>
								</div>
								<p class="mt-3 mb-0 text-muted text-sm">
									<span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
									<span class="text-nowrap">Kenaikan Harian</span>
								</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6">
						<div class="card card-stats mb-4 mb-xl-0">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title text-uppercase text-muted mb-0">Pemesanan</h5>
										<span class="h2 font-weight-bold mb-0">
											<?php echo $this->db->count_all('penumpang'); ?>
										</span>
									</div>
									<div class="col-auto">
										<div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
											<i class="fas fa-users"></i>
										</div>
									</div>
								</div>
								<p class="mt-3 mb-0 text-muted text-sm">
									<span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
									<span class="text-nowrap">Kenaikan Harian</span>
								</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6">
						<div class="card card-stats mb-4 mb-xl-0">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title text-uppercase text-muted mb-0">Rute</h5>
										<span class="h2 font-weight-bold mb-0"><?php echo $this->db->count_all('rute'); ?></span>
									</div>
									<div class="col-auto">
										<div class="icon icon-shape bg-info text-white rounded-circle shadow">
											<i class="fas fa-percent"></i>
										</div>
									</div>
								</div>
								<p class="mt-3 mb-0 text-muted text-sm">
									<span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
									<span class="text-nowrap">Kenaikan Harian</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page content -->
	<div class="container-fluid mt--7">
		<div class="card">
			<div class="card-body">
				<div>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						Tambah Vendor
					</button>
					<h1>Vendor</h1>
					<form method="post" action="<?php echo base_url() ?>admin/pemesanan">
						<div class="form-group">
							<span>Search</span>
							<input type="text" class="form-control" placeholder="search" name="search">

						</div>
					</form>
					<div class="table-responsive">
						<table class="table align-items-center">
							<thead class="thead-light">
								<tr>
									<th scope="col">No</td>
										<th scope="col">Gambar</td>
											<th scope="col">nama_vendor</td>
												<th scope="col">Aksi</td>
												</tr>
											</thead>
											<?php $i=1 ?>
											<?php foreach ($vendor->result() as $key) { ?>
												<tr>
													<td><?php echo $i++ ?></td>
													<td>
														<img width="50px" src=" <?php echo base_url() ?>assets/img/vendor/<?php echo $key->img ?> ">
													</td>
													<td><?php echo $key->nama_vendor ?></td>
													<td class="text-right">
														<div class="dropdown">
															<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																<i class="fas fa-ellipsis-v"></i>
															</a>
															<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="padding: 10px;">
																
																<a class="btn btn-danger" href="<?php echo base_url() ?>admin/deleteVendor/<?php echo $key->id_vendor ?>">Delete</a>
															</div>
														</div>
													</td>
												</tr>
											<?php } ?>	
										</table>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<?php echo form_open_multipart(base_url().'admin/tambahVendor');?>
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label>Nama Vendor</label>
											<input class="form-control" type="text" name="nama_vendor">
										</div>
										<div class="form-group">
											<label>Nama Vendor</label>
											<input class="form-control" type="file" name="gambar">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<input class="btn btn-primary" type="submit" value="tambah" name="aa">
										
									</div>
								</form>
							</div>
						</div>
					</div>
				<div class="modal fade" id="modal-viewedit">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title">View/Edit Reservation</h4>
							</div>
							<div class="modal-body">

								<!-- ################# -->
								<div id="viewedit"></div>
								<!-- ################# -->

							</div>

						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>