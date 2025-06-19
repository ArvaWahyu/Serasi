@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white shadow rounded-lg">
    <h2 class="text-xl font-bold mb-4">Tambah Aspirasi</h2>

    <form action="{{ route('admin.serasi.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Nama</label>
                <input type="text" name="nama" class="form-input" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">NPM</label>
                <input type="text" name="npm" class="form-input" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" class="form-input" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Telpon</label>
                <input type="text" name="telpon" class="form-input" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Kategori</label>
                <select name="kategori" class="form-input" required>
                    <option value="">-- Pilih --</option>
                    <option value="akademik">Akademik</option>
                    <option value="non-akademik">Non-Akademik</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Status</label>
                <select name="status" class="form-input">
                    <option value="tinjau">Tinjau</option>
                    <option value="proses">Proses</option>
                    <option value="tolak">Tolak</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-1">Deskripsi Laporan</label>
                <textarea name="deskripsi_laporan" rows="4" class="form-input resize-none" required></textarea>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-1">Pesan Balasan</label>
                <textarea name="pesan_balasan" rows="3" class="form-input resize-none"></textarea>
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="btn-primary">Simpan</button>
            <a href="{{ route('admin.serasi.index') }}" class="ml-2 text-gray-600 hover:underline">Kembali</a>
        </div>
    </form>
</div>
@endsection
