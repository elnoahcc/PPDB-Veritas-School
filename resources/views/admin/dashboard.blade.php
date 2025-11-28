<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
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

  <!-- Overlay (HANYA 1) -->
  <div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-30 md:hidden"></div>

  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed md:static top-0 left-0 w-64 bg-white h-screen shadow-lg flex flex-col transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-50">
      
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

          <!-- Seleksi Menu -->
          <li>
            <button class="w-full flex items-center justify-between px-4 py-3 rounded-lg hover:bg-gray-100 transition-colors" onclick="toggleSubMenu('seleksiMenu')">
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                  <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                </svg>
                <span>Seleksi</span>
              </div>
              <svg id="seleksiMenuIcon" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0L5.25 8.27a.75.75 0 01-.02-1.06z" clip-rule="evenodd"/>
              </svg>
            </button>

            <ul id="seleksiMenu" class="ml-8 mt-2 space-y-1 hidden">
              <li>
                <a href="#" onclick="showPage('seleksiPeserta')" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                  </svg>
                  Seleksi Peserta
                </a>
              </li>
              <li>
                <a href="#" onclick="showPage('periodeSeleksi')" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                  </svg>
                  Periode Seleksi
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

    <!-- Main Content -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden pt-16 md:pt-0">
      <div class="flex-1 overflow-y-auto">
        <div class="p-4 md:p-6 lg:p-8">
          
          <!-- HOME PAGE -->
          <div id="homePage" class="page-content">
            <header class="mb-6 md:mb-8">
              <h1 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-800">
                Selamat Datang, <span id="usernameDisplay">Admin</span>
              </h1>
            </header>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6 mb-6 md:mb-8">
              <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <h2 class="text-sm md:text-base font-semibold text-gray-600 mb-2">Total Admin</h2>
                <p class="text-2xl md:text-3xl font-bold text-gray-800">5</p>
              </div>
              <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <h2 class="text-sm md:text-base font-semibold text-gray-600 mb-2">Total Pendaftar</h2>
                <p class="text-2xl md:text-3xl font-bold text-gray-800">128</p>
              </div>
            </div>

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
          @include('admin.datapendaftar')
          </div>

          <!-- DATA ADMIN PAGE -->
          <div id="dataAdminPage" class="page-content hidden">
           @include('admin.dataadmin')
          </div>

          <!-- SELEKSI PESERTA PAGE -->
          <div id="seleksiPesertaPage" class="page-content hidden">
            @include('admin.seleksipeserta')
          </div>

          <!-- PERIODE SELEKSI PAGE -->
          <div id="periodeSeleksiPage" class="page-content hidden">
            @include('admin.periodeseleksi')
          </div>

          <!-- SETTINGS PAGE -->
          <div id="settingsPage" class="page-content hidden">
           @include('admin.setting')    
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Logout Modal (HANYA 1) -->
  <div id="logoutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md transform transition-all">
      <div class="p-6 md:p-8">
        <div class="flex justify-center mb-4">
          <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
          </div>
        </div>

        <h3 class="text-xl md:text-2xl font-bold text-gray-900 text-center mb-2">Konfirmasi Logout</h3>
        <p class="text-gray-600 text-center mb-6">
          Apakah Anda yakin ingin keluar?
        </p>

        <div class="flex flex-col sm:flex-row gap-3">
          <button type="button" onclick="closeLogoutModal()" class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium">
            Kembali
          </button>
          <button type="button" onclick="handleLogout()" class="flex-1 px-6 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors font-medium shadow-sm">
            Logout
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- JAVASCRIPT (HANYA 1 SET FUNGSI) -->
  <script>
    // ===========================
    // KONFIGURASI & VARIABEL
    // ===========================
    const username = 'Admin';
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const menuBtn = document.getElementById('menuBtn');

    // Set username
    document.getElementById('usernameDisplay').textContent = username;

    // ===========================
    // MOBILE MENU TOGGLE
    // ===========================
    menuBtn.addEventListener('click', function() {
      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
      document.body.style.overflow = sidebar.classList.contains('-translate-x-full') ? 'auto' : 'hidden';
    });

    overlay.addEventListener('click', function() {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
      document.body.style.overflow = 'auto';
    });

    // ===========================
    // NAVIGATION FUNCTIONS
    // ===========================
    function showPage(pageName) {
      // Hide all pages
      document.querySelectorAll('.page-content').forEach(page => {
        page.classList.add('hidden');
      });

      // Remove active state from all nav links
      document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('bg-gray-100');
      });

      // Show selected page
      const pageMap = {
        home: 'homePage',
        dataPendaftar: 'dataPendaftarPage',
        dataAdmin: 'dataAdminPage',
        seleksiPeserta: 'seleksiPesertaPage',
        periodeSeleksi: 'periodeSeleksiPage',
        settings: 'settingsPage'
      };

      const pageId = pageMap[pageName];
      if (pageId) {
        document.getElementById(pageId).classList.remove('hidden');
      }

      // Close sidebar on mobile
      if (window.innerWidth < 768) {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.style.overflow = 'auto';
      }
    }

    // ===========================
    // SUBMENU TOGGLE
    // ===========================
    function toggleSubMenu(menuId) {
      const menu = document.getElementById(menuId);
      const icon = document.getElementById(menuId + 'Icon');
      
      if (menu && icon) {
        menu.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
      }
    }

    // ===========================
    // LOGOUT MODAL
    // ===========================
    function showLogoutModal() {
      const modal = document.getElementById('logoutModal');
      modal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }

    function closeLogoutModal() {
      const modal = document.getElementById('logoutModal');
      modal.classList.add('hidden');
      document.body.style.overflow = 'auto';
    }

    function handleLogout() {
      // Ganti dengan form submit ke route logout Laravel Anda
      alert('Logout berhasil!');
      // window.location.href = '/logout';
    }

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        closeLogoutModal();
      }
    });

    // Close modal when clicking outside
    document.getElementById('logoutModal').addEventListener('click', function(e) {
      if (e.target === this) {
        closeLogoutModal();
      }
    });

    // Fungsi untuk membuka modal tambah admin
function openAddAdminModal() {
  const modal = document.getElementById('addAdminModal');
  modal.classList.remove('hidden');
  modal.classList.add('flex');
  document.body.style.overflow = 'hidden';
}

// Fungsi untuk menutup modal tambah admin
function closeAddAdminModal() {
  const modal = document.getElementById('addAdminModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
  document.body.style.overflow = 'auto';
  
  // Reset form
  const form = modal.querySelector('form');
  if (form) form.reset();
}

// Fungsi untuk membuka modal edit admin
function openEditAdminModal(id, username, no_hp, email) {
  const modal = document.getElementById('editAdminModal');
  const form = document.getElementById('editAdminForm');
  
  // Set action URL untuk form edit
  form.action = `/admin/${id}`;
  
  // Isi data ke form
  document.getElementById('editAdminUsername').value = username || '';
  document.getElementById('editAdminNoHP').value = no_hp || '';
  document.getElementById('editAdminEmail').value = email || '';
  
  modal.classList.remove('hidden');
  modal.classList.add('flex');
  document.body.style.overflow = 'hidden';
}

// Fungsi untuk menutup modal edit admin
function closeEditAdminModal() {
  const modal = document.getElementById('editAdminModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
  document.body.style.overflow = 'auto';
  
  // Reset form
  const form = document.getElementById('editAdminForm');
  if (form) form.reset();
}

// Fungsi untuk konfirmasi hapus (opsional, jika Anda punya modal konfirmasi)
function openConfirmModal(element, url, method) {
  if (confirm('Apakah Anda yakin ingin menghapus admin ini?')) {
    // Buat form untuk submit delete request
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = url;
    
    // Tambahkan CSRF token
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (csrfToken) {
      const csrfInput = document.createElement('input');
      csrfInput.type = 'hidden';
      csrfInput.name = '_token';
      csrfInput.value = csrfToken.content;
      form.appendChild(csrfInput);
    }
    
    // Tambahkan method spoofing untuk DELETE
    const methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = method;
    form.appendChild(methodInput);
    
    // Submit form
    document.body.appendChild(form);
    form.submit();
  }
}

// Event listener untuk menutup modal saat klik di luar modal
document.addEventListener('DOMContentLoaded', function() {
  // Modal Tambah Admin
  const addAdminModal = document.getElementById('addAdminModal');
  if (addAdminModal) {
    addAdminModal.addEventListener('click', function(e) {
      if (e.target === this) {
        closeAddAdminModal();
      }
    });
  }
  
  // Modal Edit Admin
  const editAdminModal = document.getElementById('editAdminModal');
  if (editAdminModal) {
    editAdminModal.addEventListener('click', function(e) {
      if (e.target === this) {
        closeEditAdminModal();
      }
    });
  }
  
  // Event listener untuk tombol ESC
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      closeAddAdminModal();
      closeEditAdminModal();
    }
  });
}); 

function confirmReset(periodeId) {
  if (confirm('Apakah Anda yakin ingin mereset hasil seleksi periode ini?')) {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '{{ route("admin.seleksi.reset") }}';
    
    const csrf = document.createElement('input');
    csrf.type = 'hidden';
    csrf.name = '_token';
    csrf.value = '{{ csrf_token() }}';
    
    const periode = document.createElement('input');
    periode.type = 'hidden';
    periode.name = 'periode_id';
    periode.value = periodeId;
    
    form.appendChild(csrf);
    form.appendChild(periode);
    document.body.appendChild(form);
    form.submit();
  }
}

function openStatusModal(userId, nama, status) {
  document.getElementById('statusModal').classList.remove('hidden');
  document.getElementById('modalNama').value = nama;
  document.getElementById('statusForm').action = `/admin/seleksi/update-status/${userId}`;
  document.querySelector('select[name="status"]').value = status;
}

function closeStatusModal() {
  document.getElementById('statusModal').classList.add('hidden');
}

function confirmReset(periodeId) {
  if (confirm('Apakah Anda yakin ingin mereset hasil seleksi periode ini?')) {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '{{ route("admin.seleksi.reset") }}';
    
    const csrf = document.createElement('input');
    csrf.type = 'hidden';
    csrf.name = '_token';
    csrf.value = '{{ csrf_token() }}';
    
    const periode = document.createElement('input');
    periode.type = 'hidden';
    periode.name = 'periode_id';
    periode.value = periodeId;
    
    form.appendChild(csrf);
    form.appendChild(periode);
    document.body.appendChild(form);
    form.submit();
  }
}

// ==================== PAGINATION ====================
let currentPage = 1;
const rowsPerPage = 25;
let filteredRows = [];

function updatePagination() {
    const rows = document.querySelectorAll('#tableBody .data-row');
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    
    // Filter rows based on search
    filteredRows = Array.from(rows).filter(row => {
        const text = row.textContent.toLowerCase();
        return text.includes(searchInput);
    });

    const totalRows = filteredRows.length;
    const totalPages = Math.ceil(totalRows / rowsPerPage);
    
    // Hide all rows first
    rows.forEach(row => row.style.display = 'none');
    
    // Show only current page rows
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    
    filteredRows.slice(start, end).forEach(row => {
        row.style.display = '';
    });
    
    // Update pagination info
    document.getElementById('showingStart').textContent = totalRows > 0 ? start + 1 : 0;
    document.getElementById('showingEnd').textContent = Math.min(end, totalRows);
    document.getElementById('totalData').textContent = totalRows;
    
    // Update button states
    document.getElementById('prevBtn').disabled = currentPage === 1;
    document.getElementById('nextBtn').disabled = currentPage >= totalPages || totalRows === 0;
    
    // Update row numbers
    filteredRows.forEach((row, index) => {
        const numberCell = row.querySelector('td:first-child');
        if (numberCell) {
            numberCell.textContent = index + 1;
        }
    });
}

document.getElementById('prevBtn')?.addEventListener('click', () => {
    if (currentPage > 1) {
        currentPage--;
        updatePagination();
    }
});

document.getElementById('nextBtn')?.addEventListener('click', () => {
    const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
    if (currentPage < totalPages) {
        currentPage++;
        updatePagination();
    }
});

// ==================== SEARCH ====================
document.getElementById('searchInput')?.addEventListener('input', () => {
    currentPage = 1;
    updatePagination();
});

// ==================== MODAL EDIT ====================
function openEditModal(userId) {
    fetch(`/admin/pendaftar/${userId}/edit`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('editNama').value = data.nama_pendaftar || '';
            document.getElementById('editNISN').value = data.nisn_pendaftar || '';
            document.getElementById('editTanggal').value = data.tanggallahir_pendaftar || '';
            document.getElementById('editAlamat').value = data.alamat_pendaftar || '';
            document.getElementById('editAgama').value = data.agama || '';
            document.getElementById('editOrtu').value = data.nama_ortu || '';
            document.getElementById('editPekerjaan').value = data.pekerjaan_ortu || '';
            document.getElementById('editHP').value = data.no_hp_ortu || '';
            
            // Set form action
            document.getElementById('editForm').action = `/admin/pendaftar/${userId}/update`;
            
            // Show modal
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal memuat data pendaftar');
        });
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
    document.getElementById('editModal').classList.remove('flex');
}

// Submit form edit
document.getElementById('editForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const url = this.action;
    
    fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Data berhasil diperbarui!');
            location.reload();
        } else {
            alert(data.message || 'Gagal memperbarui data');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat memperbarui data');
    });
});

// ==================== MODAL CONFIRM ====================
function openConfirmModal(button, action, method = 'POST') {
    // Set message based on action
    let message = 'Apakah Anda yakin?';
    if (action.includes('approve')) {
        message = 'Apakah Anda yakin ingin menerima pendaftar ini?';
    } else if (action.includes('reject')) {
        message = 'Apakah Anda yakin ingin menolak pendaftar ini?';
    } else if (action.includes('delete')) {
        message = 'Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.';
    }
    
    document.getElementById('confirmMessage').textContent = message;
    document.getElementById('confirmForm').action = action;
    
    // Add method spoofing if DELETE
    let methodInput = document.getElementById('confirmForm').querySelector('input[name="_method"]');
    if (method === 'DELETE') {
        if (!methodInput) {
            methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            document.getElementById('confirmForm').appendChild(methodInput);
        }
        methodInput.value = 'DELETE';
    } else if (methodInput) {
        methodInput.remove();
    }
    
    // Show modal
    document.getElementById('confirmModal').classList.remove('hidden');
    document.getElementById('confirmModal').classList.add('flex');
}

function closeConfirmModal() {
    document.getElementById('confirmModal').classList.add('hidden');
    document.getElementById('confirmModal').classList.remove('flex');
}

// ==================== MODAL BERKAS ====================
function showBerkas(userId) {
    fetch(`/admin/pendaftar/${userId}/berkas`)
        .then(response => response.json())
        .then(data => {
            if (data.berkas && (data.berkas.kartu_keluarga || data.berkas.akta_kelahiran || data.berkas.ijazah)) {
                let berkasContent = '<div class="grid grid-cols-1 gap-4">';
                
                // Kartu Keluarga
                if (data.berkas.kartu_keluarga) {
                    berkasContent += `
                        <div class="border rounded-lg p-4">
                            <h3 class="font-semibold mb-2">Kartu Keluarga</h3>
                            <a href="${data.berkas.kartu_keluarga}" target="_blank" 
                               class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Lihat Berkas
                            </a>
                        </div>
                    `;
                }
                
                // Akta Kelahiran
                if (data.berkas.akta_kelahiran) {
                    berkasContent += `
                        <div class="border rounded-lg p-4">
                            <h3 class="font-semibold mb-2">Akta Kelahiran</h3>
                            <a href="${data.berkas.akta_kelahiran}" target="_blank" 
                               class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Lihat Berkas
                            </a>
                        </div>
                    `;
                }
                
                // Ijazah
                if (data.berkas.ijazah) {
                    berkasContent += `
                        <div class="border rounded-lg p-4">
                            <h3 class="font-semibold mb-2">Ijazah</h3>
                            <a href="${data.berkas.ijazah}" target="_blank" 
                               class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Lihat Berkas
                            </a>
                        </div>
                    `;
                }
                
                berkasContent += '</div>';
                
                // Create modal dynamically
                const modal = document.createElement('div');
                modal.id = 'berkasModal';
                modal.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
                modal.innerHTML = `
                    <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl p-6 relative max-h-[90vh] overflow-y-auto">
                        <button onclick="closeBerkasModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>
                        <h2 class="text-xl font-semibold mb-4">Berkas Pendaftar</h2>
                        ${berkasContent}
                    </div>
                `;
                
                document.body.appendChild(modal);
            } else {
                alert('Berkas tidak ditemukan');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal memuat berkas');
        });
}

function closeBerkasModal() {
    const modal = document.getElementById('berkasModal');
    if (modal) {
        modal.remove();
    }
}

// ==================== INITIALIZE ====================
document.addEventListener('DOMContentLoaded', function() {
    updatePagination();
    
    // Close modals on outside click
    document.getElementById('editModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeEditModal();
        }
    });
    
    document.getElementById('confirmModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeConfirmModal();
        }
    });
    
    // Close modals on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeEditModal();
            closeConfirmModal();
            closeBerkasModal();
        }
    });
});
  </script>

</body>
</html>