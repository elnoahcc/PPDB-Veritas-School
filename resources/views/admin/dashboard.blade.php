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
      <div class="p-6 border-b">
        <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
      </div>
      
      <nav class="flex-1 p-4 overflow-y-auto">
        <ul class="space-y-2">
          <li>
            <a href="#" onclick="showPage('home')" class="nav-link flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 transition-colors font-medium text-gray-700 bg-gray-100">
              <span>Home</span>
            </a>
          </li>
          <li>
            <a href="#" onclick="showPage('dataPendaftar')" class="nav-link flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 transition-colors font-medium text-gray-700">
              <span>Data Pendaftar</span>
            </a>
          </li>
          <li>
            <a href="#" onclick="showPage('settings')" class="nav-link flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 transition-colors font-medium text-gray-700">
              <span>Settings</span>
            </a>
          </li>
        </ul>
      </nav>
      
       <div class="p-4 border-t">
        <button type="button" onclick="showLogoutModal()" class="w-full bg-red-500 text-white py-3 px-4 rounded-lg hover:bg-red-600 transition-colors font-medium shadow-sm">
          Logout
        </button>
      </div>
    </aside>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden md:hidden z-30"></div>

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
            <div class="p-4 md:p-6 border-b">
              <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <h2 class="text-lg md:text-xl lg:text-2xl font-semibold text-gray-800">Data Lengkap Pendaftar</h2>
                <div class="relative">
                  <input 
                    type="text" 
                    id="searchInput" 
                    placeholder="Cari nama, NISN, atau alamat..." 
                    class="w-full md:w-80 px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                  >
                  <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
                </div>
              </div>
            </div>

            <div class="p-4 md:p-6">
              @if(session('success'))
              <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4">
                {{ session('success') }}
              </div>
              @endif

              <div id="emptyState" class="hidden text-center py-12 md:py-16">
                <div class="text-gray-400 mb-3">
                  <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
                </div>
                <p class="text-base md:text-lg text-gray-500 font-medium">Data tidak ditemukan</p>
                <p class="text-sm text-gray-400 mt-2">Coba kata kunci lain</p>
              </div>

              @if($pendaftar->isEmpty())
              <div class="text-center py-12 md:py-16">
                <div class="text-gray-400 mb-3">
                  <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                  </svg>
                </div>
                <p class="text-base md:text-lg text-gray-500 font-medium">Belum ada pendaftar</p>
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
                    <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
                      @foreach($pendaftar as $index => $user)
                      @php
                      $avg = round(($user->nilai_smt1 + $user->nilai_smt2 + $user->nilai_smt3 + $user->nilai_smt4 + $user->nilai_smt5) / 5, 2);
                      @endphp
                      <tr class="hover:bg-gray-50 transition-colors data-row" data-index="{{ $index }}">
                        <td class="px-3 py-4 text-sm font-semibold text-gray-900">{{ $index + 1 }}</td>
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
                        <td class="px-3 py-4 text-sm text-gray-700 whitespace-nowrap">{{ $user->prestasi ?? '-' }}</td>
                        <td class="px-3 py-4 text-sm text-center">
                          @if($user->documents && count($user->documents) > 0)
                          <button onclick="showDocuments({{ $user->id }})" class="inline-flex items-center px-3 py-1.5 bg-indigo-500 text-white text-xs font-medium rounded-lg hover:bg-indigo-600 transition-colors shadow-sm">
                            {{ count($user->documents) }} Berkas
                          </button>
                          @else
                          <span class="text-gray-400 text-xs">Tidak ada</span>
                          @endif
                        </td>
                        
                        <td class="px-3 py-4 text-sm text-center">
                          <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium {{ $user->status === 'approved' ? 'bg-green-100 text-green-800' : ($user->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                            {{ $user->status ?? 'Pending' }}
                          </span>
                        </td>
                        <td class="px-3 py-4 text-sm">
    @if(!$user->status || $user->status === 'pending')
    <div class="flex gap-2 justify-center flex-wrap">
        <form action="{{ route('admin.approve', $user->id) }}" method="POST">
            @csrf
            <button type="submit" 
                    onclick="return confirm('Apakah Anda yakin ingin menerima pendaftar ini?')"
                    class="inline-flex items-center px-3 py-1.5 bg-green-500 text-white text-xs font-medium rounded-lg hover:bg-green-600 transition-colors shadow-sm">
                Terima
            </button>
        </form>
        <form action="{{ route('admin.reject', $user->id) }}" method="POST">
            @csrf
            <button type="submit" 
                    onclick="return confirm('Apakah Anda yakin ingin menolak pendaftar ini?')"
                    class="inline-flex items-center px-3 py-1.5 bg-red-500 text-white text-xs font-medium rounded-lg hover:bg-red-600 transition-colors shadow-sm">
                Tolak
            </button>
        </form>
    </div>
    @else
    <span class="text-gray-500 text-xs">Selesai</span>
    @endif
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
                  <button id="prevBtn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                    Previous
                  </button>
                  <button id="nextBtn" class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                    Next
                  </button>
                </div>
              </div>
              @endif
            </div>
          </div>
          </div>

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
    // Set username (ganti dengan data dinamis dari backend)
    const username = 'Admin'; // Akan diganti dengan {{ auth()->user()->username }}
    document.getElementById('usernameDisplay').textContent = username;

    // Logout Modal Functions
    function showLogoutModal() {
      document.getElementById('logoutUsername').textContent = username;
      document.getElementById('logoutModal').classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }

    function closeLogoutModal() {
      document.getElementById('logoutModal').classList.add('hidden');
      document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    document.getElementById('logoutModal').addEventListener('click', function(e) {
      if (e.target === this) {
        closeLogoutModal();
      }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        closeLogoutModal();
      }
    });

    // Page Navigation
    function showPage(pageName) {
      document.querySelectorAll('.page-content').forEach(page => {
        page.classList.add('hidden');
      });

      document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('bg-gray-100');
      });

      if (pageName === 'home') {
        document.getElementById('homePage').classList.remove('hidden');
        document.querySelectorAll('.nav-link')[0].classList.add('bg-gray-100');
      } else if (pageName === 'dataPendaftar') {
        document.getElementById('dataPendaftarPage').classList.remove('hidden');
        document.querySelectorAll('.nav-link')[1].classList.add('bg-gray-100');
      } else if (pageName === 'settings') {
        document.getElementById('settingsPage').classList.remove('hidden');
        document.querySelectorAll('.nav-link')[2].classList.add('bg-gray-100');
      }

      if (window.innerWidth < 768) {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
      }
    }

    // Sidebar Toggle
    const menuBtn = document.getElementById('menuBtn');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    menuBtn.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
    });

    overlay.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });

    const sidebarLinks = sidebar.querySelectorAll('a');
    sidebarLinks.forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
      });
    });
  </script>

  <script>
    // Page Navigation
    function showPage(pageName) {
      // Hide all pages
      document.querySelectorAll('.page-content').forEach(page => {
        page.classList.add('hidden');
      });

      // Remove active class from all nav links
      document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('bg-gray-100');
      });

      // Show selected page
      if (pageName === 'home') {
        document.getElementById('homePage').classList.remove('hidden');
        document.querySelectorAll('.nav-link')[0].classList.add('bg-gray-100');
      } else if (pageName === 'dataPendaftar') {
        document.getElementById('dataPendaftarPage').classList.remove('hidden');
        document.querySelectorAll('.nav-link')[1].classList.add('bg-gray-100');
      } else if (pageName === 'settings') {
        document.getElementById('settingsPage').classList.remove('hidden');
        document.querySelectorAll('.nav-link')[2].classList.add('bg-gray-100');
      }

      // Close sidebar on mobile after navigation
      if (window.innerWidth < 768) {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
      }
    }

    // Sidebar Toggle
    const menuBtn = document.getElementById('menuBtn');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    menuBtn.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
    });

    overlay.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });

    // Close sidebar when clicking a link on mobile
    const sidebarLinks = sidebar.querySelectorAll('a');
    sidebarLinks.forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
      });
    });

    // Pagination and Search
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

        // Hide all rows first
        allRows.forEach(row => row.style.display = 'none');

        // Show only visible rows
        visibleRows.forEach(row => row.style.display = '');

        // Update pagination info
        const totalRows = filteredRows.length;
        showingStart.textContent = totalRows > 0 ? start + 1 : 0;
        showingEnd.textContent = Math.min(end, totalRows);
        totalData.textContent = totalRows;

        // Update button states
        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = end >= totalRows;

        // Show/hide empty state
        if (filteredRows.length === 0) {
          dataTable.style.display = 'none';
          emptyState.classList.remove('hidden');
        } else {
          dataTable.style.display = '';
          emptyState.classList.add('hidden');
        }
      }

      // Search functionality
      searchInput.addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase().trim();
        
        filteredRows = allRows.filter(row => {
          const text = row.textContent.toLowerCase();
          return text.includes(searchTerm);
        });

        currentPage = 1;
        updateTable();
      });

      // Pagination buttons
      prevBtn.addEventListener('click', () => {
        if (currentPage > 1) {
          currentPage--;
          updateTable();
        }
      });

      nextBtn.addEventListener('click', () => {
        const maxPage = Math.ceil(filteredRows.length / rowsPerPage);
        if (currentPage < maxPage) {
          currentPage++;
          updateTable();
        }
      });

      // Initial render
      updateTable();
    }
  </script>
</body>
</html>