@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white shadow rounded-lg">
    <h2 class="text-xl font-bold mb-4">Edit Aspirasi</h2>

    <form action="{{ route('admin.serasi.update', $serasi->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Nama</label>
                <input type="text" name="nama" class="form-input" value="{{ $serasi->nama }}" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">NPM</label>
                <input type="text" name="npm" class="form-input" value="{{ $serasi->npm }}" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" class="form-input" value="{{ $serasi->email }}" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Telpon</label>
                <input type="text" name="telpon" class="form-input" value="{{ $serasi->telpon }}" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Kategori</label>
                <select name="kategori" class="form-input" required>
                    <option value="akademik" {{ $serasi->kategori == 'akademik' ? 'selected' : '' }}>Akademik</option>
                    <option value="non-akademik" {{ $serasi->kategori == 'non-akademik' ? 'selected' : '' }}>Non-Akademik</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Status</label>
                <select name="status" class="form-input">
                    <option value="tinjau" {{ $serasi->status == 'tinjau' ? 'selected' : '' }}>Tinjau</option>
                    <option value="proses" {{ $serasi->status == 'proses' ? 'selected' : '' }}>Proses</option>
                    <option value="tolak" {{ $serasi->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
                    <option value="selesai" {{ $serasi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-1">Deskripsi Laporan</label>
                <textarea name="deskripsi_laporan" rows="4" class="form-input resize-none" required>{{ $serasi->deskripsi_laporan }}</textarea>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-1">Pesan Balasan</label>
                <textarea name="pesan_balasan" rows="3" class="form-input resize-none">{{ $serasi->pesan_balasan }}</textarea>
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="btn-primary bg-green-600 hover:bg-green-700">Update</button>
            <a href="{{ route('admin.serasi.index') }}" class="ml-2 text-gray-600 hover:underline">Kembali</a>
        </div>
    </form>
</div>
@endsection
