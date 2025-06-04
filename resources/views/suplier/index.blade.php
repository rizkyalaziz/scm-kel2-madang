@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Daftar Supplier</h3>
            <a href="{{ route('suplier.create') }}" class="btn btn-primary">Tambah Supplier</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($supliers as $suplier)
                    <tr>
                        <td>{{ $suplier->id_suplier }}</td>
                        <td>{{ $suplier->nama }}</td>
                        <td>{{ $suplier->telepon }}</td>
                        <td>{{ $suplier->email }}</td>
                        <td>{{ $suplier->alamat }}</td>
                        <td>
                            <a href="{{ route('suplier.edit', $suplier->id_suplier) }}" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
