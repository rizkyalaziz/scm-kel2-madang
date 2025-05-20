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
		<!-- Sidebar -->

		<div class="main-panel">
			<div class="content">
                <div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div class="page-header">
                                <h4 class="page-title text-white">Jenis Barang</h4>
                                <ul class="breadcrumbs">
                                    <li class="nav-home">
                                        <a href="#">
                                            <i class="flaticon-home"></i>
                                        </a>
                                    </li>
                                    <li class="separator text-white">
                                        <i class="flaticon-right-arrow"></i>
                                    </li>
                                    <li class="nav-item text-white">
                                        <a href="#">Jenis Barang</a>
                                    </li>
                                    <li class="separator text-white">
                                        <i class="flaticon-right-arrow"></i>
                                    </li>
                                    <li class="nav-item text-white">
                                        <a href="#">Tambah Data</a>
                                    </li>
                                </ul>
                            </div>
							
                            <div class="ml-md-auto py-2 py-md-0">
                                <a href="/tambah-jenis">
								<button class="btn btn-secondary">
                                    
                                    <span class="btn-label">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    Tambah Data
                                </button>
                            </a>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Data Jenis Barang</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover text-center" >
											<thead>
												<tr>
													<th>No</th>
													<th>Kode Barang</th>
													<th>Jenis Barang</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>No</th>
													<th>Kode Barang</th>
													<th>Jenis Barang</th>
													<th>Aksi</th>
													 
												</tr>
											</tfoot>
											<tbody>
												<tr>
													<td>1</td>
													<td>-</td>
													<td>-</td>
													<td>-</td>
													 
												</tr>
												<tr>
													<td>2</td>
													<td>-</td>
													<td>-</td>
													<td>-</td>
													 
												</tr>
												<tr>
													<td>3</td>
													<td>-</td>
													<td>-</td>
													<td>-</td>
													 
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
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
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