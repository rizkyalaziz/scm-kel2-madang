<x-layout>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="card-title text-white mb-0">Stok Barang Terendah</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Jenis</th>
                                    <th>Satuan</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($stok_terendah as $barang)
                                <tr>
                                    <td>{{ $barang->nama }}</td>
                                    <td>{{ $barang->kategori->nama ?? '-' }}</td>
                                    <td>{{ $barang->jenis->nama ?? '-' }}</td>
                                    <td>{{ $barang->satuan->nama ?? '-' }}</td>
                                    <td>{{ $barang->stok }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="text-center">Tidak ada data</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success">
                    <h5 class="card-title text-white mb-0">Barang Masuk Terbaru</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($barang_masuk_terbaru as $masuk)
                                <tr>
                                    <td>{{ $masuk->tanggal_masuk }}</td>
                                    <td>{{ $masuk->databarang->nama ?? '-' }}</td>
                                    <td>{{ $masuk->jumlah_masuk }}</td>
                                    <td>{{ $masuk->satuan->nama ?? '-' }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="4" class="text-center">Tidak ada data</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-danger">
                    <h5 class="card-title text-white mb-0">Barang Keluar Terbaru</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($barang_keluar_terbaru as $keluar)
                                <tr>
                                    <td>{{ $keluar->tanggal_keluar }}</td>
                                    <td>{{ $keluar->nama_barang }}</td>
                                    <td>{{ $keluar->jumlah }}</td>
                                    <td>{{ $keluar->keterangan }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="4" class="text-center">Tidak ada data</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>