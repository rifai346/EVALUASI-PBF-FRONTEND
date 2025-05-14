@extends('layout')

@section('title', 'Edit Mahasiswa')

@section('isi')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Mahasiswa</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('mahasiswa.index') }}">Dosen</a></li>
        <li class="breadcrumb-item active">Edit Data</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i>
            Form Edit Mahasiswa
        </div>
        <div class="card-body">
            <form action="{{ route('mahasiswa.update', $mahasiswa['id']) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $mahasiswa['nama']) }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nidn" class="form-label">NIM</label>
                    <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim', $mahasiswa['nim']) }}" required>
                    @error('nim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $mahasiswa['email']) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="prodi" class="form-label">Program Studi</label>
                    <select class="form-select @error('prodi') is-invalid @enderror" id="prodi" name="prodi" required>
                        <option value="" disabled>Pilih Prodi</option>
                        <option value="Teknik Informatika" {{ old('prodi', $mahasiswa['prodi']) == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                        <option value="Sistem Informasi" {{ old('prodi', $mahasiswa['prodi']) == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                        <option value="Teknik Komputer" {{ old('prodi', $mahasiswa['prodi']) == 'Teknik Komputer' ? 'selected' : '' }}>Teknik Komputer</option>
                    </select>
                    @error('prodi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Update</button>
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger"><i class="fas fa-times me-1"></i> Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
