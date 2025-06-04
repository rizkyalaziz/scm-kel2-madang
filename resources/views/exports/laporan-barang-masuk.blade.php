<table>
    <thead>
        <tr>
            <th>No</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Satuan</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach($barangmasuk as $bm)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $bm->databarang->id_barang ?? '-' }}</td>
            <td>{{ $bm->databarang->nama ?? '-' }}</td>
            <td>{{ $bm->jumlah_masuk }}</td>
            <td>{{ $bm->satuan->nama ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
