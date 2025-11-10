<!-- Floating Centered Navbar -->
<nav class="font-gabarito fixed top-6 left-1/2 transform -translate-x-1/2 z-50 bg-white/80 backdrop-blur-md shadow-xl rounded-3xl px-10 py-4 flex items-center space-x-6 transition-all duration-300">
    <!-- Logo -->
    <div class="flex items-center">
        <img src="{{ asset('image/icon/icon.png') }}" alt="PPDB 2025" class="w-12 h-12 object-contain">
    </div>

    <!-- Links -->
    <div class="hidden md:flex items-center space-x-4">
        <a href="#hero" class="nav-link text-blue-600 px-4 py-2 rounded-full transition hover:scale-105 hover:bg-blue-50">Beranda</a>
        <a href="#about" class="nav-link text-blue-600 px-4 py-2 rounded-full transition hover:scale-105 hover:bg-blue-50">Tentang</a>
        <a href="#alur" class="nav-link text-blue-600 px-4 py-2 rounded-full transition hover:scale-105 hover:bg-blue-50">Alur Pendaftaran</a>
        <a href="#testimoni" class="nav-link text-blue-600 px-4 py-2 rounded-full transition hover:scale-105 hover:bg-blue-50">Testimoni</a>

        @guest
            <a href="/login" class="text-blue-600 border border-blue-600 px-5 py-2 rounded-full hover:bg-blue-50 transition">Log in</a>
            <a href="/register" class="bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700 transition">Register</a>
        @endguest

        @auth
        <!-- Menu Dropdown -->
        <div class="relative group">
            <button class="flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-full hover:scale-105 transition">
                Menu
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-200 opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200">
                <div class="px-4 py-3 border-b border-gray-200">
                    <p class="font-semibold">{{ Auth::user()->username }}</p>
                    <p class="text-sm text-gray-500">{{ Auth::user()->role }}</p>
                </div>
                <a href="{{ Auth::user()->role === 'ADMIN' ? url('admin/dashboard') : url('pendaftar/dashboard') }}" class="block px-4 py-2 hover:bg-blue-50 transition">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 hover:bg-red-50 text-red-600 transition">Logout</button>
                </form>
            </div>
        </div>
        @endauth
    </div>

    <!-- Mobile menu button -->
    <div class="md:hidden flex items-center">
        <button id="mobile-menu-btn" class="text-blue-600 transition-transform duration-300">
            <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden absolute top-full left-1/2 transform -translate-x-1/2 mt-2 w-64 bg-white rounded-3xl shadow-lg border border-gray-200 transition-all duration-300 opacity-0 scale-95">
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
                <a href="{{ Auth::user()->role === 'ADMIN' ? url('admin/dashboard') : url('pendaftar/dashboard') }}" class="block px-4 py-2 bg-blue-600 text-white rounded-full text-center hover:bg-blue-700 transition">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-center px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition">Logout</button>
                </form>
            @endauth
        </div>  
    </div>
</nav>

<script>
// ===== MOBILE MENU TOGGLE =====
const btn = document.getElementById('mobile-menu-btn');
const menu = document.getElementById('mobile-menu');
const icon = document.getElementById('menu-icon');

btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');

    if(!menu.classList.contains('hidden')){
        menu.classList.add('opacity-100', 'scale-100');
        menu.classList.remove('opacity-0', 'scale-95');
        icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>`;
    } else {
        menu.classList.add('opacity-0', 'scale-95');
        menu.classList.remove('opacity-100', 'scale-100');
        icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>`;
    }
});

// ===== SMOOTH SCROLL =====
// Semua link yang scroll ke section (desktop & mobile)
document.querySelectorAll('a.nav-link, #mobile-menu a').forEach(link => {
    link.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if(href.startsWith('#')){
            e.preventDefault();
            const target = document.querySelector(href);
            if(target){
                const navbarHeight = 90; // tinggi navbar fix
                const elementPosition = target.getBoundingClientRect().top + window.pageYOffset;
                const offsetPosition = elementPosition - navbarHeight;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });

                // Tutup mobile menu jika dibuka
                if(!menu.classList.contains('hidden')){
                    menu.classList.add('hidden', 'opacity-0', 'scale-95');
                    menu.classList.remove('opacity-100', 'scale-100');
                    icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>`;
                }
            }
        }
    });
});

// ===== OPTIONAL: Close dropdown menu when clicking outside =====
document.addEventListener('click', function(e) {
    const dropdown = document.querySelector('.group');
    if(dropdown && !dropdown.contains(e.target)){
        const dropdownContent = dropdown.querySelector('div.absolute');
        if(dropdownContent){
            dropdownContent.classList.remove('opacity-100', 'visible');
            dropdownContent.classList.add('opacity-0', 'invisible');
        }
    }
});
</script>

