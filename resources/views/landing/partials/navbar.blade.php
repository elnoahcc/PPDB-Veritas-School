<!-- Floating Centered Navbar -->
<nav class="font-gabarito fixed top-6 left-1/2 transform -translate-x-1/2 z-50 bg-white shadow-lg rounded-3xl px-10 py-4 flex items-center space-x-6">
    <!-- Logo -->
    <div class="flex items-center">
        <img src="{{ asset('image/icon/icon.png') }}" alt="PPDB 2025" class="w-12 h-12 object-contain">
    </div>

    <!-- Links -->
    <div class="hidden md:flex items-center space-x-4">
        <a href="#hero" class="text-blue-600 hover:text-blue-800 transition px-4 py-2 rounded-full">Beranda</a>
        <a href="#about" class="text-blue-600 hover:text-blue-800 transition px-4 py-2 rounded-full">Tentang</a>
        <a href="#alur" class="text-blue-600 hover:text-blue-800 transition px-4 py-2 rounded-full">Alur Pendaftaran</a>
        <a href="#testimoni" class="text-blue-600 hover:text-blue-800 transition px-4 py-2 rounded-full">Testimoni</a>

        @guest
            <a href="/login" class="text-blue-600 border border-blue-600 px-5 py-2 rounded-full hover:bg-blue-50 transition">Log in</a>
            <a href="/register" class="bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700 transition">Register</a>
        @endguest

        @auth
            <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700 transition">Dashboard</a>
        @endauth
    </div>

    <!-- Mobile menu button -->
    <div class="md:hidden flex items-center">
        <button id="mobile-menu-btn" class="text-blue-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden absolute top-full left-1/2 transform -translate-x-1/2 mt-2 w-64 bg-white rounded-3xl shadow-lg border border-gray-200">
        <div class="flex flex-col p-4 space-y-2">
            <a href="#hero" class="block px-4 py-2 text-blue-600 hover:bg-blue-50 rounded-full">Beranda</a>
            <a href="#about" class="block px-4 py-2 text-blue-600 hover:bg-blue-50 rounded-full">Tentang</a>
            <a href="#alur" class="block px-4 py-2 text-blue-600 hover:bg-blue-50 rounded-full">Alur Pendaftaran</a>
            <a href="#testimoni" class="block px-4 py-2 text-blue-600 hover:bg-blue-50 rounded-full">Testimoni</a>

            @guest
                <a href="/login" class="block px-4 py-2 text-blue-600 border border-blue-600 rounded-full text-center hover:bg-blue-50 transition">Log in</a>
                <a href="/register" class="block px-4 py-2 bg-blue-600 text-white rounded-full text-center hover:bg-blue-700 transition">Register</a>
            @endguest

            @auth
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 bg-blue-600 text-white rounded-full text-center hover:bg-blue-700 transition">Dashboard</a>
            @endauth
        </div>
    </div>
</nav>

<script>
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
