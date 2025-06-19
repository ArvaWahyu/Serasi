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

            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-input" required oninvalid="this.setCustomValidity('Masukkan nama yang benar')" oninput="this.setCustomValidity('')">
            <input type="text" name="email" value="{{ old('email', $user->email) }}" pattern="^[a-zA-Z0-9._%+-]+@teknokrat\.ac\.id$" title="Masukkan email @teknokrat.ac.id" class="form-input" required>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const editUserForm = document.querySelector('form[action="{{ route('admin.users.update', $user->id) }}"]');
                    const emailInputEdit = editUserForm.querySelector('input[name="email"]');
                    editUserForm.addEventListener('submit', function(event) {
                        const emailValue = emailInputEdit.value;
                        const domainPattern = /^[a-zA-Z0-9._%+-]+@teknokrat\.ac\.id$/;
                        if (!domainPattern.test(emailValue)) {
                            event.preventDefault();
                            emailInputEdit.setCustomValidity('Masukkan email @teknokrat.ac.id');
                            emailInputEdit.reportValidity();
                        } else {
                            emailInputEdit.setCustomValidity('');
                        }
                    });
                    emailInputEdit.addEventListener('input', function(event) {
                        event.target.setCustomValidity('');
                    });

                    const nameInputEdit = editUserForm.querySelector('input[name="name"]');
                    nameInputEdit.addEventListener('invalid', function(event) {
                        event.target.setCustomValidity('');
                        if (!event.target.validity.valid) {
                            event.target.setCustomValidity('Masukkan nama yang benar');
                        }
                    });
                    nameInputEdit.addEventListener('input', function(event) {
                        event.target.setCustomValidity('');
                    });
                });
            </script>
            <input type="password" name="password" placeholder="(Kosongkan jika tidak diganti)" class="form-input">
 
            <button type="submit" class="btn-primary">Update</button>
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editUserForm = document.querySelector('form[action="{{ route('admin.users.update', $user->id) }}"]');
        const emailInputEdit = editUserForm.querySelector('input[name="email"]');
        emailInputEdit.addEventListener('invalid', function(event) {
            if (event.target.validity.patternMismatch) {
                event.target.setCustomValidity('Masukan email @teknokrat.ac.id');
            } else {
                event.target.setCustomValidity('');
            }
        });
        emailInputEdit.addEventListener('input', function(event) {
            event.target.setCustomValidity('');
        });

        const nameInputEdit = editUserForm.querySelector('input[name="name"]');
        nameInputEdit.addEventListener('invalid', function(event) {
            event.target.setCustomValidity('');
            if (!event.target.validity.valid) {
                event.target.setCustomValidity('Masukkan nama yang benar');
            }
        });
        nameInputEdit.addEventListener('input', function(event) {
            event.target.setCustomValidity('');
        });
    });
</script>
@endsection
