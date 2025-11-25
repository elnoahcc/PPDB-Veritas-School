<nav class="font-gabarito fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur-md shadow-lg">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- LEFT: LOGO -->
        <div class="flex items-center space-x-3">
            <img src="{{ asset('image/icon/icon.png') }}" class="w-12 h-12" alt="Logo">
        </div>

        <!-- CENTER TITLE -->
        <div class="hidden md:flex flex-1 justify-center">
            <h1 class="text-xl font-bold tracking-wide text-blue-700">
                VERITAS SCHOOL
            </h1>
        </div>

        <!-- RIGHT: DESKTOP MENU -->
        <div class="hidden md:flex items-center space-x-4">
            <a href="#hero" class="nav-link text-blue-600 px-4 py-2 rounded-full hover:bg-blue-50">Beranda</a>
            <a href="#about" class="nav-link text-blue-600 px-4 py-2 rounded-full hover:bg-blue-50">Tentang</a>
            <a href="#alur" class="nav-link text-blue-600 px-4 py-2 rounded-full hover:bg-blue-50">Alur</a>
            <a href="#testimoni" class="nav-link text-blue-600 px-4 py-2 rounded-full hover:bg-blue-50">Testimoni</a>

            @guest
                <a href="/login" class="text-blue-600 border border-blue-600 px-5 py-2 rounded-full hover:bg-blue-50">Log in</a>
                <a href="/register" class="bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700">Register</a>
            @endguest

            @auth
            <div class="relative group">
                <button class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-full">
                    Menu
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-200 
                            opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                    <div class="px-4 py-3 border-b">
                        <p class="font-semibold">{{ Auth::user()->username }}</p>
                        <p class="text-sm text-gray-500">{{ Auth::user()->role }}</p>
                    </div>
                    <a href="{{ Auth::user()->role === 'ADMIN' ? url('admin/dashboard') : url('pendaftar/dashboard') }}"
                       class="block px-4 py-2 hover:bg-blue-50">Dashboard</a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50">Logout</button>
                    </form>
                </div>
            </div>
            @endauth
        </div>

        <!-- MOBILE MENU BUTTON (RIGHT) -->
        <button id="mobile-menu-btn" class="md:hidden text-blue-600">
            <svg id="menu-icon" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

    </div>

    <!-- MOBILE MENU FULL DROPDOWN -->
    <div id="mobile-menu" class="hidden w-full bg-white shadow-lg border-t border-gray-200 py-4 px-6 
                                transition-all duration-300 opacity-0 scale-95">
        <div class="flex flex-col space-y-2">
            <a href="#hero" class="block px-4 py-2 text-blue-600 rounded-full hover:bg-blue-50">Beranda</a>
            <a href="#about" class="block px-4 py-2 text-blue-600 rounded-full hover:bg-blue-50">Tentang</a>
            <a href="#alur" class="block px-4 py-2 text-blue-600 rounded-full hover:bg-blue-50">Alur</a>
            <a href="#testimoni" class="block px-4 py-2 text-blue-600 rounded-full hover:bg-blue-50">Testimoni</a>

            @guest
                <a href="/login" class="block text-center px-4 py-2 border border-blue-600 rounded-full hover:bg-blue-50">Log in</a>
                <a href="/register" class="block text-center px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700">Register</a>
            @endguest

            @auth
                <a href="{{ Auth::user()->role === 'ADMIN' ? url('admin/dashboard') : url('pendaftar/dashboard') }}" 
                   class="block text-center px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700">Dashboard</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-center px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>
