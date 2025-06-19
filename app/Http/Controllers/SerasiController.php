<?php

namespace App\Http\Controllers;

use App\Models\Serasi;
use Illuminate\Http\Request;

class SerasiController extends Controller
{
    /**
     * Halaman depan: Menampilkan semua data Serasi
     */

    public function index(Request $request)
{
    $query = Serasi::query();

    // Filter pencarian
    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('npm', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->filled('kategori')) {
        $query->where('kategori', $request->kategori);
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Ambil jumlah per halaman dari request, default 10
    $perPage = $request->input('per_page', 10);

    $serasiList = $query->latest()->paginate($perPage)->withQueryString();

    return view('welcome', compact('serasiList'));
}

    /**
     * Halaman depan: Simpan aspirasi dari publik
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:20',
            'email' => 'required|email',
            'telpon' => 'required|string|max:15',
            'kategori' => 'required|in:akademik,non-akademik',
            'deskripsi_laporan' => 'required|string',
        ]);

        Serasi::create([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'email' => $request->email,
            'telpon' => $request->telpon,
            'kategori' => $request->kategori,
            'deskripsi_laporan' => $request->deskripsi_laporan,
            'status' => 'tinjau',
            'pesan_balasan' => null,
        ]);

        return redirect()->back()->with('success', 'Aspirasi berhasil dikirim!');
    }

    /**
     * Halaman admin: Tampilkan semua data
     */
   public function indexAdmin(Request $request)
{
    $query = Serasi::query();

    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('npm', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->filled('kategori')) {
        $query->where('kategori', $request->kategori);
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $perPage = $request->input('per_page', 10);

    $serasiList = $query->latest()->paginate($perPage)->withQueryString();

    return view('admin.serasi.index', compact('serasiList'));
}

    /**
     * Halaman admin: Tampilkan form tambah data
     */
    public function create()
    {
        return view('admin.serasi.create');
    }

    /**
     * Halaman admin: Simpan data aspirasi baru
     */
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:20',
            'email' => 'required|email',
            'telpon' => 'required|string|max:15',
            'kategori' => 'required|in:akademik,non-akademik',
            'deskripsi_laporan' => 'required|string',
            'status' => 'required|in:tinjau,proses,tolak,selesai',
            'pesan_balasan' => 'nullable|string',
        ]);

        Serasi::create($request->all());

        return redirect()->route('admin.serasi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Halaman admin: Edit data aspirasi
     */
    public function edit($id)
    {
        $serasi = Serasi::findOrFail($id);
        return view('admin.serasi.edit', compact('serasi'));
    }

    /**
     * Halaman admin: Update data aspirasi
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:tinjau,proses,tolak,selesai',
            'pesan_balasan' => 'nullable|string',
        ]);

        $serasi = Serasi::findOrFail($id);
        $serasi->update($request->all());

        return redirect()->route('admin.serasi.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Halaman admin: Hapus data
     */
    public function destroy($id)
    {
        $serasi = Serasi::findOrFail($id);
        $serasi->delete();

        return redirect()->route('admin.serasi.index')->with('success', 'Data berhasil dihapus.');
    }
}
