<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Tampilkan daftar mahasiswa
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Tampilkan form tambah mahasiswa
     */
    public function create()
    {
        $data_mk = \App\Models\Matakuliah::all();
        return view('mahasiswa.create', compact('data_mk'));
    }

    /**
     * Simpan data mahasiswa baru
     */
    public function store(Request $request)
    {
        // Validasi input sesuai standar modul
        $request->validate([ 
            'nim' => 'required|unique:mahasiswas,nim', 
            'nama' => 'required', 
            'kelas' => 'required', 
            'matakuliah_id' => 'required|exists:matakuliahs,id'
        ]); 

        // Menangkap semua data input dari form
        $data = $request->all();

        // Menyisipkan ID user yang sedang login ke data yang akan disimpan
        $data['user_id'] = auth()->id();

        // Simpan ke database
        Mahasiswa::create($data);

        return redirect()->route('mahasiswa.index')
                        ->with('success', 'Data mahasiswa berhasil ditambahkan'); 
    }

    /**
     * Tampilkan form edit
     */
    public function edit($nim)
    {
        // Mencari data mahasiswa berdasarkan NIM
        $mahasiswa = Mahasiswa::findOrFail($nim);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update data mahasiswa
     */
    public function update(Request $request, $nim)
    {
        $request->validate([
            'nama'       => 'required|string|max:100',
            'kelas'      => 'required|string|max:20',
            'matakuliah_id' => 'required|exists:matakuliahs,id',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    /**
     * Hapus data mahasiswa
     */
    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Mahasiswa berhasil dihapus!');
    }
}