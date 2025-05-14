@extends('layout')

@section('title', 'Dosen')
@section('judul', 'Dosen')

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
            <i class="fas fa-table me-1"></i> Daftar Dosen
        </div>
        <div class="card-body">
            <a href="{{ route('dosen.create') }}" class="btn btn-danger mb-3">
                <i class="ni ni-button-play"></i> Tambah Dosen
            </a>
            <table id="datatablesSimple" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>NIDN</th>
                        <th>Email</th>
                        <th>Prodi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dosen as $dsn)
                    <tr>
                        <td>{{ $dsn['id'] }}</td>
                        <td>{{ $dsn['nama'] }}</td>
                        <td>{{ $dsn['nidn'] }}</td>
                        <td>{{ $dsn['email'] }}</td>
                        <td>{{ $dsn['prodi'] }}</td>
                        <td>
                            <a href="{{ route('dosen.edit', $dsn['id']) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('dosen.destroy', $dsn['id']) }}" method="POST" style="display: inline-block;">
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