<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil jumlah mahasiswa
        $mahasiswaResponse = Http::get('http://localhost:8080/Mahasiswa');
        $jumlahMahasiswa = count($mahasiswaResponse->json());

        // Ambil jumlah dosen
        $dosenResponse = Http::get('http://localhost:8080/Dosen');
        $jumlahDosen = count($dosenResponse->json());

        return view('dashboard', compact('jumlahMahasiswa', 'jumlahDosen'));
    }
}
