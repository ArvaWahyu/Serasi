@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white shadow rounded-lg">
    <h2 class="text-xl font-bold mb-4">Tambah Aspirasi</h2>

    <form action="{{ route('admin.serasi.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Nama</label>
                <input type="text" name="nama" class="form-input @error('nama') border-red-500 @enderror" value="{{ old('nama') }}" required>
                @error('nama')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">NPM</label>
                <input type="text" name="npm" class="form-input @error('npm') border-red-500 @enderror" value="{{ old('npm') }}" required>
                @error('npm')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" class="form-input @error('email') border-red-500 @enderror" value="{{ old('email') }}" required>
                @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Telpon</label>
                <input type="text" name="telpon" class="form-input @error('telpon') border-red-500 @enderror" value="{{ old('telpon') }}" required>
                @error('telpon')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Kategori</label>
                <select name="kategori" class="form-input @error('kategori') border-red-500 @enderror" required>
                    <option value="">-- Pilih --</option>
                    <option value="akademik" {{ old('kategori') == 'akademik' ? 'selected' : '' }}>Akademik</option>
                    <option value="non-akademik" {{ old('kategori') == 'non-akademik' ? 'selected' : '' }}>Non-Akademik</option>
                </select>
                @error('kategori')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Status</label>
                <select name="status" class="form-input @error('status') border-red-500 @enderror">
                    <option value="tinjau" {{ old('status') == 'tinjau' ? 'selected' : '' }}>Tinjau</option>
                    <option value="proses" {{ old('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                    <option value="tolak" {{ old('status') == 'tolak' ? 'selected' : '' }}>Tolak</option>
                    <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                @error('status')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-1">Deskripsi Laporan</label>
                <textarea name="deskripsi_laporan" rows="4" class="form-input resize-none @error('deskripsi_laporan') border-red-500 @enderror" required oninvalid="this.setCustomValidity('Harap masukkan laporan Anda.')" oninput="this.setCustomValidity('')">{{ old('deskripsi_laporan') }}</textarea>
                @error('deskripsi_laporan')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-1">Pesan Balasan</label>
                <textarea name="pesan_balasan" rows="3" class="form-input resize-none @error('pesan_balasan') border-red-500 @enderror">{{ old('pesan_balasan') }}</textarea>
                @error('pesan_balasan')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="btn-primary">Simpan</button>
            <a href="{{ route('admin.serasi.index') }}" class="ml-2 text-gray-600 hover:underline">Kembali</a>
        </div>
    </form>
</div>
@endsection
