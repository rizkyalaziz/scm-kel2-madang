@php $no = 1; @endphp
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Tanggal Keluar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barangkeluar as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->databarang->id_barang ?? '-' }}</td>
            <td>{{ $item->databarang->nama ?? '-' }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->databarang->satuan->nama ?? '-' }}</td>
            <td>{{ $item->tanggal_keluar }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
