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
        <x-laporan-retur></x-laporan-retur>
        <!-- Sidebar-->

        <div class="main-panel">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div class="page-header">
                                <h4 class="page-title text-white"><i class="fas fa-database pr-2"></i>Laporan Barang
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



                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">
                    <div class="row mt--2">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Filter Data Barang</div>
                                </div>
                                <div class="card-body ">
                                    <form method="GET" action="{{ route('laporan-retur') }}" class="w-100">
                                        <div class="row">
                                            <div class="col-md-3 col-lg-3">
                                                <div class="form-group">
                                                    <label for="tanggal_awal">Tanggal Awal</label>
                                                    <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" value="{{ request('tanggal_awal') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-3">
                                                <div class="form-group">
                                                    <label for="tanggal_akhir">Tanggal Akhir</label>
                                                    <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 py-3 py-md-0 mt-sm-4 d-flex gap-2 align-items-center">
                                                <button class="btn btn-primary mr-4" type="submit">
                                                    <span class="btn-label">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                    Tampilkan
                                                </button>
                                                <button class="btn btn-warning mr-4" type="button" onclick="window.print()">
                                                    <span class="btn-label">
                                                        <i class="icon-printer"></i>
                                                    </span>
                                                    Cetak Data
                                                </button>
                                                <a class="btn btn-success" href="{{ route('laporan-retur.export-excel', ['tanggal_awal' => request('tanggal_awal'), 'tanggal_akhir' => request('tanggal_akhir')]) }}">
                                                    <span class="btn-label">
                                                        <i class="fas fa-file-excel"></i>
                                                    </span>
                                                    Kirim Data (Excel)
                                                </a>
                                            </div>
                                        </div>
                                    </form>
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
                                    <h4 class="card-title">Data Laporan Barang Retur</h4>
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
                                                    <th>Tanggal Retur</th>
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
                                                    <td>{{ $item->satuan ?? '-' }}</td>
                                                    <td>{{ $item->tanggal_retur }}</td>
                                                    <td class="action-buttons">
                                                        <!-- Aksi edit/hapus jika diperlukan -->
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

    
</body>

</html>