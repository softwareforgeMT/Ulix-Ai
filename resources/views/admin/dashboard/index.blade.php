<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - ULIXAI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="64x64" href="images/logoblue-64.png" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body class="bg-gray-50">
@if (session('success'))
    <script>
        toastr.success('{{ session('success') }}', 'Success');
    </script>
@endif

@if (session('error'))
    <script>
        toastr.error('{{ session('error') }}', 'Error');
    </script>
@endif

    <!-- Admin Navbar -->
    <nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <img src="/images/headerlogo.png" alt="Logo" class="w-10 h-10 object-contain" />
            <span class="font-bold text-blue-700 text-xl">ULIXAI Admin</span>
        </div>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded font-semibold">Logout</button>
        </form>
    </nav>
    <!-- Admin Layout with Sidebar -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('admin.dashboard.sidebar')
        <!-- Main Content Area -->
        <main class="flex-1 p-8">
            {{-- Child admin components will load here --}}
            @yield('admin-content')
        </main>
    </div>
</body>
</html>
