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
        <x-expmasuk></x-expmasuk>
        <!-- Sidebar-->

        <div class="main-panel">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div class="page-header">
                                <h4 class="page-title text-white"><i class="fas fa-box-open"></i> Barang
                                    Kedaluwarsa</h4>
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
                                    </li>
                                    
                                </ul>
								
                            </div>
							<div class="ml-md-auto py-2 py-md-0">
								<button class="btn btn-primary mr-3 rounded-2" data-toggle="modal" data-target="#modalTambahExp">
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
                                    <div class="card-title">Data Barang Kedaluwarsa</div>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
										
										<div class="col-md-12 col-lg-12">
											<div class="form-group d-flex justify-content-center align-items-center flex-wrap">
												<img src="../assets/img/LogoMieGacoan.png" alt="Logo PT" style="margin-top: -30px; margin-left: -500px; width: 150px; margin-right: 325px;" class="me-5">
												<div class="card-title mb-0 h5">PT. PESTA PORA ABADI</div>
											</div>
										</div>
                                        <div class="col-md-4 col-lg-4">
                                            <div class="form-group">
                                                <label for="cabang">Nama Cabang</label>
                                                <input type="text" class="form-control" id="cabang"
                                                    placeholder="Masukkan Cabang">
                                            </div>
                                        </div>
										<div class="col-md-4 col-lg-4">
										<div class="form-group">
                                                <label for="stokker">Nama Stokker</label>
                                                <input type="text" class="form-control" id="stokker"
                                                    placeholder="Masukkan Nama Stokker">
                                            </div>
										</div>

                                        <div class="col-md-4 col-lg-4">
                                            <div class="form-group">
                                                <label for="idBarang">Tanggal</label>
                                                <input type="date" class="form-control" id="idBarang"
                                                    placeholder="Masukkan Kategori Barang">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="page-inner mt--5">
                    <div class="row mt--2">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Barang Kedaluwarsa</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="basic-datatables"
                                            class="display table table-striped table-hover text-center">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
													<th>ID Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Satuan</th>
                                                    <th>Tanggal Kedaluwarsa</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
													<th>ID Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Satuan</th>
                                                    <th>Tanggal Retur</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
@php $no = 1; @endphp
@foreach($exp as $item)
<tr>
    <td>{{ $no++ }}</td>
    <td>{{ $item->id_barang }}</td>
    <td>{{ $item->nama_barang }}</td>
    <td>{{ $item->jumlah }}</td>
    <td>{{ $item->satuan }}</td>
    <td>{{ $item->tanggal_kadaluarsa }}</td>
    <td>{{ $item->keterangan }}</td>
    <td class="action-buttons">
        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalEditExp{{ $item->id }}">
            <i class="fas fa-edit"></i> Edit
        </button>
        <form action="{{ route('exp.destroy', $item->id) }}" method="POST" style="display:inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">
                <i class="fas fa-trash-alt"></i> Hapus
            </button>
        </form>
    </td>
</tr>
<!-- Modal Edit Exp -->
<div class="modal fade" id="modalEditExp{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditExpLabel{{ $item->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditExpLabel{{ $item->id }}">Edit Data Barang Kedaluwarsa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('exp.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="id_barang">ID Barang</label>
                <input type="text" class="form-control" name="id_barang" value="{{ $item->id_barang }}" required>
              </div>
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" value="{{ $item->nama_barang }}" required>
              </div>
              <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" name="stok" value="{{ $item->stok }}" required>
              </div>
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" name="satuan" value="{{ $item->satuan }}" required>
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="tanggal_kadaluarsa">Tanggal Kedaluwarsa</label>
                <input type="date" class="form-control" name="tanggal_kadaluarsa" value="{{ $item->tanggal_kadaluarsa }}" required>
              </div>
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" name="jumlah" value="{{ $item->jumlah }}" required>
              </div>
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" name="keterangan" value="{{ $item->keterangan }}">
              </div>
              <div class="form-group">
                <label for="foto">Upload Foto Barang</label>
                <input class="form-control" type="file" name="foto">
                @if($item->foto)
                  <img src="{{ asset('uploads/exp/' . $item->foto) }}" width="50" class="mt-2"/>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
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

    <!-- Modal Tambah Barang Kadaluarsa -->
<div class="modal fade" id="modalTambahExp" tabindex="-1" role="dialog" aria-labelledby="modalTambahExpLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahExpLabel">Tambah Data Barang Kedaluwarsa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('exp.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="id_barang">ID Barang</label>
                <input type="text" class="form-control" id="id_barang" name="id_barang" required>
              </div>
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
              </div>
              <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" required>
              </div>
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" required>
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="tanggal_kadaluarsa">Tanggal Kedaluwarsa</label>
                <input type="date" class="form-control" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" required>
              </div>
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
              </div>
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan">
              </div>
              <div class="form-group">
                <label for="foto">Upload Foto Barang</label>
                <input class="form-control" type="file" id="foto" name="foto">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
    
</body>

</html>