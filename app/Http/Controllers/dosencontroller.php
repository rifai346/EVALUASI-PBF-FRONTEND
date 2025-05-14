<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\dosen;
use Illuminate\Http\Request;

class dosencontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:8080/Dosen');
        $dosen = $response->json();
        return view ('dosen.index', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = dosen::all();
        return view('dosen.create', ['dosen' => $dosen]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nidn' => 'required',
            'email' => 'required',
            'prodi' => 'required',
        ]);

        $response = Http::post('http://localhost:8080/Dosen', [
            'nama' => $request->nama,
            'nidn' => $request->nidn,
            'email' => $request->email,
            'prodi' => $request->prodi,
        ]);

        if ($response->successful()){
            return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan.');
        } else {
            return redirect()->route('dosen.index')->with('error', 'Gagal menambahkan data dosen.');
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
        $dosen = dosen::find($id);
        return view('dosen.edit', ['dosen' => $dosen]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'nidn' => 'required',
            'email' => 'required',
            'prodi' => 'required',
        ]);

        $response = Http::put('http://localhost:8080/Dosen/' . $id, [
            'nama' => $request->nama,
            'nidn' => $request->nidn,
            'email' => $request->email,
            'prodi' => $request->prodi,
        ]);

        if ($response->successful()) {
            return redirect()->route('dosen.index')->with('success', 'Data mahasiswa berhasil diubah.');
        } else {
            return redirect()->route('dosen.index')->with('error', 'Gagal mengubah data mahasiswa.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete('http://localhost:8080/Dosen/'.$id);
        if ($response->successful()) {
            return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus.');
        } else {
            return redirect()->route('dosen.index')->with('error', 'Gagal menghapus data dosen.');
        }
    }
}
