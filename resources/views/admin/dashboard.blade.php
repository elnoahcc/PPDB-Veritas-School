    <!DOCTYPE html>
    <html lang="id">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Dashboard Admin</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('image/icon/icon.png') }}">
      <script src="https://cdn.tailwindcss.com"></script>

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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Hubot+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">
    </head>

    <body class="bg-gray-50 font-hubot overflow-hidden">

      <!-- Mobile Header -->
      <div class="fixed top-0 left-0 right-0 bg-white shadow-md px-4 py-3 flex justify-between items-center md:hidden z-40">
        <h2 class="text-lg font-bold text-gray-800">Dashboard Admin</h2>
        <button id="menuBtn" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
      <!-- Tambahkan Overlay (setelah sidebar) -->
    <div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-30 md:hidden"></div>

      <div class="flex h-screen">
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed md:static top-0 left-0 w-64 bg-white h-screen shadow-lg flex flex-col transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-50">
      
    <!-- Tambahkan Overlay (setelah sidebar) -->
    <div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-30 md:hidden"></div>
      <!-- Logo -->
      <div class="flex justify-center mb-8 mt-6">
        <img src="{{ asset('image/icon/icon.png') }}" alt="Logo Sekolah" class="w-20 h-auto">
      </div>

      <!-- Navigation -->
      <nav class="flex-1 p-4 overflow-y-auto">
        <ul class="space-y-2 text-gray-700 font-medium">

          <!-- Home -->
          <li>
            <a href="#" onclick="showPage('home')" class="nav-link flex items-center px-4 py-3 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10.707 1.293a1 1 0 00-1.414 0L2 8.586V18a2 2 0 002 2h4a1 1 0 001-1v-5h2v5a1 1 0 001 1h4a2 2 0 002-2V8.586l-7.293-7.293z"/>
              </svg>
              <span>Home</span>
            </a>
          </li>

          <!-- Data Menu -->
          <li>
            <button class="w-full flex items-center justify-between px-4 py-3 rounded-lg hover:bg-gray-100 transition-colors" onclick="toggleSubMenu('dataMenu')">
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M3 4a1 1 0 100 2h14a1 1 0 100-2H3zM3 9a1 1 0 100 2h14a1 1 0 100-2H3zM3 14a1 1 0 100 2h14a1 1 0 100-2H3z"/>
                </svg>
                <span>Data</span>
              </div>
              <svg id="dataMenuIcon" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0L5.25 8.27a.75.75 0 01-.02-1.06z" clip-rule="evenodd"/>
              </svg>
            </button>

            <ul id="dataMenu" class="ml-8 mt-2 space-y-1 hidden">
              <li>
                <a href="#" onclick="showPage('dataPendaftar')" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 3a3 3 0 100 6 3 3 0 000-6zM4 15a6 6 0 1112 0H4z"/>
                  </svg>
                  Data Pendaftar
                </a>
              </li>
              <li>
                <a href="#" onclick="showPage('dataAdmin')" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 3a3 3 0 100 6 3 3 0 000-6zM2 17a8 8 0 1116 0H2z"/>
                  </svg>
                  Data Admin
                </a>
              </li>
            </ul>
          </li>

          <!-- Settings -->
<li>
  <a href="#" onclick="showPage('seleksi')" class="nav-link flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 transition-colors">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
      <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
      <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
    </svg>
    <span>Seleksi</span>
  </a>
</li>

          <!-- Settings -->
          <li>
            <a href="#" onclick="showPage('settings')" class="nav-link flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M11.3 1.046a1 1 0 00-2.6 0l-.374 1.17a1 1 0 01-.95.684H5.136a1 1 0 00-.707.293l-.829.829a1 1 0 00-.293.707v2.24a1 1 0 01-.684.95L1.453 8.7a1 1 0 000 2.6l1.17.374a1 1 0 01.684.95v2.24a1 1 0 00.293.707l.829.829a1 1 0 00.707.293h2.24a1 1 0 01.95.684l.374 1.17a1 1 0 002.6 0l.374-1.17a1 1 0 01.95-.684h2.24a1 1 0 00.707-.293l.829-.829a1 1 0 00.293-.707v-2.24a1 1 0 01.684-.95l1.17-.374a1 1 0 000-2.6l-1.17-.374a1 1 0 01-.684-.95v-2.24a1 1 0 00-.293-.707l-.829-.829a1 1 0 00-.707-.293h-2.24a1 1 0 01-.95-.684l-.374-1.17zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
              </svg>
              <span>Settings</span>
            </a>
          </li>


        </ul>
      </nav>

      <!-- Logout -->
      <div class="p-4 border-t">
        <button type="button" onclick="showLogoutModal()" class="w-full flex items-center justify-center bg-red-500 text-white py-3 px-4 rounded-lg hover:bg-red-600 transition-colors font-medium shadow-sm">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h6a1 1 0 010 2H5v10h5a1 1 0 110 2H4a1 1 0 01-1-1V4zm11.293 5.293a1 1 0 011.414 0L18 11.586l-2.293 2.293a1 1 0 01-1.414-1.414L14.586 12H9a1 1 0 110-2h5.586l-1.293-1.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
          </svg>
          Logout
        </button>
      </div>
    </aside>

    <!-- Logout Confirmation Modal -->
    <div id="logoutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
      <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-sm transform transition-transform duration-200 scale-90 opacity-0" id="logoutModalCard">
        
        <!-- Icon silang besar -->
        <div class="flex justify-center mb-4">
          <div class="w-16 h-16 flex items-center justify-center rounded-full bg-red-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-red-500" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
          </div>
        </div>

        <!-- Teks -->
        <h2 class="text-xl font-bold text-gray-800 text-center mb-2">Yakin ingin logout?</h2>
        <p class="text-gray-600 text-center mb-6">Semua sesi aktif akan dihentikan. Apakah kamu ingin melanjutkan?</p>

        <!-- Tombol -->
        <div class="flex justify-center gap-4">
          <button onclick="hideLogoutModal()" class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition-colors">
            Kembali
          </button>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="px-5 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600 transition-colors flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h6a1 1 0 010 2H5v10h5a1 1 0 110 2H4a1 1 0 01-1-1V4zm11.293 5.293a1 1 0 011.414 0L18 11.586l-2.293 2.293a1 1 0 01-1.414-1.414L14.586 12H9a1 1 0 110-2h5.586l-1.293-1.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
              </svg>
              Logout
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Script -->
    <script>
      const modal = document.getElementById('logoutModal');
      const modalCard = document.getElementById('logoutModalCard');

      function showLogoutModal() {
        modal.classList.remove('hidden');
        setTimeout(() => {
          modalCard.classList.remove('scale-90', 'opacity-0');
          modalCard.classList.add('scale-100', 'opacity-100');
        }, 50);
      }

      function hideLogoutModal() {
        modalCard.classList.add('scale-90', 'opacity-0');
        setTimeout(() => {
          modal.classList.add('hidden');
        }, 200);
      }

      function toggleSubMenu(menuId) {
        const menu = document.getElementById(menuId);
        const icon = document.getElementById(menuId + 'Icon');
        menu.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
      }
    </script>


    <script>
      function toggleSubMenu(id) {
        const menu = document.getElementById(id);
        const icon = document.getElementById(id + 'Icon');
        menu.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
      }
    </script>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden pt-16 md:pt-0">
          <div class="flex-1 overflow-y-auto">
            <div class="p-4 md:p-6 lg:p-8">
              
              <!-- HOME PAGE -->
              <div id="homePage" class="page-content">
                <!-- Header -->
                <header class="mb-6 md:mb-8">
                  <h1 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-800">
                    Selamat Datang, {{ auth()->user()->username }}
                  </h1>
                </header>

                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6 mb-6 md:mb-8">
                  <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <h2 class="text-sm md:text-base font-semibold text-gray-600 mb-2">Total Admin</h2>
                    <p class="text-2xl md:text-3xl font-bold text-gray-800">{{ $totalAdmins }}</p>
                  </div>
                  <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <h2 class="text-sm md:text-base font-semibold text-gray-600 mb-2">Total Pendaftar</h2>
                    <p class="text-2xl md:text-3xl font-bold text-gray-800">{{ $totalPendaftar }}</p>
                  </div>
                </div>

                <!-- Quick Info -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                  <h2 class="text-lg md:text-xl font-semibold text-gray-800 mb-4">Informasi</h2>
                  <div class="space-y-3">
                    <div class="flex items-start gap-3">
                      <div class="w-2 h-2 bg-indigo-500 rounded-full mt-2"></div>
                      <p class="text-gray-600">Sistem pendaftaran siswa baru telah dibuka</p>
                    </div>
                    <div class="flex items-start gap-3">
                      <div class="w-2 h-2 bg-indigo-500 rounded-full mt-2"></div>
                      <p class="text-gray-600">Periksa data pendaftar secara berkala untuk verifikasi</p>
                    </div>
                    <div class="flex items-start gap-3">
                      <div class="w-2 h-2 bg-indigo-500 rounded-full mt-2"></div>
                      <p class="text-gray-600">Hubungi administrator jika ada kendala teknis</p>
                    </div>
                  </div>
                </div>
              </div>





<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Seleksi Pendaftar - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">

<div id="seleksiPage" class="page-content  bg-white rounded-xl shadow-sm border p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Seleksi Pendaftar</h1>
            <p class="text-gray-600 mt-1">Kelola hasil seleksi siswa baru</p>
        </div>
        <button onclick="showPeriodeManagement()" class="bg-purple-500 hover:bg-purple-600 text-white px-6 py-3 rounded-lg flex items-center gap-2 transition duration-200">
            <i class="fas fa-calendar-alt"></i> Kelola Periode
        </button>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
        {{ session('error') }}
    </div>
    @endif

    <!-- Informasi Periode Aktif -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 mb-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold mb-2">Periode Aktif</h2>
                <p class="text-blue-100 text-lg">{{ $periodeAktif->nama_periode ?? 'Tidak ada periode aktif' }}</p>
                @if($periodeAktif)
                <div class="flex gap-4 mt-3 text-sm">
                    <div>
                        <i class="fas fa-calendar-check mr-2"></i>
                        {{ $periodeAktif->tanggal_mulai->format('d/m/Y') }} - {{ $periodeAktif->tanggal_selesai->format('d/m/Y') }}
                    </div>
                    <div>
                        <i class="fas fa-users mr-2"></i>
                        Kuota: {{ $periodeAktif->kuota }}
                    </div>
                    <div>
                        <i class="fas fa-graduation-cap mr-2"></i>
                        Batas Lulus: {{ $periodeAktif->batas_lulus }}
                    </div>
                </div>
                @endif
            </div>
            @if($periodeAktif)
            <div class="text-right">
                <div class="text-3xl font-bold">{{ $periodeAktif->jumlahPeserta() }}</div>
                <div class="text-blue-100">Total Pendaftar</div>
            </div>
            @endif
        </div>
    </div>

    <!-- Kontrol Seleksi -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6 border">
        <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
            <i class="fas fa-cogs text-blue-500"></i>
            Kontrol Seleksi
        </h2>
        
        <form action="{{ route('admin.seleksi.proses') }}" method="POST" class="flex flex-wrap gap-4 items-end">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-trophy text-yellow-500 mr-1"></i>
                    Batas Nilai Lulus
                </label>
                <input type="number" name="batas_lulus" 
                       value="{{ $periodeAktif->batas_lulus ?? 80 }}" 
                       min="0" max="100" step="0.01" 
                       class="border border-gray-300 rounded-lg px-4 py-2 w-32 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-users text-green-500 mr-1"></i>
                    Kuota Siswa
                </label>
                <input type="number" name="kuota" 
                       value="{{ $periodeAktif->kuota ?? 100 }}" 
                       min="1" 
                       class="border border-gray-300 rounded-lg px-4 py-2 w-32 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                <i class="fas fa-robot mr-2"></i>Proses Otomatis
            </button>
            
            <a href="{{ route('admin.seleksi.pdf') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                <i class="fas fa-file-pdf mr-2"></i>Export PDF
            </a>
            
            <button type="button" onclick="confirmReset()" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                <i class="fas fa-redo mr-2"></i>Reset Seleksi
            </button>
        </form>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        @php
            $totalPendaftar = $pendaftar->count();
            $lulus = $pendaftar->where('status_seleksi', 'Lulus')->count();
            $tidakLulus = $pendaftar->where('status_seleksi', 'Tidak Lulus')->count();
            $belumDiproses = $pendaftar->where('status_seleksi', 'Belum Diseleksi')->count();
        @endphp
        
        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg shadow-md p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm text-gray-600 mb-1">Total Pendaftar</div>
                    <div class="text-3xl font-bold text-gray-800">{{ $totalPendaftar }}</div>
                </div>
                <div class="bg-gray-200 rounded-full p-4">
                    <i class="fas fa-users text-2xl text-gray-600"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg shadow-md p-6 border border-green-200">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm text-green-600 mb-1">Lulus</div>
                    <div class="text-3xl font-bold text-green-700">{{ $lulus }}</div>
                </div>
                <div class="bg-green-200 rounded-full p-4">
                    <i class="fas fa-check-circle text-2xl text-green-600"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-red-50 to-red-100 rounded-lg shadow-md p-6 border border-red-200">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm text-red-600 mb-1">Tidak Lulus</div>
                    <div class="text-3xl font-bold text-red-700">{{ $tidakLulus }}</div>
                </div>
                <div class="bg-red-200 rounded-full p-4">
                    <i class="fas fa-times-circle text-2xl text-red-600"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-lg shadow-md p-6 border border-yellow-200">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm text-yellow-600 mb-1">Belum Diproses</div>
                    <div class="text-3xl font-bold text-yellow-700">{{ $belumDiproses }}</div>
                </div>
                <div class="bg-yellow-200 rounded-full p-4">
                    <i class="fas fa-clock text-2xl text-yellow-600"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Data -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase">No</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Nama</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase">NISN</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Rata-rata</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Poin Prestasi</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Nilai Total</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($pendaftar as $index => $user)
                    @php
                        $avg = round(($user->nilai_smt1 + $user->nilai_smt2 + $user->nilai_smt3 + $user->nilai_smt4 + $user->nilai_smt5)/5, 2);
                        
                        // Hitung poin prestasi
                        $poinPrestasi = 0;
                        foreach($user->prestasis as $p) {
                            $poinPrestasi += match(strtolower($p->tingkat)) {
                                'internasional' => 10,
                                'nasional' => 7,
                                'provinsi' => 5,
                                'kota', 'kabupaten' => 3,
                                'sekolah' => 1,
                                default => 0,
                            };
                        }
                        
                        $nilaiTotal = $avg + $poinPrestasi;
                    @endphp
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-4 py-3 text-sm font-semibold">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 text-sm">
                            <div class="font-medium text-gray-900">{{ $user->nama_pendaftar ?? '-' }}</div>
                            <div class="text-xs text-gray-500">{{ $user->email ?? '-' }}</div>
                        </td>
                        <td class="px-4 py-3 text-sm text-center font-mono">{{ $user->nisn_pendaftar ?? '-' }}</td>
                        <td class="px-4 py-3 text-sm text-center">
                            <span class="font-semibold text-blue-600">{{ $avg }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-center">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                +{{ $poinPrestasi }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm text-center">
                            <span class="text-lg font-bold text-indigo-600">{{ $nilaiTotal }}</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                {{ $user->status_seleksi === 'Lulus' ? 'bg-green-100 text-green-800' : 
                                   ($user->status_seleksi === 'Tidak Lulus' ? 'bg-red-100 text-red-800' : 
                                   'bg-gray-100 text-gray-800') }}">
                                @if($user->status_seleksi === 'Lulus')
                                    <i class="fas fa-check-circle mr-1"></i>
                                @elseif($user->status_seleksi === 'Tidak Lulus')
                                    <i class="fas fa-times-circle mr-1"></i>
                                @else
                                    <i class="fas fa-clock mr-1"></i>
                                @endif
                                {{ $user->status_seleksi }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <button onclick="openStatusModal({{ $user->id }}, '{{ $user->nama_pendaftar }}', '{{ $user->status_seleksi }}')" 
                                    class="bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded text-xs transition duration-200">
                                <i class="fas fa-edit"></i> Ubah Status
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-12 text-center text-gray-500">
                            <i class="fas fa-inbox text-5xl mb-4 text-gray-300"></i>
                            <p class="text-lg font-medium">Belum ada pendaftar</p>
                            <p class="text-sm mt-1">Pendaftar akan muncul di sini setelah mendaftar</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Manajemen Periode -->
<div id="periodeModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50" onclick="closePeriodeModal(event)">
    <div class="bg-white rounded-xl shadow-2xl max-w-6xl w-full mx-4 max-h-[90vh] overflow-y-auto" onclick="event.stopPropagation()">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-6 rounded-t-xl">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-white flex items-center gap-2">
                        <i class="fas fa-calendar-alt"></i>
                        Manajemen Periode Seleksi
                    </h2>
                    <p class="text-purple-100 mt-1">Kelola periode penerimaan siswa baru</p>
                </div>
                <button onclick="hidePeriodeModal()" class="text-white hover:bg-purple-700 rounded-full p-2 transition duration-200">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Modal Body -->
        <div class="p-6">
            <!-- Tombol Tambah Periode -->
            <div class="mb-6 flex justify-between items-center">
                <div class="text-sm text-gray-600">
                    <i class="fas fa-info-circle mr-1"></i>
                    Kelola periode seleksi untuk mengatur waktu pendaftaran
                </div>
                <button onclick="showAddPeriodeForm()" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg flex items-center gap-2 transition duration-200">
                    <i class="fas fa-plus"></i> Tambah Periode
                </button>
            </div>

            <!-- Form Tambah Periode (Hidden by default) -->
            <div id="addPeriodeForm" class="hidden mb-6 bg-blue-50 border border-blue-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4 text-blue-900">
                    <i class="fas fa-plus-circle mr-2"></i>Tambah Periode Baru
                </h3>
                
                <form action="{{ route('admin.periode.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-tag mr-1"></i>Nama Periode *
                            </label>
                            <input type="text" name="nama_periode" required 
                                   placeholder="Contoh: Periode 2024/2025 Gelombang 1"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-users mr-1"></i>Kuota Siswa *
                            </label>
                            <input type="number" name="kuota" required min="1"
                                   placeholder="Contoh: 100"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-calendar-day mr-1"></i>Tanggal Mulai *
                            </label>
                            <input type="date" name="tanggal_mulai" required
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-calendar-check mr-1"></i>Tanggal Selesai *
                            </label>
                            <input type="date" name="tanggal_selesai" required
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-trophy mr-1"></i>Batas Nilai Lulus *
                            </label>
                            <input type="number" name="batas_lulus" required min="0" max="100" step="0.01"
                                   value="80"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-toggle-on mr-1"></i>Status
                            </label>
                            <select name="status" required
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="draft">Draft</option>
                                <option value="aktif">Aktif</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-4">
    <label class="block text-sm font-medium text-gray-700 mb-2">
        <i class="fas fa-file-alt mr-1"></i>Keterangan (Opsional)
    </label>
    <textarea name="keterangan" rows="3" 
              placeholder="Tambahkan keterangan periode..."
              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
</div>
                    
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" onclick="hideAddPeriodeForm()" 
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-lg transition duration-200">
                            <i class="fas fa-times mr-1"></i>Batal
                        </button>
                        <button type="submit" 
                                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition duration-200">
                            <i class="fas fa-save mr-1"></i>Simpan Periode
                        </button>
                    </div>
                </form>
            </div>

            <!-- Statistik Periode -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                @php
                    $totalPeriode = $periodes->count();
                    $periodeAktifCount = $periodes->where('status', 'aktif')->count();
                    $periodeSelesai = $periodes->where('status', 'selesai')->count();
                    $periodeDraft = $periodes->where('status', 'draft')->count();
                @endphp
                
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg shadow p-4 border border-blue-200">
                    <div class="text-sm text-blue-600 mb-1">Total Periode</div>
                    <div class="text-2xl font-bold text-blue-700">{{ $totalPeriode }}</div>
                </div>
                
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg shadow p-4 border border-green-200">
                    <div class="text-sm text-green-600 mb-1">Periode Aktif</div>
                    <div class="text-2xl font-bold text-green-700">{{ $periodeAktifCount }}</div>
                </div>
                
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg shadow p-4 border border-gray-200">
                    <div class="text-sm text-gray-600 mb-1">Periode Selesai</div>
                    <div class="text-2xl font-bold text-gray-700">{{ $periodeSelesai }}</div>
                </div>
                
                <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-lg shadow p-4 border border-yellow-200">
                    <div class="text-sm text-yellow-600 mb-1">Draft</div>
                    <div class="text-2xl font-bold text-yellow-700">{{ $periodeDraft }}</div>
                </div>
            </div>

            <!-- Tabel Periode -->
            <div class="bg-white rounded-lg border overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase">No</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Nama Periode</th>
                                <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Tanggal</th>
                                <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Kuota</th>
                                <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Batas Lulus</th>
                                <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Status</th>
                                <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Peserta</th>
                                <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($periodes as $index => $periode)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 text-sm font-medium">{{ $periode->nama_periode }}</td>
                                <td class="px-4 py-3 text-sm text-center">
                                    {{ $periode->tanggal_mulai->format('d/m/Y') }} - {{ $periode->tanggal_selesai->format('d/m/Y') }}
                                </td>
                                <td class="px-4 py-3 text-sm text-center">{{ $periode->kuota }}</td>
                                <td class="px-4 py-3 text-sm text-center">{{ $periode->batas_lulus }}</td>
                                <td class="px-4 py-3 text-center">
                                    <span class="inline-flex px-2 py-1 rounded-full text-xs font-medium
                                        {{ $periode->status === 'aktif' ? 'bg-green-100 text-green-800' : 
                                           ($periode->status === 'selesai' ? 'bg-gray-100 text-gray-800' : 'bg-yellow-100 text-yellow-800') }}">
                                        {{ ucfirst($periode->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm text-center">{{ $periode->jumlahPeserta() }}</td>
                                <td class="px-4 py-3 text-center">
                                    <button class="text-blue-600 hover:text-blue-800 mr-2">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-800">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                                    Belum ada periode yang dibuat
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Status -->
<div id="editStatusModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
        <h3 class="text-xl font-semibold mb-4">Ubah Status Seleksi</h3>
        
        <form id="editStatusForm" method="POST" action="">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Pendaftar</label>
                <input type="text" id="namaPendaftar" readonly class="w-full bg-gray-100 border rounded-lg px-4 py-2">
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status" id="statusSelect" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500">
                    <option value="Lulus">Lulus</option>
                    <option value="Tidak Lulus">Tidak Lulus</option>
                    <option value="Dipertimbangkan">Dipertimbangkan</option>
                    <option value="Belum Diseleksi">Belum Diseleksi</option>
                </select>
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Catatan (Opsional)</label>
                <textarea name="catatan" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500" placeholder="Tambahkan catatan jika diperlukan..."></textarea>
            </div>
            
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeStatusModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition duration-200">
                    Batal
                </button>
                <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg transition duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Form Reset (hidden) -->
<form id="resetForm" action="{{ route('admin.seleksi.reset') }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

<script>
// Fungsi untuk membuka modal edit status
function openStatusModal(userId, nama, currentStatus) {
    document.getElementById('editStatusModal').classList.remove('hidden');
    document.getElementById('editStatusForm').action = `/admin/seleksi/${userId}/update-status`;
    document.getElementById('namaPendaftar').value = nama;
    document.getElementById('statusSelect').value = currentStatus;
}

// Fungsi untuk menutup modal edit status
function closeStatusModal() {
    document.getElementById('editStatusModal').classList.add('hidden');
}

// Fungsi untuk menampilkan manajemen periode
function showPeriodeManagement() {
    const modal = document.getElementById('periodeModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

// Fungsi untuk menutup modal periode
function hidePeriodeModal() {
    const modal = document.getElementById('periodeModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    // Sembunyikan juga form tambah periode jika terbuka
    hideAddPeriodeForm();
}

// Fungsi untuk menutup modal periode dengan klik di luar
function closePeriodeModal(event) {
    if (event.target.id === 'periodeModal') {
        hidePeriodeModal();
    }
}

// Fungsi untuk menampilkan form tambah periode
function showAddPeriodeForm() {
    const form = document.getElementById('addPeriodeForm');
    if (form) {
        form.classList.remove('hidden');
        // Scroll ke form
        form.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
}

// Fungsi untuk menyembunyikan form tambah periode
function hideAddPeriodeForm() {
    const form = document.getElementById('addPeriodeForm');
    if (form) {
        form.classList.add('hidden');
        // Reset form
        form.querySelector('form').reset();
    }
}

// Fungsi konfirmasi reset
function confirmReset() {
    if (confirm('Apakah Anda yakin ingin mereset semua hasil seleksi? Tindakan ini tidak dapat dibatalkan!')) {
        document.getElementById('resetForm').submit();
    }
}

// Close modal when pressing ESC key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeStatusModal();
        hidePeriodeModal();
        hideAddPeriodeForm();
    }
});

// Validasi tanggal pada form tambah periode
document.addEventListener('DOMContentLoaded', function() {
    const formPeriode = document.querySelector('#addPeriodeForm form');
    if (formPeriode) {
        formPeriode.addEventListener('submit', function(e) {
            const tanggalMulai = new Date(formPeriode.querySelector('[name="tanggal_mulai"]').value);
            const tanggalSelesai = new Date(formPeriode.querySelector('[name="tanggal_selesai"]').value);
            
            if (tanggalSelesai <= tanggalMulai) {
                e.preventDefault();
                alert('Tanggal selesai harus lebih besar dari tanggal mulai!');
                return false;
            }
        });
    }
});
</script>

</body>
</html>


       <div id="logoutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md transform transition-all">
      <div class="p-6 md:p-8">
        <!-- Icon -->
        <div class="flex justify-center mb-4">
          <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
          </div>
        </div>

        <!-- Text -->
        <h3 class="text-xl md:text-2xl font-bold text-gray-900 text-center mb-2">Konfirmasi Logout</h3>
        <p class="text-gray-600 text-center mb-6">
          Apakah ananda <span id="logoutUsername" class="font-semibold text-gray-900">Admin</span> ingin keluar?
        </p>

        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row gap-3">
          <button type="button" onclick="closeLogoutModal()" class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium">
            Kembali
          </button>
          <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="flex-1">
            @csrf
            <button type="submit" class="w-full px-6 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors font-medium shadow-sm">
              Logout
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
    <script>
    // =======================
    // === KONFIGURASI DASAR ===
    // =======================
    const username = 'Admin'; // Ganti dengan {{ auth()->user()->username }}
    document.getElementById('usernameDisplay').textContent = username;

    // =======================
// === LOGOUT MODAL ===
// =======================
function showLogoutModal() {
  document.getElementById('logoutUsername').textContent = username;
  document.getElementById('logoutModal').classList.remove('hidden');
  document.body.style.overflow = 'hidden';
}

function closeLogoutModal() {
  document.getElementById('logoutModal').classList.add('hidden');
  document.body.style.overflow = 'auto';
}

// Tutup modal klik luar
const logoutModal = document.getElementById('logoutModal');
if (logoutModal) {
  logoutModal.addEventListener('click', function(e) {
    if (e.target === this) closeLogoutModal();
  });
}

// Escape key
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    closeLogoutModal();
    closeAddAdminModal();
    closeEditAdminModal();
  }
});

    // =======================
    // === NAVIGASI PAGE ===
    // =======================
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const menuBtn = document.getElementById('menuBtn');

    function showPage(pageName) {
      document.querySelectorAll('.page-content').forEach(page => page.classList.add('hidden'));
      document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('bg-blue-600'));

      const pages = {
        home: ['homePage', 0],
        dataPendaftar: ['dataPendaftarPage', 1],
        dataAdmin: ['dataAdminPage', 2],
        settings: ['settingsPage', 3]
      };

      if (pages[pageName]) {
        document.getElementById(pages[pageName][0]).classList.remove('hidden');
        document.querySelectorAll('.nav-link')[pages[pageName][1]].classList.add('bg-blue-600');
      }

      if (window.innerWidth < 768) {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
      }
    }

    // Sidebar toggle
    if (menuBtn && overlay && sidebar) {
      menuBtn.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
      });

      overlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
      });
    }

    // =======================
    // === PAGINATION & SEARCH ===
    // =======================
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('tableBody');
    const dataTable = document.getElementById('dataTable');
    const emptyState = document.getElementById('emptyState');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const showingStart = document.getElementById('showingStart');
    const showingEnd = document.getElementById('showingEnd');
    const totalData = document.getElementById('totalData');

    if (tableBody) {
      const allRows = Array.from(document.querySelectorAll('.data-row'));
      let filteredRows = [...allRows];
      let currentPage = 1;
      const rowsPerPage = 25;

      function updateTable() {
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const visibleRows = filteredRows.slice(start, end);

        allRows.forEach(row => row.style.display = 'none');
        visibleRows.forEach(row => row.style.display = '');

        const totalRows = filteredRows.length;
        showingStart.textContent = totalRows > 0 ? start + 1 : 0;
        showingEnd.textContent = Math.min(end, totalRows);
        totalData.textContent = totalRows;

        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = end >= totalRows;

        if (filteredRows.length === 0) {
          dataTable.style.display = 'none';
          emptyState.classList.remove('hidden');
        } else {
          dataTable.style.display = '';
          emptyState.classList.add('hidden');
        }
      }

      searchInput.addEventListener('input', (e) => {
        const term = e.target.value.toLowerCase().trim();
        filteredRows = allRows.filter(row => row.textContent.toLowerCase().includes(term));
        currentPage = 1;
        updateTable();
      });

      prevBtn.addEventListener('click', () => {
        if (currentPage > 1) { currentPage--; updateTable(); }
      });

      nextBtn.addEventListener('click', () => {
        const maxPage = Math.ceil(filteredRows.length / rowsPerPage);
        if (currentPage < maxPage) { currentPage++; updateTable(); }
      });

      updateTable();
    }

    // =======================
    // === MODAL TAMBAH ADMIN ===
    // =======================
    function openAddAdminModal() {
      const modal = document.getElementById('addAdminModal');
      if (modal) modal.classList.remove('hidden');
    }

    function closeAddAdminModal() {
      const modal = document.getElementById('addAdminModal');
      if (modal) modal.classList.add('hidden');
    }

    // =======================
    // === MODAL EDIT ADMIN ===
    // =======================
    function openEditAdminModal(id, nama, username, email) {
      const modal = document.getElementById('editAdminModal');
      const form = document.getElementById('editAdminForm');

      if (!modal || !form) {
        console.error('Modal edit admin tidak ditemukan.');
        return;
      }

      // Isi data
      document.getElementById('editNamaPanitia').value = nama || '';
      document.getElementById('editUsername').value = username || '';
      document.getElementById('editEmail').value = email || '';

      // Arahkan ke route yang benar (lihat route:list → PUT admin/update/{id})
      form.action = `/admin/update/${id}`;

      modal.classList.remove('hidden');
    }

    function closeEditAdminModal() {
      const modal = document.getElementById('editAdminModal');
      if (modal) modal.classList.add('hidden');
    }
    </script>

<script>
// =============================================
// === MODAL EDIT PENDAFTAR ===
// =============================================
function openEditModal(userId) {
  const modal = document.getElementById('editPendaftarModal');
  const form = document.getElementById('editForm');
  
  // Set action URL (sesuai route baru)
  form.action = `/admin/pendaftar/${userId}/update`;
  
  // Fetch data via AJAX (sesuai route baru)
  fetch(`/admin/pendaftar/${userId}/edit`)
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      return response.json();
    })
    .then(data => {
      document.getElementById('editNama').value = data.nama_pendaftar || '';
      document.getElementById('editNISN').value = data.nisn_pendaftar || '';
      document.getElementById('editTanggal').value = data.tanggallahir_pendaftar || '';
      document.getElementById('editAlamat').value = data.alamat_pendaftar || '';
      document.getElementById('editAgama').value = data.agama || '';
      document.getElementById('editOrtu').value = data.nama_ortu || '';
      document.getElementById('editPekerjaan').value = data.pekerjaan_ortu || '';
      document.getElementById('editHP').value = data.no_hp_ortu || '';
      
      // Show modal
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Gagal memuat data pendaftar: ' + error.message);
    });
}

function closeEditModal() {
  const modal = document.getElementById('editPendaftarModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
}

// =============================================
// === MODAL LIHAT BERKAS ===
// =============================================
function showBerkas(userId) {
  const modal = document.getElementById('documentModal');
  const content = document.getElementById('documentContent');
  
  // Show loading
  content.innerHTML = '<div class="text-center py-8"><div class="animate-spin rounded-full h-12 w-12 border-b-2 border-indigo-500 mx-auto"></div><p class="mt-4 text-gray-600">Memuat berkas...</p></div>';
  
  modal.classList.remove('hidden');
  
  // Fetch berkas (sesuai route baru)
  fetch(`/admin/pendaftar/${userId}/berkas`)
    .then(response => response.json())
    .then(data => {
      if (data.berkas && data.berkas.length > 0) {
        let html = '<div class="space-y-4">';
        data.berkas.forEach(file => {
          const fileUrl = `/storage/${file.file_path}`;
          const fileName = file.file_path.split('/').pop();
          
          html += `
            <div class="border rounded-lg p-4 hover:bg-gray-50">
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                  <svg class="w-8 h-8 text-indigo-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                  </svg>
                  <div>
                    <p class="font-medium text-gray-900">${file.nama_berkas || 'Dokumen'}</p>
                    <p class="text-sm text-gray-500">${fileName}</p>
                  </div>
                </div>
                <a href="${fileUrl}" target="_blank" class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 text-sm">
                  Lihat
                </a>
              </div>
            </div>
          `;
        });
        html += '</div>';
        content.innerHTML = html;
      } else {
        content.innerHTML = '<div class="text-center py-8 text-gray-500">Tidak ada berkas yang diunggah</div>';
      }
    })
    .catch(error => {
      console.error('Error:', error);
      content.innerHTML = '<div class="text-center py-8 text-red-500">Gagal memuat berkas</div>';
    });
}

function closeModal() {
  document.getElementById('documentModal').classList.add('hidden');
}

// =============================================
// === MODAL KONFIRMASI ===
// =============================================
function openConfirmModal(button, actionUrl, method = 'POST') {
  const modal = document.getElementById('confirmModal');
  const form = document.getElementById('confirmForm');
  const message = document.getElementById('confirmMessage');
  
  // Set form action
  form.action = actionUrl;
  
  // Tambah method spoofing jika DELETE
  let methodInput = form.querySelector('input[name="_method"]');
  if (method === 'DELETE') {
    if (!methodInput) {
      methodInput = document.createElement('input');
      methodInput.type = 'hidden';
      methodInput.name = '_method';
      form.appendChild(methodInput);
    }
    methodInput.value = 'DELETE';
  } else {
    if (methodInput) methodInput.remove();
  }
  
  // Set pesan konfirmasi
  if (actionUrl.includes('approve')) {
    message.textContent = 'Apakah Anda yakin ingin menerima pendaftar ini?';
  } else if (actionUrl.includes('reject')) {
    message.textContent = 'Apakah Anda yakin ingin menolak pendaftar ini?';
  } else if (actionUrl.includes('delete')) {
    message.textContent = 'Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.';
  } else {
    message.textContent = 'Apakah Anda yakin ingin melanjutkan?';
  }
  
  // Show modal
  modal.classList.remove('hidden');
  modal.classList.add('flex');
}

function closeConfirmModal() {
  const modal = document.getElementById('confirmModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
}

function closeEditModal() {
  const modal = document.getElementById('editPendaftarModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
}

// =============================================
// === MODAL KONFIRMASI (ACC/TOLAK/HAPUS) ===
// =============================================
function openConfirmModal(button, actionUrl, method = 'POST') {
  const modal = document.getElementById('confirmModal');
  const form = document.getElementById('confirmForm');
  const message = document.getElementById('confirmMessage');
  
  // Set form action
  form.action = actionUrl;
  
  // Tambah method spoofing jika DELETE
  let methodInput = form.querySelector('input[name="_method"]');
  if (method === 'DELETE') {
    if (!methodInput) {
      methodInput = document.createElement('input');
      methodInput.type = 'hidden';
      methodInput.name = '_method';
      form.appendChild(methodInput);
    }
    methodInput.value = 'DELETE';
  } else {
    if (methodInput) methodInput.remove();
  }
  
  // Set pesan konfirmasi berdasarkan aksi
  if (actionUrl.includes('approve')) {
    message.textContent = 'Apakah Anda yakin ingin menerima pendaftar ini?';
  } else if (actionUrl.includes('reject')) {
    message.textContent = 'Apakah Anda yakin ingin menolak pendaftar ini?';
  } else if (actionUrl.includes('delete')) {
    message.textContent = 'Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.';
  } else {
    message.textContent = 'Apakah Anda yakin ingin melanjutkan?';
  }
  
  // Show modal
  modal.classList.remove('hidden');
  modal.classList.add('flex');
}

function closeConfirmModal() {
  const modal = document.getElementById('confirmModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
}

// =============================================
// === MODAL LIHAT BERKAS ===
// =============================================
function showBerkas(userId) {
  const modal = document.getElementById('documentModal');
  const content = document.getElementById('documentContent');
  
  // Show loading
  content.innerHTML = '<div class="text-center py-8"><div class="animate-spin rounded-full h-12 w-12 border-b-2 border-indigo-500 mx-auto"></div><p class="mt-4 text-gray-600">Memuat berkas...</p></div>';
  
  modal.classList.remove('hidden');
  
  // Fetch berkas data
  fetch(`/admin/pendaftar/${userId}/berkas`)
    .then(response => response.json())
    .then(data => {
      if (data.berkas && data.berkas.length > 0) {
        let html = '<div class="space-y-4">';
        data.berkas.forEach(file => {
          const fileUrl = `/storage/${file.file_path}`;
          const fileName = file.file_path.split('/').pop();
          const fileExt = fileName.split('.').pop().toLowerCase();
          
          html += `
            <div class="border rounded-lg p-4 hover:bg-gray-50">
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                  <svg class="w-8 h-8 text-indigo-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                  </svg>
                  <div>
                    <p class="font-medium text-gray-900">${file.nama_berkas || 'Dokumen'}</p>
                    <p class="text-sm text-gray-500">${fileName}</p>
                  </div>
                </div>
                <a href="${fileUrl}" target="_blank" class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 text-sm">
                  Lihat
                </a>
              </div>
            </div>
          `;
        });
        html += '</div>';
        content.innerHTML = html;
      } else {
        content.innerHTML = '<div class="text-center py-8 text-gray-500">Tidak ada berkas yang diunggah</div>';
      }
    })
    .catch(error => {
      console.error('Error:', error);
      content.innerHTML = '<div class="text-center py-8 text-red-500">Gagal memuat berkas</div>';
    });
}

function closeModal() {
  document.getElementById('documentModal').classList.add('hidden');
}

// Close modal ketika klik di luar
document.addEventListener('click', function(e) {
  const modals = ['editPendaftarModal', 'confirmModal', 'documentModal'];
  modals.forEach(modalId => {
    const modal = document.getElementById(modalId);
    if (modal && e.target === modal) {
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }
  });
});

// Close dengan tombol ESC
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    closeEditModal();
    closeConfirmModal();
    closeModal();
  }
});
</script>

    </body>
    </html>