{{-- resources/views/admin/serasi/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white shadow rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Data Aspirasi</h1>
        <a href="{{ route('admin.serasi.create') }}" class="btn-primary">Tambah</a>
    </div>

    @if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form method="GET" action="{{ route('admin.serasi.index') }}" class="mb-4 flex flex-col md:flex-row md:items-center gap-4">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama/NPM/Email" class="border p-2 rounded w-full md:w-1/4">

        <select name="kategori" class="border p-2 rounded w-full md:w-1/5">
            <option value="">Semua Kategori</option>
            <option value="akademik" {{ request('kategori') == 'akademik' ? 'selected' : '' }}>Akademik</option>
            <option value="non-akademik" {{ request('kategori') == 'non-akademik' ? 'selected' : '' }}>Non-Akademik</option>
        </select>

        <select name="status" class="border p-2 rounded w-full md:w-1/5">
            <option value="">Semua Status</option>
            <option value="tinjau" {{ request('status') == 'tinjau' ? 'selected' : '' }}>Tinjau</option>
            <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Proses</option>
            <option value="tolak" {{ request('status') == 'tolak' ? 'selected' : '' }}>Tolak</option>
            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Terapkan</button>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border border-gray-300 text-sm">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="table-header">Nama</th>
                    <th class="table-header">NPM</th>
                    <th class="table-header">Email</th>
                    <th class="table-header">Telpon</th>
                    <th class="table-header">Kategori</th>
                    <th class="table-header">Deskripsi</th>
                    <th class="table-header">Status</th>
                    <th class="table-header">Balasan</th>
                    <th class="table-header">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($serasiList as $item)
                <tr class="hover:bg-gray-50">
                    <td class="table-cell">{{ $item->nama }}</td>
                    <td class="table-cell">{{ $item->npm }}</td>
                    <td class="table-cell">{{ $item->email }}</td>
                    <td class="table-cell">{{ $item->telpon }}</td>
                    <td class="table-cell">{{ $item->kategori }}</td>
                    <td class="table-cell">{{ $item->deskripsi_laporan }}</td>
                    <td class="table-cell">
                        <form action="{{ route('admin.serasi.update', $item->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()" class="form-select text-sm rounded border-gray-300 focus:ring focus:ring-blue-200" style="min-width: 120px;">
                                <option value="tinjau" {{ $item->status == 'tinjau' ? 'selected' : '' }}>Tinjau</option>
                                <option value="proses" {{ $item->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                <option value="tolak" {{ $item->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
                                <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            <input type="hidden" name="pesan_balasan" value="{{ $item->pesan_balasan }}">
                        </form>
                    </td>
                <td class="table-cell">
                    <form action="{{ route('admin.serasi.update', $item->id) }}" method="POST" class="flex items-center gap-2">
                        @csrf
                        @method('PUT')
                        <textarea name="pesan_balasan" rows="1" class="border rounded p-1 text-sm resize-none w-full" style="min-width: 150px;">{{ $item->pesan_balasan }}</textarea>
                        <input type="hidden" name="status" value="{{ $item->status }}">
                        <button type="submit" class="btn-primary bg-green-600 hover:bg-green-700 px-3 py-1 text-sm">Balas</button>
                    </form>
                </td>
                    <td class="table-cell">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.serasi.edit', $item->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form method="POST" action="{{ route('admin.serasi.destroy', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="p-4 text-center text-gray-500">Tidak ada data.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="flex flex-col md:flex-row justify-between items-center mt-4 px-4 gap-4">
            {{-- Dropdown per_page --}}
            <form method="GET" class="flex items-center gap-2">
                <label for="per_page" class="text-sm text-gray-700">Tampilkan</label>
                <select name="per_page" id="per_page" onchange="this.form.submit()" class="form-select w-20 text-sm rounded border-gray-300 focus:ring focus:ring-blue-200">
                    <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                </select>
                <span class="text-sm text-gray-700">data per halaman</span>

                {{-- Tetap kirim query filter lain --}}
                @foreach(request()->except(['per_page', 'page']) as $name => $value)
                <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                @endforeach
            </form>

            {{-- Pagination --}}
            <div class="text-sm">
                {{ $serasiList->links() }}
            </div>
        </div>
    </div>
</div>
@endsection