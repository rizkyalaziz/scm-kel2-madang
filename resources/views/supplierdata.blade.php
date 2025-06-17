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
        <x-supplier></x-supplier>
        <!-- Sidebar-->

        <div class="main-panel">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div class="page-header">
                                <h4 class="page-title text-white"><i class="fas fa-user-plus"></i>  Supplier</h4>
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
                                        <a href="#" class="text-white">Data Supplier</a>
                                    </li>
                                    <li class="separator text-white">
                                    </li>
                                    
                                </ul>
								
                            </div>
							<div class="ml-md-auto py-2 py-md-0">
								<button class="btn btn-primary mr-3 rounded-2" data-toggle="modal" data-target="#modalTambahSupplier">
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
                                    <h4 class="card-title">Data Supplier</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="basic-datatables"
                                            class="display table table-striped table-hover text-center">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
													<th>ID Supplier</th>
                                                    <th>Nama Supplier</th>
                                                    <th>No Telpon</th>
                                                    <th>Email</th>
                                                    <th>Alamat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
													<th>ID Supplier</th>
                                                    <th>Nama Supplier</th>
                                                    <th>No Telpon</th>
                                                    <th>Email</th>
                                                    <th>Alamat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
@php $no = 1; @endphp
@foreach($dataSupliers as $suplier)
<tr>
    <td>{{ $no++ }}</td>
    <td>{{ $suplier->id }}</td>
    <td>{{ $suplier->nama }}</td>
    <td>{{ $suplier->no_telepon }}</td>
    <td>{{ $suplier->email }}</td>
    <td>{{ $suplier->alamat }}</td>
    <td class="action-buttons">
        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalEditSupplier{{ $suplier->id }}">
            <i class="fas fa-edit"></i> Edit
        </button>
        <form action="{{ route('data-supliers.destroy', $suplier->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                <i class="fas fa-trash-alt"></i> Hapus
            </button>
        </form>
    </td>
</tr>
<!-- Modal Edit Supplier -->
<div class="modal fade" id="modalEditSupplier{{ $suplier->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditSupplierLabel{{ $suplier->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditSupplierLabel{{ $suplier->id }}">Edit Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('data-supliers.update', $suplier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="form-group">
            <label for="namaSupplierEdit{{ $suplier->id }}">Nama Supplier</label>
            <input type="text" class="form-control" id="namaSupplierEdit{{ $suplier->id }}" name="nama" value="{{ $suplier->nama }}" required>
          </div>
          <div class="form-group">
            <label for="noTelpEdit{{ $suplier->id }}">No Telpon</label>
            <input type="text" class="form-control" id="noTelpEdit{{ $suplier->id }}" name="no_telepon" value="{{ $suplier->no_telepon }}" required>
          </div>
          <div class="form-group">
            <label for="emailEdit{{ $suplier->id }}">Email</label>
            <input type="email" class="form-control" id="emailEdit{{ $suplier->id }}" name="email" value="{{ $suplier->email }}" required>
          </div>
          <div class="form-group">
            <label for="alamatEdit{{ $suplier->id }}">Alamat</label>
            <textarea class="form-control" id="alamatEdit{{ $suplier->id }}" name="alamat" required>{{ $suplier->alamat }}</textarea>
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

    <!-- Modal Tambah Supplier -->
<div class="modal fade" id="modalTambahSupplier" tabindex="-1" role="dialog" aria-labelledby="modalTambahSupplierLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahSupplierLabel">Tambah Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('data-supliers.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="namaSupplier">Nama Supplier</label>
            <input type="text" class="form-control" id="namaSupplier" name="nama" required>
          </div>
          <div class="form-group">
            <label for="noTelp">No Telpon</label>
            <input type="text" class="form-control" id="noTelp" name="no_telepon" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
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