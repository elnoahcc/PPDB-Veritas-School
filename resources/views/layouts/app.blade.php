<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    @include('partials.sidebar-admin')

    <!-- Main Content -->
    <div class="flex-1 ml-64">
        <!-- Navbar -->
        <header class="sticky top-0 bg-white shadow p-4 flex items-center justify-between z-10">
            <h1 class="text-xl font-bold">@yield('title', 'Dashboard')</h1>
            <div>
                <span class="mr-4">Hi, {{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-red-500 hover:underline">Logout</button>
                </form>
            </div>
        </header>

        <!-- Content -->
        <main class="p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>
