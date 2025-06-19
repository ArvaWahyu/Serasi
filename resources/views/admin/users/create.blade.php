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

            <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}" class="form-input" required oninvalid="this.setCustomValidity('Masukkan nama yang benar')" oninput="this.setCustomValidity('')">
            <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" pattern="^[a-zA-Z0-9._%+-]+@teknokrat\.ac\.id$" title="Masukkan email @teknokrat.ac.id" class="form-input" required>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const createUserForm = document.querySelector('form[action="{{ route('admin.users.store') }}"]');
                    const emailInputCreate = createUserForm.querySelector('input[name="email"]');
                    createUserForm.addEventListener('submit', function(event) {
                        const emailValue = emailInputCreate.value;
                        const domainPattern = /^[a-zA-Z0-9._%+-]+@teknokrat\.ac\.id$/;
                        if (!domainPattern.test(emailValue)) {
                            event.preventDefault();
                            emailInputCreate.setCustomValidity('Masukkan email @teknokrat.ac.id');
                            emailInputCreate.reportValidity();
                        } else {
                            emailInputCreate.setCustomValidity('');
                        }
                    });
                    emailInputCreate.addEventListener('input', function(event) {
                        event.target.setCustomValidity('');
                    });

                    const nameInputCreate = createUserForm.querySelector('input[name="name"]');
                    nameInputCreate.addEventListener('invalid', function(event) {
                        event.target.setCustomValidity('');
                        if (!event.target.validity.valid) {
                            event.target.setCustomValidity('Masukkan nama yang benar');
                        }
                    });
                    nameInputCreate.addEventListener('input', function(event) {
                        event.target.setCustomValidity('');
                    });
                });
            </script>
            <input type="password" name="password" placeholder="Password" class="form-input" required>

            <button type="submit" class="btn-primary">Simpan</button>
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const createUserForm = document.querySelector('form[action="{{ route('admin.users.store') }}"]');
        const emailInputCreate = createUserForm.querySelector('input[name="email"]');
        emailInputCreate.addEventListener('invalid', function(event) {
            if (event.target.validity.patternMismatch) {
                event.target.setCustomValidity('Masukan email @teknokrat.ac.id');
            } else {
                event.target.setCustomValidity('');
            }
        });
        emailInputCreate.addEventListener('input', function(event) {
            event.target.setCustomValidity('');
        });

        const nameInputCreate = createUserForm.querySelector('input[name="name"]');
        nameInputCreate.addEventListener('invalid', function(event) {
            event.target.setCustomValidity('');
            if (!event.target.validity.valid) {
                event.target.setCustomValidity('Masukkan nama yang benar');
            }
        });
        nameInputCreate.addEventListener('input', function(event) {
            event.target.setCustomValidity('');
        });
    });
</script>
@endsection
