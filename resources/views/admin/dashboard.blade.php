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

  <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Hubot+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50 font-hubot overflow-hidden">

  <!-- Mobile Header -->
  <div class="fixed top-0 left-0 right-0 bg-white shadow-md px-4 py-3 flex justify-between items-center md:hidden z-50">
    <h2 class="text-lg font-bold text-gray-800">Dashboard Admin</h2>
    <button id="menuBtn" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>

  <div class="flex h-screen">
<!-- Sidebar -->
<aside id="sidebar" class="fixed md:static top-0 left-0 w-64 bg-white h-screen shadow-lg flex flex-col transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-40">
  
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

<!-- Overlay -->
<div id="overlay" class="fixed inset-0 bg-blue-600 bg-opacity-50 hidden md:hidden z-30"></div>

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
<!-- DATA PENDAFTAR PAGE -->
<div id="dataPendaftarPage" class="page-content hidden">
  <div class="bg-white rounded-xl shadow-sm border border-gray-100">

    <!-- Header -->
    <div class="p-4 md:p-6 border-b">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <h2 class="text-lg md:text-xl lg:text-2xl font-semibold text-gray-800">Data Lengkap Pendaftar</h2>
        <div class="relative">
          <input type="text" id="searchInput" placeholder="Cari nama, NISN, atau alamat..." class="w-full md:w-80 px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
          <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
      </div>
    </div>

    <div class="p-4 md:p-6">
      @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4">{{ session('success') }}</div>
      @endif

      @if($pendaftar->isEmpty())
        <div class="text-center py-12 md:py-16 text-gray-500 font-medium">
          <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
          </svg>
          <p>Belum ada pendaftar</p>
        </div>
      @else
        <div class="overflow-x-auto -mx-4 md:mx-0">
          <div class="inline-block min-w-full align-middle">
            <table class="min-w-full divide-y divide-gray-200" id="dataTable">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">No</th>
                  <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">Nama</th>
                  <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">NISN</th>
                  <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">Tanggal Lahir</th>
                  <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">Alamat</th>
                  <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">Agama</th>
                  <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">Nama Ortu</th>
                  <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">Pekerjaan Ortu</th>
                  <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">No HP Ortu</th>
                  <th class="px-3 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">SMT 1</th>
                  <th class="px-3 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">SMT 2</th>
                  <th class="px-3 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">SMT 3</th>
                  <th class="px-3 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">SMT 4</th>
                  <th class="px-3 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">SMT 5</th>
                  <th class="px-3 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">Rata-rata</th>
                  <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">Prestasi</th>
                  <th class="px-3 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">Berkas</th>
                  <th class="px-3 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">Status</th>
                  <th class="px-3 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">Aksi</th>
                </tr>
              </thead>
              <tbody id="tableBody">
                @foreach($pendaftar as $index => $user)
                  @php
                    $avg = round(($user->nilai_smt1 + $user->nilai_smt2 + $user->nilai_smt3 + $user->nilai_smt4 + $user->nilai_smt5)/5,2);
                  @endphp
                  <tr class="hover:bg-gray-50 transition-colors data-row">
                    <td class="px-3 py-4 text-sm font-semibold text-gray-900">{{ $index +1 }}</td>
                    <td class="px-3 py-4 text-sm text-gray-700 whitespace-nowrap">{{ $user->nama_pendaftar ?? '-' }}</td>
                    <td class="px-3 py-4 text-sm text-gray-700 whitespace-nowrap">{{ $user->nisn_pendaftar ?? '-' }}</td>
                    <td class="px-3 py-4 text-sm text-gray-700 whitespace-nowrap">{{ $user->tanggallahir_pendaftar ?? '-' }}</td>
                    <td class="px-3 py-4 text-sm text-gray-700 max-w-[200px] truncate" title="{{ $user->alamat_pendaftar }}">{{ $user->alamat_pendaftar ?? '-' }}</td>
                    <td class="px-3 py-4 text-sm text-gray-700 whitespace-nowrap">{{ $user->agama ?? '-' }}</td>
                    <td class="px-3 py-4 text-sm text-gray-700 whitespace-nowrap">{{ $user->nama_ortu ?? '-' }}</td>
                    <td class="px-3 py-4 text-sm text-gray-700 whitespace-nowrap">{{ $user->pekerjaan_ortu ?? '-' }}</td>
                    <td class="px-3 py-4 text-sm text-gray-700 whitespace-nowrap">{{ $user->no_hp_ortu ?? '-' }}</td>
                    <td class="px-3 py-4 text-sm text-gray-700 text-center">{{ $user->nilai_smt1 ?? '-' }}</td>
                    <td class="px-3 py-4 text-sm text-gray-700 text-center">{{ $user->nilai_smt2 ?? '-' }}</td>
                    <td class="px-3 py-4 text-sm text-gray-700 text-center">{{ $user->nilai_smt3 ?? '-' }}</td>
                    <td class="px-3 py-4 text-sm text-gray-700 text-center">{{ $user->nilai_smt4 ?? '-' }}</td>
                    <td class="px-3 py-4 text-sm text-gray-700 text-center">{{ $user->nilai_smt5 ?? '-' }}</td>
                    <td class="px-3 py-4 text-sm font-bold text-gray-900 text-center">{{ $avg }}</td>
                    <td class="px-3 py-4 text-sm text-gray-700 whitespace-nowrap">
                      @if($user->prestasis->count() > 0)
                        <ul class="list-disc ml-4">
                          @foreach($user->prestasis as $p)
                            <li>{{ $p->nama_kejuaraan }} ({{ $p->tingkat }})</li>
                          @endforeach
                        </ul>
                      @else
                        <span class="text-gray-400 text-xs">Tidak ada</span>
                      @endif
                    </td>
                    <td class="px-3 py-4 text-sm text-center">
                      @if($user->berkas)
                        <button onclick="showBerkas({{ $user->id }})" class="inline-flex items-center px-3 py-1.5 bg-indigo-500 text-white text-xs font-medium rounded-lg hover:bg-indigo-600 transition-colors shadow-sm">Lihat Berkas</button>
                      @else
                        <span class="text-gray-400 text-xs">Tidak ada</span>
                      @endif
                    </td>
                    <td class="px-3 py-4 text-sm text-center">
                      <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                        {{ $user->status === 'approved' ? 'bg-green-100 text-green-800' :
                          ($user->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                        {{ ucfirst($user->status ?? 'pending') }}
                      </span>
                    </td>
                   <td class="px-3 py-4 text-sm">
    <div class="flex gap-1 justify-center">
        <!-- Tombol Edit -->
        <button onclick="openEditModal({{ $user->id }})" class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg shadow-sm flex items-center justify-center" title="Edit">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M16.5 3.5a2.121 2.121 0 013 3L12 14l-4 1 1-4 7.5-7.5z"/>
            </svg>
        </button>

        <!-- Tombol Terima -->
        @if(!$user->status || $user->status === 'pending')
        <button onclick="openConfirmModal(this, '{{ route('admin.approve', $user->id) }}')" class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg shadow-sm flex items-center justify-center" title="Terima">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </button>
        <button onclick="openConfirmModal(this, '{{ route('admin.reject', $user->id) }}', 'DELETE')" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg shadow-sm flex items-center justify-center" title="Tolak">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        @endif

        <!-- Tombol Hapus -->
        <button onclick="openConfirmModal(this, '{{ route('admin.delete', $user->id) }}', 'DELETE')" class="bg-gray-500 hover:bg-gray-600 text-white p-2 rounded-lg shadow-sm flex items-center justify-center" title="Hapus">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4"/>
            </svg>
        </button>
    </div>
</td>

                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
          <div class="text-sm text-gray-600">
            Menampilkan <span id="showingStart">1</span> - <span id="showingEnd">25</span> dari <span id="totalData">{{ count($pendaftar) }}</span> data
          </div>
          <div class="flex gap-2">
            <button id="prevBtn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">Previous</button>
            <button id="nextBtn" class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">Next</button>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl p-6 relative">
    <button onclick="closeEditModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700">&times;</button>
    <h2 class="text-xl font-semibold mb-4">Edit Data Pendaftar</h2>
    <form id="editForm" method="POST" action="">
      @csrf
      @method('PUT')
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div><label class="text-sm font-medium text-gray-700">Nama</label><input type="text" name="nama_pendaftar" id="editNama" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm"></div>
        <div><label class="text-sm font-medium text-gray-700">NISN</label><input type="text" name="nisn_pendaftar" id="editNISN" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm"></div>
        <div><label class="text-sm font-medium text-gray-700">Tanggal Lahir</label><input type="date" name="tanggallahir_pendaftar" id="editTanggal" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm"></div>
        <div><label class="text-sm font-medium text-gray-700">Alamat</label><input type="text" name="alamat_pendaftar" id="editAlamat" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm"></div>
        <div><label class="text-sm font-medium text-gray-700">Agama</label><input type="text" name="agama" id="editAgama" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm"></div>
        <div><label class="text-sm font-medium text-gray-700">Nama Ortu</label><input type="text" name="nama_ortu" id="editOrtu" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm"></div>
        <div><label class="text-sm font-medium text-gray-700">Pekerjaan Ortu</label><input type="text" name="pekerjaan_ortu" id="editPekerjaan" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm"></div>
        <div><label class="text-sm font-medium text-gray-700">No HP Ortu</label><input type="text" name="no_hp_ortu" id="editHP" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm"></div>
      </div>
      <div class="mt-6 flex justify-end gap-2">
        <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</button>
        <button type="submit" class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Confirm -->
<div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6 relative">
    <button onclick="closeConfirmModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700">&times;</button>
    <h2 class="text-lg font-semibold mb-4">Konfirmasi</h2>
    <p id="confirmMessage" class="mb-6">Apakah anda yakin?</p>
    <form id="confirmForm" method="POST" action="">
      @csrf
      <button type="button" onclick="closeConfirmModal()" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 mr-2">Batal</button>
      <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Ya, Lanjutkan</button>
    </form>
  </div>
</div>



<!-- === PAGE DATA ADMIN === -->
<div id="dataAdminPage" class="page-content hidden">
  <div class="p-6 bg-white rounded-xl shadow-md">
    <div class="flex items-center justify-between mb-5">
      <h2 class="text-2xl font-bold text-gray-700">Data Admin</h2>
      <button
        onclick="openAddAdminModal()"
        class="flex items-center gap-2 bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-sm transition"
      >
        <i class="fa fa-plus"></i> Tambah Admin
      </button>
    </div>

    <div class="overflow-x-auto rounded-lg border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
          <tr>
            <th class="px-4 py-3">No</th>
            <th class="px-4 py-3">Username</th>
            <th class="px-4 py-3">No HP</th>
            <th class="px-4 py-3">Email</th>
            <th class="px-4 py-3 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse ($admins as $index => $admin)
            <tr class="hover:bg-gray-50 transition">
              <td class="px-4 py-3 font-semibold text-gray-700">{{ $index + 1 }}</td>
              <td class="px-4 py-3">{{ $admin->username }}</td>
              <td class="px-4 py-3">{{ $admin->no_hp ?? '-' }}</td>
              <td class="px-4 py-3">{{ $admin->email ?? '-' }}</td>
              <td class="px-4 py-3 text-center space-x-2">
                <button
                  onclick="openEditAdminModal({{ $admin->id }}, '{{ $admin->username }}', '{{ $admin->no_hp }}', '{{ $admin->email }}')"
                  class="inline-flex items-center gap-1 bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1.5 rounded-lg transition"
                >
                  <i class="fa fa-edit"></i> Edit
                </button>
                <button
                  onclick="openConfirmModal(this, '{{ route('admin.delete', $admin->id) }}', 'DELETE')"
                  class="inline-flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-lg transition"
                >
                  <i class="fa fa-trash"></i> Hapus
                </button>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center text-gray-500 py-6">Belum ada admin</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- ========================================================= -->
<!-- ==== MODALS (DILETAKKAN DI LUAR PAGE-CONTENT) ==== -->
<!-- ========================================================= -->

<!-- Modal Tambah Admin -->
<div id="addAdminModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 relative">
    <button onclick="closeAddAdminModal()" class="absolute top-3 right-4 text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
    <h2 class="text-xl font-semibold mb-5 text-gray-700">Tambah Admin</h2>
    <form method="POST" action="{{ route('admin.store') }}" class="space-y-4">
      @csrf
      <div>
        <label class="text-sm font-medium text-gray-700">Username</label>
        <input type="text" name="username" required class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>
      <div>
        <label class="text-sm font-medium text-gray-700">No HP</label>
        <input type="text" name="no_hp" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>
      <div>
        <label class="text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>
      <div>
        <label class="text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" required class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>
      <div class="pt-4 flex justify-end gap-2">
        <button type="button" onclick="closeAddAdminModal()" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 transition">Batal</button>
        <button type="submit" class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Edit Admin -->
<div id="editAdminModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 relative">
    <button onclick="closeEditAdminModal()" class="absolute top-3 right-4 text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
    <h2 class="text-xl font-semibold mb-5 text-gray-700">Edit Admin</h2>
    <form id="editAdminForm" method="POST" class="space-y-4">
      @csrf
      @method('PUT')
      <div>
        <label class="text-sm font-medium text-gray-700">Username</label>
        <input type="text" name="username" id="editAdminUsername" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>
      <div>
        <label class="text-sm font-medium text-gray-700">No HP</label>
        <input type="text" name="no_hp" id="editAdminNoHP" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>
      <div>
        <label class="text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="editAdminEmail" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <div class="pt-4 flex justify-end gap-2">
        <button type="button" onclick="closeEditAdminModal()" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 transition">Batal</button>
        <button type="submit" class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- ========================================================= -->
<!-- ==== SCRIPT ==== -->
<!-- ========================================================= -->
<script>
  // === PAGE NAVIGATION ===
  function showPage(page) {
    document.querySelectorAll('.page-content').forEach(p => p.classList.add('hidden'));
    document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('bg-gray-100'));

    if (page === 'home') document.getElementById('homePage').classList.remove('hidden');
    else if (page === 'dataPendaftar') document.getElementById('dataPendaftarPage').classList.remove('hidden');
    else if (page === 'dataAdmin') document.getElementById('dataAdminPage').classList.remove('hidden');
    else if (page === 'settings') document.getElementById('settingsPage')?.classList.remove('hidden');
  }

  // === SIDEBAR MOBILE TOGGLE ===
  const menuBtn = document.getElementById('menuBtn');
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('overlay');
  if (menuBtn && sidebar && overlay) {
    menuBtn.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
    });
    overlay.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });
  }

  // === MODAL ADMIN ===
  function openAddAdminModal() {
    const modal = document.getElementById('addAdminModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }
  function closeAddAdminModal() {
    const modal = document.getElementById('addAdminModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  }

  function openEditAdminModal(id, username, no_hp, email) {
    const form = document.getElementById('editAdminForm');
    form.action = `{{ url('admin') }}/${id}/update`;
    document.getElementById('editAdminUsername').value = username;
    document.getElementById('editAdminNoHP').value = no_hp;
    document.getElementById('editAdminEmail').value = email;
    const modal = document.getElementById('editAdminModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }

  function closeEditAdminModal() {
    const modal = document.getElementById('editAdminModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  }
</script>









          <!-- SETTINGS PAGE -->
          <div id="settingsPage" class="page-content hidden">
            <header class="mb-6 md:mb-8">
              <h1 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-800">Settings</h1>
              <p class="text-gray-600 mt-2">Kelola pengaturan akun dan sistem</p>
            </header>

            <!-- Profile Settings -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6">
              <div class="p-4 md:p-6 border-b">
                <h2 class="text-lg md:text-xl font-semibold text-gray-800">Profil Admin</h2>
              </div>
              <div class="p-4 md:p-6">
               <form method="POST" action="{{ route('admin.updateProfile') }}" class="space-y-4">
  @csrf
  @method('PUT')
  <div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
    <input type="text" 
           name="username" 
           value="{{ auth()->user()->username }}" 
           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
  </div>
  <div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
    <input type="email" 
           name="email" 
           value="{{ auth()->user()->email }}" 
           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
  </div>
  <div>
    <button type="submit" class="px-6 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition-colors">
      Update Profil
    </button>
  </div>
</form>

              </div>
            </div>

            <!-- Change Password -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6">
              <div class="p-4 md:p-6 border-b">
                <h2 class="text-lg md:text-xl font-semibold text-gray-800">Ubah Password</h2>
              </div>
              <div class="p-4 md:p-6">
                <form method="POST" action="{{ route('admin.updatePassword') }}" class="space-y-4">
  @csrf
  <div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Password Lama</label>
    <input type="password" name="current_password" required
           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
  </div>
  <div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
    <input type="password" name="new_password" required
           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
  </div>
  <div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password Baru</label>
    <input type="password" name="new_password_confirmation" required
           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
  </div>
  <div>
    <button type="submit" class="px-6 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition-colors">
      Ubah Password
    </button>
  </div>
</form>



              </div>
            </div>

            <!-- System Settings -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
              <div class="p-4 md:p-6 border-b">
                <h2 class="text-lg md:text-xl font-semibold text-gray-800">Pengaturan Sistem</h2>
              </div>
              <div class="p-4 md:p-6">
                <div class="space-y-4">
                  <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                      <h3 class="font-medium text-gray-800">Notifikasi Email</h3>
                      <p class="text-sm text-gray-600">Terima notifikasi saat ada pendaftar baru</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                      <input type="checkbox" class="sr-only peer" checked>
                      <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-500"></div>
                    </label>
                  </div>
                  <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                      <h3 class="font-medium text-gray-800">Auto Approval</h3>
                      <p class="text-sm text-gray-600">Otomatis menerima pendaftar yang memenuhi syarat</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                      <input type="checkbox" class="sr-only peer">
                      <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-500"></div>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Modal Berkas -->
  <div id="documentModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-3xl max-h-[90vh] overflow-hidden flex flex-col">
      <div class="flex justify-between items-center p-4 md:p-6 border-b">
        <h3 class="text-xl md:text-2xl font-bold text-gray-800">Berkas Pendaftar</h3>
        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition-colors text-3xl leading-none">&times;</button>
      </div>
      <div id="documentContent" class="p-4 md:p-6 overflow-y-auto flex-1"></div>
    </div>
  </div>

   <!-- Modal Konfirmasi Logout -->
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


</body>
</html>