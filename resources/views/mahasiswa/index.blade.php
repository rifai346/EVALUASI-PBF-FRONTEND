@extends('layout')

@section('title', 'Mahasiswa')
@section('judul', 'Mahasiswa')

@section('isi')
<div class="container-fluid px-4">
    @if (Session::has('create'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Ditambahkan!</strong> Dosen baru telah berhasil ditambahkan.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (Session::has('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong> Data Dosen telah dihapus.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (Session::has('update'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Diperbarui!</strong> Data Dosen telah diperbarui.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <h1 class="mt-4">@yield('judul')</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">@yield('judul')</li>
    </ol>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i> Daftar Mahasiswa
        </div>
        <div class="card-body">
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-danger mb-3">
                <i class="ni ni-button-play">Tambah Mahasiswa</i> 
            </a>
            <table id="datatablesSimple" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Email</th>
                        <th>Prodi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswa as $mhs)
                    <tr>
                        <td>{{ $mhs['id'] }}</td>
                        <td>{{ $mhs['nama'] }}</td>
                        <td>{{ $mhs['nim'] }}</td>
                        <td>{{ $mhs['email'] }}</td>
                        <td>{{ $mhs['prodi'] }}</td>
                        <td>
                            <a href="{{ route('mahasiswa.edit', $mhs['id']) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('mahasiswa.destroy', $mhs['id']) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</button>
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