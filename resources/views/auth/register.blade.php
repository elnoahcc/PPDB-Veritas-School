<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Akun - Veritas School</title>

  
  <link rel="icon" type="image/x-icon" href="{{ asset('image/icon/icon.png') }}">

  <!-- ✅ Pastikan Tailwind aktif -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

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

  <!-- ✅ Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Hubot+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">

  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body>
<!-- 💎 Container Full Page -->
<div class="min-h-screen flex items-center justify-center bg-gray-100 relative">

    <!-- 🧩 Card Form -->
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md relative z-10">

        <!-- 🏫 Logo -->
        <div class="flex justify-center mb-3">
            <img src="{{ asset('image/icon/icon.png') }}" alt="Logo Sekolah" class="h-20 w-20 object-contain">
        </div>

        <!-- 🧾 Judul -->
        <h2 class="font-gabarito text-2xl font-bold text-center text-gray-800 mb-2">
            Daftar Akun
        </h2>
        <p class="text-1xl font-hubot text-center">Bergabunglah bersama Veritas School!</p>

        <!-- 🧍‍♂️ Form Register -->
        <form method="POST" action="{{ route('register') }}" class="space-y-5 mt-6">
            @csrf

            <!-- Username -->
            <div>
                <label for="username" class="font-hubot block text-sm font-medium text-gray-700">Username</label>
                <input id="username" 
                       type="text" 
                       name="username" 
                       value="{{ old('username') }}" 
                       required 
                       autofocus
                       class="font-hubot mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out">
                @error('username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nomor HP -->
            <div>
                <label for="no_hp" class="font-hubot block text-sm font-medium text-gray-700">Nomor HP</label>
                <input id="no_hp" 
                       type="text" 
                       name="no_hp" 
                       value="{{ old('no_hp') }}" 
                       required
                       class="font-hubot mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out">
                @error('no_hp')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="font-hubot block text-sm font-medium text-gray-700">Password</label>
                <input id="password" 
                       type="password" 
                       name="password" 
                       required
                       class="font-hubot mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label for="password_confirmation" class="font-hubot block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input id="password_confirmation" 
                       type="password" 
                       name="password_confirmation" 
                       required
                       class="font-hubot mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out">
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button -->
            <div>
                <button type="submit" 
                        class="font-hubot w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition duration-150 ease-in-out">
                    Daftar
                </button>
            </div>
        </form>

        <p class="font-hubot text-center mt-4">Sudah punya akun? 
            <a class="text-blue-600 hover:underline" href="{{ route('login') }}">Login</a>
        </p>

    </div>

    <!-- 🌊 Wave Elegan Bawah -->
    <div class="absolute bottom-0 w-full left-0">
      <svg xmlns="http://www.w3.org/2000/svg"
           viewBox="0 0 1440 320"
           class="w-full">
        <defs>
          <linearGradient id="grad" x1="0" x2="1" y1="0" y2="1">
            <stop offset="0%" stop-color="#3b82f6"/>
            <stop offset="100%" stop-color="#1d4ed8"/>
          </linearGradient>
        </defs>

        <path fill="url(#grad)" fill-opacity="1"
              d="M0,224L40,224C80,224,160,224,240,202.7C320,181,400,139,480,133.3C560,128,640,160,720,165.3C800,171,880,149,960,165.3C1040,181,1120,235,1200,240C1280,245,1360,203,1400,181.3L1440,160L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
        </path>
      </svg>
    </div>

</div>
</body>
</html>
