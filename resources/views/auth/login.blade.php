<!-- Pastikan Tailwind aktif -->
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
<!-- 💎 Container Full Page -->
<div class="min-h-screen flex items-center justify-center bg-gray-100">

    <!-- 🧩 Card Form -->
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">

        <!-- 🏫 Logo -->
        <div class="flex justify-center mb-3">
            <img src="{{ asset('image/icon/icon.png') }}" alt="Logo Sekolah" class="h-20 w-20 object-contain">
        </div>

        <!-- 🧾 Judul -->
        <h2 class="font-gabarito text-2xl font-bold text-center text-gray-800 mb-2">
            Login Portal    
        </h2>
        <p class="text-1xl font-hubot text-center">Siap menjadi bagian dari Veritas School?</p>

        <!-- 🧍‍♂️ Form Login -->
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Username -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input id="username" 
                       type="text" 
                       name="username" 
                       value="{{ old('username') }}" 
                       required 
                       autofocus
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" 
                       type="password" 
                       name="password" 
                       required
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out">
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <span class="ml-2">Remember Me</span>
                </label>
            </div>

            <!-- Button -->
            <div>
                <button type="submit" 
                        class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition duration-150 ease-in-out">
                    Login
                </button>
            </div>
        </form>

        <p class="text-center ">Belum mempunyai akun? <a class="text-blue-600" >Daftar Akun</a></p>

    </div>
</div>
