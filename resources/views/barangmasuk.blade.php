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
		<x-masuk></x-masuk>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div class="page-header">
								<h4 class="page-title text-white"><i class="fas fa-sign-in-alt"></i> Barang Masuk</h4>
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
										<a href="#" class="text-white">Data Barang</a>
									</li>
									<li class="separator text-white">
										<i class="flaticon-right-arrow"></i>
									</li>
									<li class="nav-item text-white">
										<a href="#" class="text-white">Input Data</a>
									</li>
								</ul>
							</div>

							<div class="ml-md-auto py-2 py-md-0">
 fitur-adan
								<button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahBarangMasuk">
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
								</a>
 master
							</div>

						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Data Barang Masuk</h4>
								</div>
								<div class="card-body">
									<!-- Modal Tambah Barang Masuk -->
									<div class="modal fade" id="modalTambahBarangMasuk" tabindex="-1" role="dialog" aria-labelledby="modalTambahBarangMasukLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="modalTambahBarangMasukLabel">Tambah Barang Masuk</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <form action="{{ route('barangmasuk.store') }}" method="POST" enctype="multipart/form-data">
									        @csrf
									        <div class="modal-body">
									          <div class="form-group">
									            <label for="databarang_id">Nama Barang</label>
									            <select class="form-control" id="databarang_id" name="databarang_id" required>
									              <option value="">-- Pilih Barang --</option>
									              @foreach($databarang as $barang)
									                <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
									              @endforeach
									            </select>
									          </div>
									          <div class="form-group">
									            <label for="jumlah">Jumlah</label>
									            <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
									          </div>
									          <div class="form-group">
									            <label for="tanggal_masuk">Tanggal Masuk</label>
									            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
									          </div>
									          <div class="form-group">
									            <label for="keterangan">Keterangan</label>
									            <input type="text" class="form-control" id="keterangan" name="keterangan">
									          </div>
									          <div class="form-group">
									            <label for="gambar">Upload Gambar/ File</label>
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

									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover text-center">
											<thead class="table-dark">
												<tr>
													<th>No</th>
													<th>Nama Barang</th>
													<th>Jumlah</th>
													<th>Tanggal Masuk</th>
													<th>Keterangan</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												@foreach($barangmasuk as $i => $item)
												<tr>
													<td>{{ $i+1 }}</td>
													<td>{{ $item->databarang->nama ?? '-' }}</td>
													<td>{{ $item->jumlah }}</td>
													<td>{{ $item->tanggal_masuk }}</td>
													<td>{{ $item->keterangan }}</td>
													<td>
														<form action="{{ route('barangmasuk.destroy', $item->id) }}" method="POST" style="display:inline-block">
															@csrf
															@method('DELETE')
															<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
																<i class="fa fa-trash"></i> Hapus
															</button>
														</form>
														<!-- Tombol Edit -->
														<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditBarangMasuk{{ $item->id }}">
															<i class="fa fa-edit"></i> Edit
														</button>
													</td>
												</tr>
												<!-- Modal Edit Barang Masuk -->
												<div class="modal fade" id="modalEditBarangMasuk{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditBarangMasukLabel{{ $item->id }}" aria-hidden="true">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <h5 class="modal-title" id="modalEditBarangMasukLabel{{ $item->id }}">Edit Barang Masuk</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
												      <form action="{{ route('barangmasuk.update', $item->id) }}" method="POST">
												        @csrf
												        @method('PUT')
												        <div class="modal-body">
												          <div class="form-group">
												            <label for="databarang_id{{ $item->id }}">Nama Barang</label>
												            <select class="form-control" id="databarang_id{{ $item->id }}" name="databarang_id" required>
												              <option value="">-- Pilih Barang --</option>
												              @foreach($databarang as $barang)
												                <option value="{{ $barang->id }}" {{ $item->databarang_id == $barang->id ? 'selected' : '' }}>{{ $barang->nama }}</option>
												              @endforeach
												            </select>
												          </div>
												          <div class="form-group">
												            <label for="jumlah{{ $item->id }}">Jumlah</label>
												            <input type="number" class="form-control" id="jumlah{{ $item->id }}" name="jumlah" value="{{ $item->jumlah }}" min="1" required>
												          </div>
												          <div class="form-group">
												            <label for="tanggal_masuk{{ $item->id }}">Tanggal Masuk</label>
												            <input type="date" class="form-control" id="tanggal_masuk{{ $item->id }}" name="tanggal_masuk" value="{{ $item->tanggal_masuk }}" required>
												          </div>
												          <div class="form-group">
												            <label for="keterangan{{ $item->id }}">Keterangan</label>
												            <input type="text" class="form-control" id="keterangan{{ $item->id }}" name="keterangan" value="{{ $item->keterangan }}">
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
		});
	</script>
</body>

</html>