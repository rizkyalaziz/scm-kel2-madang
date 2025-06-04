@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Suplier</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card mb-4">
        <div class="card-header">Tambah Suplier</div>
        <div class="card-body">
            <form action="{{ route('suplier.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label>ID Suplier</label>
                    <input type="text" name="id_suplier" class="form-control" value="{{ old('id_suplier') }}" required>
                </div>
                <div class="form-group mb-2">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>
                <div class="form-group mb-2">
                    <label>Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}" required>
                </div>
                <div class="form-group mb-2">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="form-group mb-2">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Daftar Suplier</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Suplier</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suplier as $item)
                    <tr>
                        <td>{{ $item->id_suplier }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->telepon }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <a href="{{ route('suplier.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('suplier.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
