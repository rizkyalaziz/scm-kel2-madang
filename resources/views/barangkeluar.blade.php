<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>SCM - MADANG</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: { "families": ["Lato:300,400,700,900"] },
			custom: { "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css'] },
			active: function () {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<x-header></x-header>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<x-navbar></x-navbar>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<x-keluar></x-keluar>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div class="page-header">
								<h4 class="page-title text-white"><i class="fas fa-sign-out-alt"></i> Barang Keluar</h4>
								<ul class="breadcrumbs">
									<li class="nav-home">
										<a href="#">
											<i class="flaticon-home text-white"></i>
										</a>
									</li>
									<li class="separator text-white">
										<i class="flaticon-right-arrow"></i>
									</li>
									<li class="nav-item text-white">
										<a href="#" class="text-white">Data Barang Keluar</a>
									</li>
									<li class="separator text-white">
										<i class="flaticon-right-arrow"></i>
									</li>
									<li class="nav-item text-white">
										<a href="#" class="text-white">Input Data</a>
									</li>
								</ul>
							</div>

							<!-- Tombol untuk memunculkan modal -->
							<div class="ml-md-auto py-2 py-md-0">

								<button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahBarangKeluar">
									<span class="btn-label">
										<i class="fa fa-plus"></i>
									</span>
									Tambah Data
								</button>
                                    <button class="btn btn-success">
											<span class="btn-label">
												<i class="fa fa-check"></i>
											</span>
											Kirim Data
										</button>
								

							</div>

						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Data Barang Keluar</h4>
								</div>
								<div class="card-body">
									<!-- Tabel Barang Keluar -->
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover text-center">
											<thead class="table-dark">
												<tr>
													<th>No</th>
													<th>Nama Barang</th>
													<th>Satuan</th>
													<th>Stok</th>
													<th>Jumlah</th>
													<th>Sisa Stok</th>
													<th>Tanggal Keluar</th>
													<th>Keterangan</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>No</th>
													<th>ID Barang</th>
													<th>Nama Barang</th>
													<th>Stok</th>
													 
													<th>Satuan</th>
													<th>Aksi</th>
												</tr>
											</tfoot>

											<tbody>
												@foreach($barangkeluar as $i => $item)
												<tr>

													<td>{{ $i+1 }}</td>
													<td>{{ optional($item->databarang)->nama ?? '-' }}</td>
													<td>{{ optional($item->satuan)->nama ?? '-' }}</td>
													<td>{{ $item->stok ?? '-' }}</td>
													<td>{{ $item->jumlah_keluar }}</td>
													<td>{{ $item->sisa_stok ?? '-' }}</td>
													<td>{{ $item->tanggal_keluar }}</td>
													<td>{{ $item->keterangan }}</td>
													<td>
														<form action="{{ route('barangkeluar.destroy', $item->id) }}" method="POST" style="display:inline-block">
															@csrf
															@method('DELETE')
															<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
																<i class="fa fa-trash"></i> Hapus
															</button>
														</form>
														<!-- Tombol Edit -->
														<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditBarangKeluar{{ $item->id }}">
															<i class="fa fa-edit"></i> Edit
												</tr>
												
														</button>
														@if($item->gambar)
														<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalPreviewGambar{{ $item->id }}">
															<i class="fa fa-image"></i> Lihat Gambar
														</button>
														<!-- Modal Preview Gambar -->
														<div class="modal fade" id="modalPreviewGambar{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalPreviewGambarLabel{{ $item->id }}" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="modalPreviewGambarLabel{{ $item->id }}">Preview Gambar</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body text-center">
																		<img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar" class="img-fluid mb-3" style="max-height:400px;">
																		<br>
																		<a href="{{ asset('storage/' . $item->gambar) }}" download class="btn btn-success">
																			<i class="fa fa-download"></i> Download
																		</a>
																	</div>
																</div>
															</div>
														</div>
														@else
														-
														@endif
													</td>
												</tr>
												<!-- Modal Edit Barang Keluar -->
												<div class="modal fade" id="modalEditBarangKeluar{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditBarangKeluarLabel{{ $item->id }}" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="modalEditBarangKeluarLabel{{ $item->id }}">Edit Barang Keluar</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form action="{{ route('barangkeluar.update', $item->id) }}" method="POST" enctype="multipart/form-data">
																@csrf
																@method('PUT')
																<div class="modal-body">
																	<div class="form-group">
																		<label for="databarang_id_edit{{ $item->id }}">Nama Barang</label>
																		<select class="form-control" id="databarang_id_edit{{ $item->id }}" name="databarang_id" required>
																			<option value="">-- Pilih Barang --</option>
																			@foreach($databarang as $barang)
																				<option value="{{ $barang->id }}" data-satuan="{{ $barang->satuan_id }}" data-stok="{{ $barang->jumlah_stok }}" {{ $item->databarang_id == $barang->id ? 'selected' : '' }}>{{ $barang->nama }}</option>
																			@endforeach
																		</select>
																	</div>
																	<div class="form-group">
																		<label for="satuan_id_edit{{ $item->id }}">Satuan</label>
																		<select class="form-control" id="satuan_id_edit{{ $item->id }}" name="satuan_id" required>
																			<option value="">-- Pilih Satuan --</option>
																			@foreach($satuan as $sat)
																				<option value="{{ $sat->id }}" {{ $item->satuan_id == $sat->id ? 'selected' : '' }}>{{ $sat->nama }}</option>
																			@endforeach
																		</select>
																	</div>
																	<div class="form-group">
																		<label for="stok_edit{{ $item->id }}">Stok</label>
																		<input type="number" class="form-control" id="stok_edit{{ $item->id }}" name="stok" value="{{ $item->stok ?? '' }}" min="0" required>
																	</div>
																	<div class="form-group">
																		<label for="jumlah_keluar_edit{{ $item->id }}">Jumlah</label>
																		<input type="number" class="form-control" id="jumlah_keluar_edit{{ $item->id }}" name="jumlah_keluar" value="{{ $item->jumlah_keluar }}" min="1" required>
																	</div>
																	<div class="form-group">
																		<label for="sisa_stok_edit{{ $item->id }}">Sisa Stok</label>
																		<input type="number" class="form-control" id="sisa_stok_edit{{ $item->id }}" name="sisa_stok" value="{{ $item->stok ? $item->stok - $item->jumlah : '' }}" min="0" readonly>
																	</div>
																	<div class="form-group">
																		<label for="tanggal_keluar{{ $item->id }}">Tanggal Keluar</label>
																		<input type="date" class="form-control" id="tanggal_keluar{{ $item->id }}" name="tanggal_keluar" value="{{ $item->tanggal_keluar }}" required>
																	</div>
																	<div class="form-group">
																		<label for="keterangan{{ $item->id }}">Keterangan</label>
																		<input type="text" class="form-control" id="keterangan{{ $item->id }}" name="keterangan" value="{{ $item->keterangan }}">
																	</div>
																	<div class="form-group">
																		<label for="gambar{{ $item->id }}">Upload Gambar</label>
																		<input type="file" class="form-control-file" id="gambar{{ $item->id }}" name="gambar" accept="image/*" capture="environment">
																		@if($item->gambar)
																			<br><img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar" class="img-fluid mt-2" style="max-height:100px;">
																		@endif
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="submit" class="btn btn-success">Update</button>
																	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
																</div>
															</form>
														</div>
													</div>
												</div>
												@endforeach
											</tbody>
										</table>
									</div>

									<!-- Modal Tambah Barang Keluar -->
									<div class="modal fade" id="modalTambahBarangKeluar" tabindex="-1" role="dialog" aria-labelledby="modalTambahBarangKeluarLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="modalTambahBarangKeluarLabel">Tambah Barang Keluar</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form action="{{ route('barangkeluar.store') }}" method="POST" enctype="multipart/form-data">
													@csrf
													<div class="modal-body">
														<div class="form-group">
															<label for="databarang_id">Nama Barang</label>
															<select class="form-control" id="databarang_id" name="databarang_id" required>
																<option value="">-- Pilih Barang --</option>
																@foreach($databarang as $barang)
																	<option value="{{ $barang->id }}"
																		data-satuan="{{ $barang->satuan_id }}"
																		data-stok="{{ $barang->jumlah_stok }}">
																		{{ $barang->nama }}
																	</option>
																@endforeach
															</select>
														</div>
														<div class="form-group">
															<label for="satuan_id">Satuan</label>
															<select class="form-control" id="satuan_id" name="satuan_id" required>
																<option value="">-- Pilih Satuan --</option>
																@foreach($satuan as $sat)
																	<option value="{{ $sat->id }}">{{ $sat->nama }}</option>
																@endforeach
															</select>
														</div>
														<div class="form-group">
															<label for="stok">Stok</label>
															<input type="number" class="form-control" id="stok" name="stok" min="0" required>
														</div>
														<div class="form-group">
															<label for="jumlah_keluar">Jumlah</label>
															<input type="number" class="form-control" id="jumlah_keluar" name="jumlah_keluar" min="1" required>
														</div>
														<div class="form-group">
															<label for="sisa_stok">Sisa Stok</label>
															<input type="number" class="form-control" id="sisa_stok" name="sisa_stok" min="0" readonly>
														</div>
														<div class="form-group">
															<label for="tanggal_keluar">Tanggal Keluar</label>
															<input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" required>
														</div>
														<div class="form-group">
															<label for="keterangan">Keterangan</label>
															<input type="text" class="form-control" id="keterangan" name="keterangan">
														</div>
														<div class="form-group">
															<label for="gambar">Upload Gambar</label>
															<input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*" capture="environment">
														</div>
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-success">Submit</button>
														<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
													</div>
												</form>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
			<x-footer></x-footer>
		</div>

	</div>
	<!--   Core JS Files   -->
	<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../assets/js/core/popper.min.js"></script>
	<script src="../../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Atlantis JS -->
	<script src="../../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/setting-demo2.js"></script>
	<script>
		$(document).ready(function () {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable({
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every(function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
							.appendTo($(column.footer()).empty())
							.on('change', function () {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);

								column
									.search(val ? '^' + val + '$' : '', true, false)
									.draw();
							});

						column.data().unique().sort().each(function (d, j) {
							select.append('<option value="' + d + '">' + d + '</option>')
						});
					});
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function () {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
				]);
				$('#addRowModal').modal('hide');

			});
			$('#databarang_id').on('change', function() {
				var satuanId = $('option:selected', this).data('satuan');
				var stok = $('option:selected', this).data('stok');
				$('#satuan_id').val(satuanId);
				$('#stok').val(stok);
				$('#jumlah_keluar').val('');
				$('#sisa_stok').val(stok);
			});
			$('#jumlah_keluar').on('input', function() {
				var stok = parseInt($('#stok').val()) || 0;
				var jumlah = parseInt($(this).val()) || 0;
				if (jumlah > stok) {
					alert('Jumlah keluar tidak boleh melebihi stok!');
					$(this).val(stok);
					jumlah = stok;
				}
				var sisa = stok - jumlah;
				if (sisa < 0) sisa = 0;
				$('#sisa_stok').val(sisa);
			});
			// Autofill & sisa stok untuk modal edit
			@foreach($barangkeluar as $item)
			$('#databarang_id_edit{{ $item->id }}').on('change', function() {
				var satuanId = $('option:selected', this).data('satuan');
				var stok = $('option:selected', this).data('stok');
				$('#satuan_id_edit{{ $item->id }}').val(satuanId);
				$('#stok_edit{{ $item->id }}').val(stok);
				$('#jumlah_keluar_edit{{ $item->id }}').val('');
				$('#sisa_stok_edit{{ $item->id }}').val(stok);
			});
			$('#jumlah_keluar_edit{{ $item->id }}').on('input', function() {
				var stok = parseInt($('#stok_edit{{ $item->id }}').val()) || 0;
				var jumlah = parseInt($(this).val()) || 0;
				if (jumlah > stok) {
					alert('Jumlah keluar tidak boleh melebihi stok!');
					$(this).val(stok);
					jumlah = stok;
				}
				var sisa = stok - jumlah;
				if (sisa < 0) sisa = 0;
				$('#sisa_stok_edit{{ $item->id }}').val(sisa);
			});
			@endforeach
		});
	</script>
</body>

</html>