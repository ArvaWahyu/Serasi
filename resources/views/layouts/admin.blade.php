<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="pl-64">
        @include('layouts.sidebar')

        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    @yield('scripts')
</body>
</html>
