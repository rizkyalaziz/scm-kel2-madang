<x-layout>
    <x-header :jumlah_notif="$jumlah_notif" :barang_minimum="$barang_minimum" />
    <div class="container mt-5">
        <h3 class="mb-4">Ringkasan Stok Barang</h3>
        <style>
        .card.card-hover:hover {
            box-shadow: 0 8px 24px rgba(44, 62, 80, 0.18), 0 1.5px 6px rgba(52, 152, 219, 0.12);
            transform: translateY(-4px) scale(1.03);
            transition: all 0.2s cubic-bezier(.4,2,.6,1);
            cursor: pointer;
            border: 1.5px solid #2980b9;
        }
        </style>
        <div class="row">
            <div class="col-md-4 mb-3">
                <a href="{{ url('/kategori') }}" style="text-decoration:none;">
                    <div class="card card-hover shadow-sm h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="mr-3">
                                <div class="icon-big text-center bg-primary text-white rounded-circle"
                                    style="width:60px; height:60px; display:flex; align-items:center; justify-content:center;">
                                    <i class="fas fa-database fa-2x"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-1" style="color:#3b5998;">Kategori Barang</h5>
                                <span class="h4 font-weight-bold">{{ $kategori_count ?? 1 }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ url('/jenis') }}" style="text-decoration:none;">
                    <div class="card card-hover shadow-sm h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="mr-3">
                                <div class="icon-big text-center bg-info text-white rounded-circle"
                                    style="width:60px; height:60px; display:flex; align-items:center; justify-content:center;">
                                    <i class="fas fa-folder fa-2x"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-1" style="color:#2980b9;">Jenis Barang</h5>
                                <span class="h4 font-weight-bold">{{ $jenis_count ?? 1 }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ url('/satuan') }}" style="text-decoration:none;">
                    <div class="card card-hover shadow-sm h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="mr-3">
                                <div class="icon-big text-center bg-success text-white rounded-circle"
                                    style="width:60px; height:60px; display:flex; align-items:center; justify-content:center;">
                                    <i class="fas fa-cube fa-2x"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-1" style="color:#27ae60;">Satuan Barang</h5>
                                <span class="h4 font-weight-bold">{{ $satuan_count ?? 1 }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Jenis</th>
                                <th>Jumlah Stok</th>
                                <th>Stok Minimum</th>
                                <th>Satuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barang as $i => $item)
                            <tr @if($item->jumlah_stok <= $item->stok_minimum) style="background-color: #ffe5e5; color: #c0392b; font-weight: bold;" title="Stok di bawah minimum!" @endif>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $item->id_barang }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kategori->nama ?? '-' }}</td>
                                <td>{{ $item->jenis->nama ?? '-' }}</td>
                                <td>{{ $item->jumlah_stok }}</td>
                                <td>{{ $item->stok_minimum }}</td>
                                <td>{{ $item->satuan->nama ?? '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>