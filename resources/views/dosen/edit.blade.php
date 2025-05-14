@extends('layout')

@section('title', 'Edit Dosen')

@section('isi')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Dosen</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dosen.index') }}">Dosen</a></li>
        <li class="breadcrumb-item active">Edit Data</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i>
            Form Edit Dosen
        </div>
        <div class="card-body">
            <form action="{{ route('dosen.update', $dosen['id']) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $dosen['nama']) }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nidn" class="form-label">NIDN</label>
                    <input type="text" class="form-control @error('nidn') is-invalid @enderror" id="nidn" name="nidn" value="{{ old('nidn', $dosen['nidn']) }}" required>
                    @error('nidn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $dosen['email']) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="prodi" class="form-label">Program Studi</label>
                    <select class="form-select @error('prodi') is-invalid @enderror" id="prodi" name="prodi" required>
                        <option value="" disabled>Pilih Prodi</option>
                        <option value="Teknik Informatika" {{ old('prodi', $dosen['prodi']) == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                        <option value="Sistem Informasi" {{ old('prodi', $dosen['prodi']) == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                        <option value="Teknik Komputer" {{ old('prodi', $dosen['prodi']) == 'Teknik Komputer' ? 'selected' : '' }}>Teknik Komputer</option>
                    </select>
                    @error('prodi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Update</button>
                    <a href="{{ route('dosen.index') }}" class="btn btn-danger"><i class="fas fa-times me-1"></i> Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
