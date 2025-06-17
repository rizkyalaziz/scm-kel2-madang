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
        <x-retur></x-retur>
        <!-- Sidebar-->

        <div class="main-panel">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div class="page-header">
                                <h4 class="page-title text-white"><i class="fas fa-box-open"></i> Barang
                                    Retur</h4>
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
								<!-- Tombol Tambah Data -->
<div class="ml-md-auto py-2 py-md-0">
    <button class="btn btn-info" data-toggle="modal" data-target="#modalTambahRetur">
        <i class="fa fa-plus"></i> Tambah Data
    </button>
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
                                    <div class="card-title">Data Barang Retur</div>
                                    <!-- Hapus tombol tambah data di header card, sisakan tombol/modal yang di bawah saja -->
                                </div>
                                <div class="card-body ">
                                    <!-- Hapus form input yang langsung di halaman, hanya tampilkan tombol/modal -->
                                    <!-- Modal Tambah Retur sudah ada di bawah -->
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
                                    <h4 class="card-title">Data Barang Retur</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="basic-datatables"
                                            class="display table table-striped table-hover text-center">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
													<th>Id Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Keterangan</th>
                                                    <th>Tanggal Retur</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
													<th>Id Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Keterangan</th>
                                                    <th>Tanggal Retur</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach($retur as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->barang_id }}</td>
                                                    <td>{{ $item->nama_barang }}</td>
                                                    <td>{{ $item->jumlah }}</td>
                                                    <td>{{ $item->keterangan }}</td>
                                                    <td>{{ $item->tanggal_retur }}</td>
                                                    <td class="action-buttons">
                                                        <!-- Tombol edit/hapus bisa ditambahkan di sini -->
                                                    </td>
                                                </tr>
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

    <!-- Modal Data Barang -->
<div class="modal fade" id="modalDataBarang" tabindex="-1" role="dialog" aria-labelledby="modalDataBarangLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDataBarangLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok Minimum</th>
                <th>Satuan</th>
              </tr>
            </thead>
            <tbody>
              @foreach(App\Models\Databarang::with(['kategori','satuan'])->get() as $barang)
              <tr>
                <td>{{ $barang->id_barang }}</td>
                <td>{{ $barang->nama }}</td>
                <td>{{ $barang->kategori->nama ?? '-' }}</td>
                <td>{{ $barang->stok_minimum }}</td>
                <td>{{ $barang->satuan->nama ?? '-' }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Retur -->
<div class="modal fade" id="modalTambahRetur" tabindex="-1" role="dialog" aria-labelledby="modalTambahReturLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahReturLabel">Tambah Data Barang Retur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('returbarang.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="barang_id">Pilih Barang</label>
            <select class="form-control" id="barang_id" name="barang_id" required onchange="updateNamaBarang()">
              <option value="">-- Pilih Barang --</option>
              @foreach(App\Models\Databarang::all() as $barang)
                <option value="{{ $barang->id }}" data-nama="{{ $barang->nama }}">{{ $barang->id_barang }} - {{ $barang->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" readonly required>
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
            <label for="tanggal_retur">Tanggal Retur</label>
            <input type="date" class="form-control" id="tanggal_retur" name="tanggal_retur" required>
          </div>
          <div class="form-group">
            <label for="cabang">Cabang</label>
            <input type="text" class="form-control" id="cabang" name="cabang">
          </div>
          <div class="form-group">
            <label for="stokker">Stokker</label>
            <input type="text" class="form-control" id="stokker" name="stokker">
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
<script>
function updateNamaBarang() {
    var select = document.getElementById('barang_id');
    var nama = select.options[select.selectedIndex].getAttribute('data-nama');
    document.getElementById('nama_barang').value = nama || '';
}
</script>
    
</body>

</html>