@extends('layout')

@section('title', 'Dashboard')

@section('isi')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <h4>Jumlah Mahasiswa</h4>
                    <h2>{{ $jumlahMahasiswa }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="{{ route('mahasiswa.index') }}" class="small text-white stretched-link">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <h4>Jumlah Dosen</h4>
                    <h2>{{ $jumlahDosen }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="{{ route('dosen.index') }}" class="small text-white stretched-link">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
