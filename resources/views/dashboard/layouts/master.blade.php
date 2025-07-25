<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://js.stripe.com/basil/stripe.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/country-select-js@1.0.8/dist/countrySelect.min.js"></script>
</head>
<body class="bg-gray-50 text-gray-800">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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


    @include('includes.header')
    @include('pages.popup')

    <div class="flex flex-col lg:flex-row">
    <!-- Sidebar (mobile is absolutely positioned and hidden by default) -->
    @include('dashboard.partials.sidebar')

    <!-- Content Area -->
    <main class="flex-1 p-4 pt-20 lg:p-6 lg:pt-6">
        @yield('content')
    </main>
</div>

    @include('dashboard.partials.dashboard-mobile-navbar')
    @yield('scripts')

</body>
</html>