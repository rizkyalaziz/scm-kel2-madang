@php $no = 1; @endphp
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Tanggal Retur</th>
        </tr>
    </thead>
    <tbody>
        @foreach($retur as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->barang_id }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->satuan ?? '-' }}</td>
            <td>{{ $item->tanggal_retur }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
