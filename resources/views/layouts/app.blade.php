<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')

     <!-- ✅ Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- ✅ Konfigurasi Tailwind inline -->
<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          hubot: ['"Hubot Sans"', 'sans-serif'],
          gabarito: ['"Gabarito"', 'sans-serif'],
          dmserif: ['"DM Serif Text"', 'serif'],
        },
      },
    },
  }
</script>


  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap" rel="stylesheet">

  <!-- ✅ Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hubot+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
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
