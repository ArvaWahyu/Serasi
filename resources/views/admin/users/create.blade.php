{{-- resources/views/admin/users/create.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    {{-- Sidebar --}}
    @include('layouts.sidebar')

    <div class="flex-1 p-6">
        <h1 class="text-xl font-bold mb-4">Tambah User</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-600 rounded">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.users.store') }}" class="form-card">
            @csrf

            <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}" class="form-input" required>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="form-input" required>
            <input type="password" name="password" placeholder="Password" class="form-input" required>

            <button type="submit" class="btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
