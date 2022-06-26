<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aplikasi Penggajihan</title>
	<link rel="stylesheet" href="<?= base_url('./assets/css/bootstrap.min.css') ?>">
</head>

<body class="bg-primary">
	<div class="container-fluid">
		<div class="row">
			<nav class="navbar navbar-dark bg-dark">
				<div class="container-fluid">
					<span class="navbar-brand mb-0 h1">Aplikasi Penggajihan</span>
				</div>
			</nav>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h2 class="fw-bold text-center text-white mt-3">Data Penggajihan Karyawan</h2>
				<div class="card mt-5">
					<div class="card-header bg-info">
						<h4 class="fw-bold">DATA</h4>
					</div>
					<div class="card-body">
						<div class="btn-group">
							<button class="btn btn-success btn-sm fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> + Tambah Data</button>
						</div>
						<div class="table-responsive">
							<table class="table">
								<thead class="text-center">
									<tr>
										<th scope="col">No</th>
										<th>Nama Karyawan</th>
										<th>Lama Kerja ( Tahun )</th>
										<th>Gaji ( Per Bulan )</th>
										<th>Bonus</th>
										<th>Pinjaman ( Per Bulan )</th>
										<th>Gaji Bulan</th>
										<th>Total Gaji</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $n = 1;
									foreach ($data as $d) { ?>
										<tr>
											<td><?= $n; ?></td>
											<td><?= $d->nama ?></td>
											<td><?= $d->lama_kerja ?> Tahun</td>
											<td>Rp. <?= number_format($d->gaji, 0) ?></td>
											<td>Rp. <?= number_format($d->bonus, 0) ?></td>
											<td>Rp. <?= number_format($d->bon, 0) ?></td>
											<td><?= $d->bulan ?></td>
											<td>
												<?php
												$total = $d->gaji - $d->bon;
												$jumlah = $total + $d->bonus;
												?>
												Rp. <?= number_format($jumlah, 0) ?>
											</td>
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-warning btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#edit<?= $d->id ?>">Edit</button>
													<a href="<?= base_url('delete/' . $d->id) ?>" class="btn btn-danger btn-sm fw-bold">Hapus</a>
												</div>


												<!-- Modal -->
												<div class="modal fade" id="edit<?= $d->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header bg-success">
																<h5 class="modal-title fw-bold text-white" id="staticBackdropLabel">Tambah Data</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<div class="row">
																	<div class="col-lg-12">
																		<form action="<?= base_url('edit/' . $d->id) ?>" method="post" enctype="multipart/form-data">
																			<div class="form-group mb-3">
																				<label for="" class="mb-2 fw-bold">Nama</label>
																				<input type="text" name="nama" value="<?= $d->nama ?>" class="form-control">
																			</div>
																			<div class="form-group mb-3">
																				<label for="" class="mb-2 fw-bold">Lama Kerja ( Tahun )</label>
																				<input type="number" name="lama_kerja" value="<?= $d->lama_kerja ?>" class="form-control">
																			</div>
																			<div class="form-group mb-3">
																				<label for="" class="mb-2 fw-bold">Bonus <small>*Tulis 0 jika tidak ada bonus</small></label>
																				<input type="number" name="bonus" value="<?= $d->bonus ?>" class="form-control">
																			</div>
																			<div class="form-group mb-3">
																				<label for="" class="mb-2 fw-bold">Pinjaman ( Bon ) <small>*Tulis 0 jika tidak ada bon</small></label>
																				<input type="number" name="bon" value="<?= $d->bon ?>" class="form-control">
																			</div>
																			<div class="form-group mb-3">
																				<label for="" class="mb-2 fw-bold">Bulan</label>
																				<input type="month" name="bulan" value="<?= $d->bulan ?>" class="form-control" id="">
																			</div>
																			<div class="form-group">
																				<button type="sumbit" class="btn btn-success btn-sm fw-bold">Simpan</button>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
															<div class="modal-footer">

															</div>
														</div>
													</div>
												</div>

											</td>
										</tr>
									<?php $n++;
									} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 class="modal-title fw-bold text-white" id="staticBackdropLabel">Tambah Data</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12">
							<form action="<?= base_url('tambah') ?>" method="post" enctype="multipart/form-data">
								<div class="form-group mb-3">
									<label for="" class="mb-2 fw-bold">Nama</label>
									<input type="text" name="nama" class="form-control">
								</div>
								<div class="form-group mb-3">
									<label for="" class="mb-2 fw-bold">Lama Kerja ( Tahun )</label>
									<input type="number" name="lama_kerja" class="form-control">
								</div>
								<div class="form-group mb-3">
									<label for="" class="mb-2 fw-bold">Bonus <small>*Tulis 0 jika tidak ada bonus</small></label>
									<input type="number" name="bonus" class="form-control">
								</div>
								<div class="form-group mb-3">
									<label for="" class="mb-2 fw-bold">Pinjaman ( Bon ) <small>*Tulis 0 jika tidak ada bon</small></label>
									<input type="number" name="bon" class="form-control">
								</div>
								<div class="form-group mb-3">
									<label for="" class="mb-2 fw-bold">Bulan</label>
									<input type="month" name="bulan" class="form-control" id="">
								</div>
								<div class="form-group">
									<button type="sumbit" class="btn btn-success btn-sm fw-bold">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">

				</div>
			</div>
		</div>
	</div>


	<script src="<?= base_url('./assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>