<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // 1. READ (Menampilkan daftar mahasiswa)
    public function index()
    {
        // Menggunakan ORM untuk mengambil mahasiswa beserta data jurusannya
        $mahasiswas = Mahasiswa::with('jurusan')->latest()->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    // 2. CREATE (Menampilkan form tambah data)
    public function create()
    {
        // Mengambil data jurusan untuk pilihan di dropdown form
        $jurusans = Jurusan::all();
        return view('mahasiswa.create', compact('jurusans'));
    }

    // 3. STORE (Memproses penyimpanan data baru dari form)
    public function store(Request $request)
    {
        // SYARAT TUGAS: Validasi Input Sisi Server
        $request->validate([
            'nim' => 'required|numeric|unique:mahasiswas,nim',
            'nama' => 'required|string|max:255',
            'jurusan_id' => 'required|exists:jurusans,id'
        ], [
            // Pesan error agar mudah dipahami saat demo aplikasi
            'nim.required' => 'NIM wajib diisi.',
            'nim.unique' => 'NIM sudah terdaftar.',
            'nama.required' => 'Nama wajib diisi.',
            'jurusan_id.required' => 'Silakan pilih jurusan.'
        ]);

        // SYARAT TUGAS: Gunakan ORM untuk menyimpan data
        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    // 4. EDIT (Menampilkan form edit data)
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $jurusans = Jurusan::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'jurusans'));
    }

    // 5. UPDATE (Memproses perubahan data dari form edit)
    public function update(Request $request, string $id)
    {
        // Validasi input (NIM divalidasi agar tidak bentrok dengan milik orang lain)
        $request->validate([
            'nim' => 'required|numeric|unique:mahasiswas,nim,' . $id,
            'nama' => 'required|string|max:255',
            'jurusan_id' => 'required|exists:jurusans,id'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    // 6. DELETE (Menghapus data)
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}