{{-- resources/views/admin/users/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    {{-- Sidebar --}}
    @include('layouts.sidebar')

    <div class="flex-1 p-6">
        <h1 class="text-xl font-bold mb-4">Edit User</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-600 rounded">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="form-card">
            @csrf
            @method('PUT')

            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-input" required>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-input" required>
            <input type="password" name="password" placeholder="(Kosongkan jika tidak diganti)" class="form-input">

            <button type="submit" class="btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
