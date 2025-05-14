<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class mahasiswacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:8080/Mahasiswa');
        // Cek apakah response sukses
            $mahasiswa = $response->json();
            return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswa = mahasiswa::all();
        return view('mahasiswa.create', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required',
            'prodi' => 'required',
        ]);

        $response = Http::post('http://localhost:8080/Mahasiswa', [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'prodi' => $request->prodi,
        ]);

        if ($response->successful()) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
        } else {
            return redirect()->route('mahasiswa.index')->with('error', 'Gagal menambahkan data mahasiswa.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = mahasiswa::find($id);
        return view('mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required',
            'prodi' => 'required',
        ]);

        $response = Http::put('http://localhost:8080/Mahasiswa/' . $id, [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'prodi' => $request->prodi,
        ]);

        if ($response->successful()) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diubah.');
        } else {
            return redirect()->route('mahasiswa.index')->with('error', 'Gagal mengubah data mahasiswa.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete('http://localhost:8080/Mahasiswa/' . $id);
        if ($response->successful()) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
        } else {
            return redirect()->route('mahasiswa.index')->with('error', 'Gagal menghapus data mahasiswa.');
        }
    }
}
