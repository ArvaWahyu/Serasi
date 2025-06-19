{{-- resources/views/admin/users/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    {{-- Sidebar --}}
    @include('layouts.sidebar')

    <div class="flex-1 p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">Manajemen User</h1>
            <a href="{{ route('admin.users.create') }}" class="btn-primary">Tambah</a>
        </div>

        {{-- Alert --}}
        @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
        @endif

        {{-- Table --}}
        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td class="p-2">{{ $user->name }}</td>
                        <td class="p-2">{{ $user->email }}</td>
                        <td class="p-2">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="p-2 flex gap-3">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">Belum ada data user.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection