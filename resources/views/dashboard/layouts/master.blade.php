<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://js.stripe.com/basil/stripe.js"></script>
</head>
<body class="bg-gray-50 text-gray-800">

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