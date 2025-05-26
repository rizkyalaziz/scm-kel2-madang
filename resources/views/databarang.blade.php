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
		<x-stock></x-stock>
		<!-- Sidebar-->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div class="page-header">
								<h4 class="page-title text-white"><i class="fas fa-home pr-2"></i>Data Barang</h4>
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
								<button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahBarang">
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
									<h4 class="card-title">Data Barang</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover text-center">
											<thead class="table-dark">
												<tr>
													<th>No</th>
													<th>ID Barang</th>
													<th>Nama Barang</th>
													<th>Stok</th>
													<th>Satuan</th>
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
												<tr>
													<td>-</td>
													<td>-</td>
													<td>-</td>
													<td>-</td>
													<td>-</td>
													
													<td class="action-buttons">
														<button class="btn btn-sm btn-warning">
															<i class="fas fa-edit"></i> Edit
														</button>
														<button class="btn btn-sm btn-danger">
															<i class="fas fa-trash-alt"></i> Hapus
														</button>
													</td>
												</tr>
												<tr>
													<td>-</td>
													<td>-</td>
													<td>-</td>
													<td>-</td>
													<td>-</td>
													
													<td class="action-buttons">
														<button class="btn btn-sm btn-warning">
															<i class="fas fa-edit"></i> Edit
														</button>
														<button class="btn btn-sm btn-danger">
															<i class="fas fa-trash-alt"></i> Hapus
														</button>
													</td>
												</tr>
												<tr>
													<td>-</td>
													<td>-</td>
													<td>-</td>
													<td>-</td>
													<td>-</td>
													<td class="action-buttons">
														<button class="btn btn-sm btn-warning">
															<i class="fas fa-edit"></i> Edit
														</button>
														<button class="btn btn-sm btn-danger">
															<i class="fas fa-trash-alt"></i> Hapus
														</button>
													</td>
												</tr>

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

	<!-- Modal Tambah Barang -->
	<div class="modal fade" id="modalTambahBarang" tabindex="-1" role="dialog" aria-labelledby="modalTambahBarangLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalTambahBarangLabel">Tambah Data Barang</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form>
	        <div class="modal-body">
	          <div class="row">
	            <div class="col-md-7 col-lg-7">
	              <div class="form-group">
	                <label for="idBarang">ID Barang</label>
	                <input type="tel" class="form-control" id="idBarang" placeholder="Masukkan ID Barang">
	              </div>
	              <div class="form-group">
	                <label for="namaBarang">Nama Barang</label>
	                <input type="text" class="form-control" id="namaBarang" placeholder="Masukkan Nama Barang">
	              </div>
	              <div class="form-group">
	                <label for="kodeBarang">Kode Barang</label>
	                <select class="form-control" id="kodeBarang">
	                  <option>-- Kode --</option>
	                </select>
	              </div>
	              <div class="form-group">
	                <label for="kategoriBarang">Kategori Barang</label>
	                <select class="form-control" id="kategoriBarang">
	                  <option>-- Kategori --</option>
	                </select>
	              </div>
	              <div class="form-group">
	                <label for="stock">Stock Minimum</label>
	                <input type="tel" class="form-control" id="stock" placeholder="Masukkan Minimum Barang">
	              </div>
	              <div class="form-group">
	                <label for="satuan">Satuan</label>
	                <input type="tel" class="form-control" id="satuan" placeholder="Masukkan Satuan Barang">
	              </div>
	            </div>
	            <div class="col-md-5 col-lg-5">
	              <div class="form-group">
	                <label for="exampleFormControlFile1">Upload Gambar</label>
	                <input type="file" class="form-control-file" id="exampleFormControlFile1">
	              </div>
	            </div>
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
</body>

</html>