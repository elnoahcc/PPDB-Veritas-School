<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Pendaftar</title>
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
<!-- Tambahkan di <head> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Hubot+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">

  <style>
    .active {
      background-color: rgb(219 234 254);
      color: rgb(29 78 216);
      font-weight: 600;
    }
  </style>
</head>

<body class="bg-gray-100 font-hubot flex">

 

<!-- Sidebar -->
<aside class="w-64 bg-white h-screen shadow-lg p-6 flex flex-col fixed border-r border-gray-200">
  <!-- Logo -->
  <div class="flex justify-center mb-8">
    <img src="{{ asset('image/icon/icon.png') }}" alt="Logo Sekolah" class="w-24 h-auto">
  </div>

  <nav class="flex-1 space-y-2">
    <button onclick="showPage('dashboard', this)" class="nav-btn flex items-center gap-3 w-full text-left px-4 py-2 rounded hover:bg-gray-200 transition">
      <i class="fa-solid fa-gauge text-gray-600"></i> Dashboard
    </button>

    <!-- Dropdown -->
    <div>
      <button onclick="toggleDropdown()" class="flex items-center justify-between w-full px-4 py-2 rounded hover:bg-gray-200 transition">
        <span class="flex items-center gap-3 text-gray-700">
          <i class="fa-solid fa-folder-open text-gray-600"></i> Data Pendaftar
        </span>
        <i id="dropdownIcon" class="fa-solid fa-chevron-down text-gray-600 transition-transform duration-200"></i>
      </button>

      <div id="dropdownMenu" class="hidden pl-4 mt-1 space-y-1">
        <button onclick="showPage('identitas', this)" class="nav-btn flex items-center gap-3 w-full text-left px-4 py-2 rounded hover:bg-gray-200">
          <i class="fa-solid fa-id-card text-gray-600"></i> Identitas
        </button>
        <button onclick="showPage('prestasi', this)" class="nav-btn flex items-center gap-3 w-full text-left px-4 py-2 rounded hover:bg-gray-200">
          <i class="fa-solid fa-trophy text-gray-600"></i> Prestasi
        </button>
        <button onclick="showPage('berkas', this)" class="nav-btn flex items-center gap-3 w-full text-left px-4 py-2 rounded hover:bg-gray-200">
          <i class="fa-solid fa-file-lines text-gray-600"></i> Berkas
        </button>
      </div>
    </div>
    
    <button onclick="showPage('seleksi', this)" class="nav-btn flex items-center gap-3 w-full text-left px-4 py-2 rounded hover:bg-gray-200">
  <i class="fa-solid fa-user-check text-gray-600"></i> Seleksi
</button>


    <button onclick="showPage('panduan', this)" class="nav-btn flex items-center gap-3 w-full text-left px-4 py-2 rounded hover:bg-gray-200">
      <i class="fa-solid fa-book-open text-gray-600"></i> Panduan
    </button>

    <button onclick="showPage('profile', this)" class="nav-btn flex items-center gap-3 w-full text-left px-4 py-2 rounded hover:bg-gray-200">
  <i class="fa-solid fa-user text-gray-600"></i> Profile
</button>


    <!-- Tombol Logout -->
    <div class="pt-4">
      <button type="button" onclick="openLogoutModal()" class="w-full flex items-center justify-center gap-2 bg-red-500 text-white py-2 rounded hover:bg-red-600 transition">
        <i class="fa-solid fa-right-from-bracket"></i> Logout
      </button>
    </div>
  </nav>
</aside>

<!-- Modal Konfirmasi Logout -->
<div id="logoutModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-xl shadow-2xl w-96 p-6 relative animate-fadeIn">
    <!-- Tombol Close (X) -->
    <button onclick="closeLogoutModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
      <i class="fa-solid fa-xmark text-xl"></i>
    </button>

    <div class="text-center mt-2">
      <i class="fa-solid fa-circle-exclamation text-red-500 text-4xl mb-3"></i>
      <h3 class="text-xl font-semibold text-gray-800 mb-2">Konfirmasi Logout</h3>
      <p class="text-gray-600 mb-6">
        Apakah kamu ingin logout, <span class="font-semibold text-gray-800">{{ Auth::user()->username }}</span>?
      </p>

      <div class="flex justify-center gap-3">
        <button onclick="closeLogoutModal()" class="border border-gray-400 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-100 transition">
          <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
        </button>

        <form id="logoutForm" action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
            <i class="fa-solid fa-right-from-bracket mr-1"></i> Logout
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Script -->
<script>
  function toggleDropdown() {
    const menu = document.getElementById('dropdownMenu');
    const icon = document.getElementById('dropdownIcon');
    menu.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
  }

  function openLogoutModal() {
    const modal = document.getElementById('logoutModal');
    modal.classList.remove('hidden');
  }

  function closeLogoutModal() {
    const modal = document.getElementById('logoutModal');
    modal.classList.add('hidden');
  }

  function showPage(pageId, btn) {
    document.querySelectorAll('.page').forEach(p => p.classList.add('hidden'));
    document.getElementById(pageId).classList.remove('hidden');
    document.querySelectorAll('.nav-btn').forEach(b => b.classList.remove('bg-gray-200'));
    btn.classList.add('bg-gray-200');
  }
</script>

<!-- Animasi halus -->
<style>
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-fadeIn {
    animation: fadeIn 0.25s ease-in-out;
  }
</style>


  <!-- Main Content -->
  <main class="ml-64 flex-1 min-h-screen p-8">

<div id="dashboard" class="page p-6 relative z-10">

  <!-- Marquee Warning Banner Full Width -->
  <div id="warningMarquee" class="w-full fixed top-0 left-0 bg-yellow-400 text-yellow-900 font-semibold shadow-md z-50">
    <div class="flex items-center justify-between px-6 py-3 overflow-hidden">
      <div class="flex-shrink-0 mr-4">
        <i class="fa-solid fa-triangle-exclamation text-yellow-900"></i>
      </div>
      <div class="flex-1 overflow-hidden">
        <div class="whitespace-nowrap animate-marquee" aria-live="polite">
          Peringatan: Pastikan semua data dan berkas sudah lengkap sebelum mengirimkan pendaftaran. Hubungi panitia jika membutuhkan bantuan.
        </div>
      </div>
      <div class="flex-shrink-0 ml-4">
        <button aria-label="Tutup peringatan" onclick="dismissWarning()" class="text-yellow-900 hover:bg-yellow-300 p-2 rounded transition">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>
    </div>
  </div>

  <style>
    @keyframes marquee {
      0% { transform: translateX(100%); }
      100% { transform: translateX(-100%); }
    }
    .animate-marquee {
      display: inline-block;
      animation: marquee 12s linear infinite;
    }
    @media (max-width: 640px) {
      .animate-marquee { animation-duration: 16s; }
    }
  </style>

  <script>
    function adjustForWarning() {
      const banner = document.getElementById('warningMarquee');
      if (!banner) return;
      const height = banner.offsetHeight || 48;
      const aside = document.querySelector('aside');
      const main = document.querySelector('main');
      if (aside) aside.style.top = height + 'px';
      if (main) main.style.paddingTop = height + 'px';
    }
    function dismissWarning() {
      const banner = document.getElementById('warningMarquee');
      if (!banner) return;
      banner.style.transition = 'transform .3s ease, opacity .3s ease';
      banner.style.transform = 'translateY(-100%)';
      banner.style.opacity = '0';
      setTimeout(() => {
        banner.remove();
        const aside = document.querySelector('aside');
        const main = document.querySelector('main');
        if (aside) aside.style.top = '0';
        if (main) main.style.paddingTop = '';
      }, 300);
    }
    window.addEventListener('DOMContentLoaded', adjustForWarning);
    window.addEventListener('resize', adjustForWarning);
  </script>

  <!-- Salam -->
  <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ $user->username }}</h1>
  <p class="text-gray-600 mb-6">{{ $user->nama_pendaftar}}, Sudah siap menjadi bagian dari Veritas School?</p>

  <!-- Row 1: Status Cards -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <!-- Status Pendaftaran -->
    <div class="bg-white shadow-lg rounded-xl p-6 border border-gray-100">
      <h2 class="text-xl font-semibold mb-3 text-gray-800 flex items-center">
        <i class="fa-solid fa-file-circle-check text-blue-500 mr-2"></i> Status Pendaftaran
      </h2>
      <span
        class="inline-block px-4 py-1.5 rounded-full text-sm font-semibold 
        {{ $user->status === 'approved' ? 'bg-green-100 text-green-700 border border-green-400' :
           ($user->status === 'rejected' ? 'bg-red-100 text-red-700 border border-red-400' :
           'bg-yellow-100 text-yellow-700 border border-yellow-400') }}">
        {{ ucfirst($user->status) }}
      </span>
    </div>

    <!-- Status Seleksi -->
    <div class="bg-white shadow-lg rounded-xl p-6 border border-gray-100">
      <h2 class="text-xl font-semibold mb-3 text-gray-800 flex items-center">
        <i class="fa-solid fa-clipboard-list text-indigo-500 mr-2"></i> Status Seleksi
      </h2>
      <span
        class="inline-block px-4 py-1.5 rounded-full text-sm font-semibold border 
        {{ $user->status_seleksi === 'Lulus' ? 'border-green-500 text-green-600 bg-green-50/60' :
           ($user->status_seleksi === 'Tidak Lulus' ? 'border-red-500 text-red-600 bg-red-50/60' :
           'border-gray-400 text-gray-600 bg-gray-50/50') }}">
        {{ $user->status_seleksi }}
      </span>
    </div>
  </div>

  <!-- Row 2: Fast Menu -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Download Data PDF -->
    <a href="{{ route('pendaftar.dashboard.pdf') }}" class="bg-blue-600 text-white rounded-xl shadow-lg p-6 flex flex-col items-center justify-center hover:bg-blue-700 transition">
      <i class="fa-solid fa-file-pdf text-4xl mb-2"></i>
      <span class="font-semibold text-lg text-center">Download Data PDF</span>
    </a>

    <!-- Persyaratan & Ketentuan -->
    <button id="termsBtn" class="bg-green-600 text-white rounded-xl shadow-lg p-6 flex flex-col items-center justify-center hover:bg-green-700 transition">
      <i class="fa-solid fa-file-contract text-4xl mb-2"></i>
      <span class="font-semibold text-lg text-center">Persyaratan & Ketentuan</span>
    </button>

    <!-- Formulir Pendaftaran -->
    <a href="" class="bg-purple-600 text-white rounded-xl shadow-lg p-6 flex flex-col items-center justify-center hover:bg-purple-700 transition">
      <i class="fa-solid fa-clipboard text-4xl mb-2"></i>
      <span class="font-semibold text-lg text-center">Formulir Pendaftaran</span>
    </a>

    <!-- Profil -->
    <a href="javascript:void(0)" onclick="showPage('profile', document.querySelector('[onclick*=profile]'))" 
   class="bg-orange-500 text-white rounded-xl shadow-lg p-6 flex flex-col items-center justify-center hover:bg-orange-600 transition">
  <i class="fa-solid fa-user text-4xl mb-2"></i>
  <span class="font-semibold text-lg text-center">Profil</span>
</a>

  </div>

  <!-- Data Pendaftar -->
  <div class="bg-white shadow-lg rounded-xl p-6 mb-8 border border-gray-100">
    <h2 class="text-xl font-semibold mb-4 text-gray-800 flex items-center">
      <i class="fa-solid fa-user text-teal-500 mr-2"></i> Data Pendaftar
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
      <div>
        <p class="text-gray-500">Nama Lengkap</p>
        <p class="font-semibold text-gray-800">{{ $user->nama_pendaftar ?? '-' }}</p>
      </div>
      <div>
        <p class="text-gray-500">NISN</p>
        <p class="font-semibold text-gray-800">{{ $user->nisn_pendaftar ?? '-' }}</p>
      </div>
      <div>
        <p class="text-gray-500">Tanggal Lahir</p>
        <p class="font-semibold text-gray-800">{{ $user->tanggallahir_pendaftar ?? '-' }}</p>
      </div>
      <div>
        <p class="text-gray-500">Agama</p>
        <p class="font-semibold text-gray-800">{{ $user->agama ?? '-' }}</p>
      </div>
      <div>
        <p class="text-gray-500">Alamat</p>
        <p class="font-semibold text-gray-800">{{ $user->alamat_pendaftar ?? '-' }}</p>
      </div>
      <div>
        <p class="text-gray-500">Nama Orang Tua</p>
        <p class="font-semibold text-gray-800">{{ $user->nama_ortu ?? '-' }}</p>
      </div>
      <div>
        <p class="text-gray-500">Pekerjaan Orang Tua</p>
        <p class="font-semibold text-gray-800">{{ $user->pekerjaan_ortu ?? '-' }}</p>
      </div>
      <div>
        <p class="text-gray-500">Nomor HP Orang Tua</p>
        <p class="font-semibold text-gray-800">{{ $user->no_hp_ortu ?? '-' }}</p>
      </div>
    </div>
  </div>

  <!-- Berkas -->
  <div class="bg-white shadow-lg rounded-xl p-6 mb-8 border border-gray-100">
    <h2 class="text-xl font-semibold mb-4 text-gray-800 flex items-center">
      <i class="fa-solid fa-folder-open text-purple-500 mr-2"></i> Berkas yang Diupload
    </h2>

    @if ($berkas)
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
        <div>
          <p class="text-gray-500">Ijazah / SKHUN</p>
          <a href="{{ asset('storage/' . $berkas->ijazah_skhun) }}" target="_blank" class="text-blue-600 hover:underline">Lihat File</a>
        </div>
        <div>
          <p class="text-gray-500">Akta Kelahiran</p>
          <a href="{{ asset('storage/' . $berkas->akta_kelahiran) }}" target="_blank" class="text-blue-600 hover:underline">Lihat File</a>
        </div>
        <div>
          <p class="text-gray-500">Kartu Keluarga</p>
          <a href="{{ asset('storage/' . $berkas->kk) }}" target="_blank" class="text-blue-600 hover:underline">Lihat File</a>
        </div>
        <div>
          <p class="text-gray-500">Pas Foto</p>
          <img src="{{ asset('storage/' . $berkas->pas_foto) }}" alt="Pas Foto" class="w-24 h-24 object-cover rounded-lg border">
        </div>
      </div>
    @else
      <p class="text-gray-500 italic">Belum ada berkas yang diupload.</p>
    @endif
  </div>

  <!-- Prestasi -->
  <div class="bg-white shadow-lg rounded-xl p-6 mb-8 border border-gray-100">
    <h2 class="text-xl font-semibold mb-4 text-gray-800 flex items-center">
      <i class="fa-solid fa-trophy text-yellow-500 mr-2"></i> Prestasi yang Diupload
    </h2>

    @if ($prestasis->count() > 0)
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($prestasis as $prestasi)
          <div class="border rounded-xl p-4 shadow-sm bg-gray-50">
            @if ($prestasi->foto_prestasi)
              <img src="{{ asset('storage/' . $prestasi->foto_prestasi) }}" alt="Foto Prestasi" class="w-full h-40 object-cover rounded-lg mb-3">
            @endif
            <p class="font-semibold text-gray-800">{{ $prestasi->nama_prestasi }}</p>
            <p class="text-gray-600 text-sm">{{ $prestasi->tingkat }}</p>
            <p class="text-gray-500 text-xs mt-1">Tahun: {{ $prestasi->tahun ?? '-' }}</p>
          </div>
        @endforeach
      </div>
    @else
      <p class="text-gray-500 italic">Belum ada prestasi yang diupload.</p>
    @endif
  </div>

  <!-- Nilai Rapor -->
  <div class="bg-white shadow-lg rounded-xl p-6 mb-8 border border-gray-100">
    <h2 class="text-xl font-semibold mb-4 text-gray-800 flex items-center">
      <i class="fa-solid fa-chart-line text-orange-500 mr-2"></i> Nilai Rapor
    </h2>

    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200 rounded-lg text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="py-2 px-4 text-left">Semester</th>
            <th class="py-2 px-4 text-left">Nilai</th>
          </tr>
        </thead>
        <tbody>
          @for ($i = 1; $i <= 5; $i++)
            <tr class="border-t">
              <td class="py-2 px-4 font-medium">Semester {{ $i }}</td>
              <td class="py-2 px-4">{{ $user->{'nilai_smt' . $i} ?? '-' }}</td>
            </tr>
          @endfor
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal Persyaratan & Ketentuan (sama persis seperti sebelumnya) -->
  <div id="termsModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white w-11/12 md:w-4/5 lg:w-3/4 xl:w-2/3 max-h-[90vh] overflow-y-auto rounded-xl p-8 relative">
      <button id="closeModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-2xl font-bold">&times;</button>
      <h2 class="text-3xl font-dmserif font-bold mb-4 text-gray-800">Persyaratan & Ketentuan Veritas School</h2>
      <p class="text-lg font-gabarito opacity-90 mb-6">Veritas School - Sekolah Unggulan</p>
      <!-- Konten persyaratan tetap sama seperti sebelumnya -->
      <div class="text-right mt-4">
        <button id="closeModalBtn" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
          Tutup
        </button>
      </div>
    </div>
  </div>

  <script>
    const modal = document.getElementById('termsModal');
    const btn = document.getElementById('termsBtn');
    const closeBtns = [document.getElementById('closeModal'), document.getElementById('closeModalBtn')];

    btn.addEventListener('click', () => {
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    });

    closeBtns.forEach(button => {
      button.addEventListener('click', () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
      });
    });

    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
      }
    });
  </script>

</div>

<!-- Data Pendaftar Sedang Diseleksi (Single User) -->
<div id="seleksi" class="page hidden">
  <div class="bg-white p-6 rounded-xl shadow mb-8">
    <h2 class="text-2xl font-semibold mb-4">Data Pendaftar Sedang Diseleksi</h2>

    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">NISN</th>
            <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Nama Lengkap</th>
            <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Tanggal Lahir</th>
            <th class="px-3 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">Rata-rata</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @php
              $avg = round(($user->nilai_smt1 + $user->nilai_smt2 + $user->nilai_smt3 + $user->nilai_smt4 + $user->nilai_smt5)/5, 2);
          @endphp
          <tr class="hover:bg-gray-50">
            <td class="px-3 py-4 text-sm text-gray-700">{{ $user->nisn_pendaftar ?? '-' }}</td>
            <td class="px-3 py-4 text-sm text-gray-700">{{ $user->nama_pendaftar ?? '-' }}</td>
            <td class="px-3 py-4 text-sm text-gray-700">{{ $user->tanggallahir_pendaftar ?? '-' }}</td>
            <td class="px-3 py-4 text-sm font-bold text-gray-900 text-center">{{ $avg }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>





    <!-- Identitas -->
    <div id="identitas" class="page hidden">
      {{-- ✅ Form Data Diri --}}
  <div class="bg-white p-6 rounded-xl shadow mb-8">
    <h2 class="text-2xl font-semibold mb-4">Data Diri Pendaftar</h2>
    <form action="{{ route('pendaftar.update') }}" method="POST" class="space-y-6">
      @csrf
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block font-semibold mb-1">NISN</label>
          <input type="text" name="nisn_pendaftar" class="w-full border rounded p-2"
                 value="{{ old('nisn_pendaftar', $user->nisn_pendaftar) }}" required>
        </div>
        <div>
          <label class="block font-semibold mb-1">Nama Lengkap</label>
          <input type="text" name="nama_pendaftar" class="w-full border rounded p-2 capitalize-name"
                 value="{{ old('nama_pendaftar', $user->nama_pendaftar) }}" required>
        </div>
        <div>
          <label class="block font-semibold mb-1">Tanggal Lahir</label>
          <input type="date" name="tanggallahir_pendaftar" class="w-full border rounded p-2"
                 value="{{ old('tanggallahir_pendaftar', $user->tanggallahir_pendaftar) }}" required>
        </div>
        <div>
          <label class="block font-semibold mb-1">Agama</label>
          <input type="text" name="agama" class="w-full border rounded p-2"
                 value="{{ old('agama', $user->agama) }}" required>
        </div>
        <div class="col-span-2">
          <label class="block font-semibold mb-1">Alamat</label>
          <textarea name="alamat_pendaftar" class="w-full border rounded p-2" required>{{ old('alamat_pendaftar', $user->alamat_pendaftar) }}</textarea>
        </div>
      </div>

      <hr class="my-4">
      <h2 class="text-2xl font-semibold mb-4">Data Orang Tua</h2>

      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block font-semibold mb-1">Nama Orang Tua</label>
          <input type="text" name="nama_ortu" class="w-full border rounded p-2"
                 value="{{ old('nama_ortu', $user->nama_ortu) }}" required>
        </div>
        <div>
          <label class="block font-semibold mb-1">Pekerjaan</label>
          <input type="text" name="pekerjaan_ortu" class="w-full border rounded p-2"
                 value="{{ old('pekerjaan_ortu', $user->pekerjaan_ortu) }}" required>
        </div>
        <div>
          <label class="block font-semibold mb-1">No HP</label>
          <input type="text" name="no_hp_ortu" class="w-full border rounded p-2"
                 value="{{ old('no_hp_ortu', $user->no_hp_ortu) }}" required>
        </div>
        <div class="col-span-2">
          <label class="block font-semibold mb-1">Alamat Orang Tua</label>
          <textarea name="alamat_ortu" class="w-full border rounded p-2" required>{{ old('alamat_ortu', $user->alamat_ortu) }}</textarea>
        </div>
      </div>

      <hr class="my-4">
      <h2 class="text-2xl font-semibold mb-4">Nilai Semester</h2>
      <div class="grid grid-cols-5 gap-3">
        @for ($i = 1; $i <= 5; $i++)
        <div>
          <label class="block font-semibold mb-1">SMT {{ $i }}</label>
          <input type="number" name="nilai_smt{{ $i }}" step="0.01" min="0" max="100"
                 class="w-full border rounded p-2 text-center"
                 value="{{ old('nilai_smt'.$i, $user->{'nilai_smt'.$i}) }}" required>
        </div>
        @endfor
      </div>

      <div class="text-right mt-6">
        <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
          Simpan Data
        </button>
      </div>
    </form>
  </div>

    </div>

   <!-- ✅ Prestasi -->
<div id="prestasi" class="page hidden">
  <div class="bg-white p-6 rounded-xl shadow mb-8">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Upload Prestasi</h2>

    {{-- ✅ Form Upload Prestasi --}}
    <form action="{{ route('pendaftar.uploadPrestasi') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf

      <div>
        <label for="nama_prestasi" class="block mb-1 font-medium text-gray-700">Nama Prestasi</label>
        <input
          type="text"
          name="nama_prestasi"
          id="nama_prestasi"
          class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
          required
        >
      </div>

      <div>
        <label for="tingkat" class="block mb-1 font-medium text-gray-700">Tingkat</label>
        <select
          name="tingkat"
          id="tingkat"
          class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
          required
        >
          <option value="Sekolah">Sekolah</option>
          <option value="Kota">Kota</option>
          <option value="Provinsi">Provinsi</option>
          <option value="Nasional">Nasional</option>
        </select>
      </div>

      <div>
        <label for="tahun" class="block mb-1 font-medium text-gray-700">Tahun</label>
        <select
          name="tahun"
          id="tahun"
          class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
          required
        >
          @php
            $currentYear = date('Y');
          @endphp
          @for ($i = 0; $i < 3; $i++)
            <option value="{{ $currentYear - $i }}">{{ $currentYear - $i }}</option>
          @endfor
        </select>
      </div>

      <div>
        <label for="foto_prestasi" class="block mb-1 font-medium text-gray-700">Foto Prestasi</label>
        <input
          type="file"
          name="foto_prestasi"
          id="foto_prestasi"
          class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
          accept="image/*"
          required
        >
      </div>

      <button
        type="submit"
        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition-colors"
      >
        Upload
      </button>
    </form>

    {{-- ✅ List Prestasi --}}
    <div class="mt-10">
      <h3 class="text-xl font-semibold mb-4 text-gray-800">Prestasi Kamu</h3>

      @if($prestasis->isEmpty())
        <p class="text-gray-500">Belum ada prestasi diunggah.</p>
      @else
        <div class="flex flex-wrap gap-6 justify-start">
          @foreach($prestasis as $prestasi)
            <div class="w-64 border rounded-lg p-4 bg-gray-50 shadow-sm hover:shadow-md transition-shadow">
              <img
                src="{{ Storage::url($prestasi->foto_prestasi) }}"
                alt="Prestasi"
                class="w-full h-40 object-cover rounded mb-3"
              >
              <p class="font-semibold text-gray-800">{{ $prestasi->nama_prestasi }}</p>
              <p class="text-sm text-gray-600">{{ $prestasi->tingkat }} - {{ $prestasi->tahun }}</p>
            </div>
          @endforeach
        </div>
      @endif
    </div>
  </div>
</div>


    <!-- Berkas -->
    <div id="berkas" class="page hidden">
     {{-- ✅ Upload Berkas --}}
  <div class="bg-white p-6 rounded-xl shadow mb-8">
    <h2 class="text-2xl font-semibold mb-4">Upload Berkas Wajib</h2>
    <form action="{{ route('pendaftar.uploadBerkas') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block font-semibold mb-1">Ijazah/SKHUN</label>
          <input type="file" name="ijazah_skhun" class="w-full border rounded p-2" required>
          @if($berkas && $berkas->ijazah_skhun)
            <p class="text-green-600 text-sm mt-1">✔ {{ basename($berkas->ijazah_skhun) }}</p>
          @endif
        </div>
        <div>
          <label class="block font-semibold mb-1">Akta Kelahiran</label>
          <input type="file" name="akta_kelahiran" class="w-full border rounded p-2" required>
          @if($berkas && $berkas->akta_kelahiran)
            <p class="text-green-600 text-sm mt-1">✔ {{ basename($berkas->akta_kelahiran) }}</p>
          @endif
        </div>
        <div>
          <label class="block font-semibold mb-1">Kartu Keluarga</label>
          <input type="file" name="kk" class="w-full border rounded p-2" required>
          @if($berkas && $berkas->kk)
            <p class="text-green-600 text-sm mt-1">✔ {{ basename($berkas->kk) }}</p>
          @endif
        </div>
        <div>
          <label class="block font-semibold mb-1">Pas Foto 3x4</label>
          <input type="file" name="pas_foto" class="w-full border rounded p-2" required>
          @if($berkas && $berkas->pas_foto)
            <p class="text-green-600 text-sm mt-1">✔ {{ basename($berkas->pas_foto) }}</p>
          @endif
        </div>
      </div>
      <div class="text-right mt-6">
        <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700">
          Upload Berkas
        </button>
      </div>
    </form>
  </div>


    </div>

    <!-- Panduan -->
<div id="panduan" class="page hidden">
  <div class="bg-white p-6 rounded-xl shadow mb-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Panduan Pendaftaran Siswa Baru</h2>

    <p class="text-gray-600 mb-8 text-center">
      Ikuti langkah-langkah berikut untuk melengkapi proses pendaftaran secara online dengan benar dan mudah.
    </p>

    <!-- Langkah-langkah -->
    <div class="space-y-6">
      <div class="flex items-start gap-4">
        <div class="bg-blue-500 text-white font-bold w-8 h-8 rounded-full flex items-center justify-center">1</div>
        <div>
          <h3 class="text-lg font-semibold text-gray-800">Login atau Buat Akun</h3>
          <p class="text-gray-600">
            Masuk ke sistem menggunakan akun yang telah dibuat. Jika belum memiliki akun, silakan lakukan registrasi
            terlebih dahulu dengan mengisi formulir pendaftaran akun baru.
          </p>
        </div>
      </div>

      <div class="flex items-start gap-4">
        <div class="bg-blue-500 text-white font-bold w-8 h-8 rounded-full flex items-center justify-center">2</div>
        <div>
          <h3 class="text-lg font-semibold text-gray-800">Lengkapi Data Diri</h3>
          <p class="text-gray-600">
            Isi seluruh data pribadi, data orang tua, dan informasi kontak dengan benar. Pastikan tidak ada kolom yang
            terlewat untuk menghindari kesalahan verifikasi.
          </p>
        </div>
      </div>

      <div class="flex items-start gap-4">
        <div class="bg-blue-500 text-white font-bold w-8 h-8 rounded-full flex items-center justify-center">3</div>
        <div>
          <h3 class="text-lg font-semibold text-gray-800">Upload Dokumen</h3>
          <p class="text-gray-600">
            Unggah dokumen yang diminta seperti <strong>akta kelahiran, kartu keluarga, rapor terakhir, dan pas foto</strong>.
            Pastikan ukuran dan format file sesuai ketentuan.
          </p>
        </div>
      </div>

      <div class="flex items-start gap-4">
        <div class="bg-blue-500 text-white font-bold w-8 h-8 rounded-full flex items-center justify-center">4</div>
        <div>
          <h3 class="text-lg font-semibold text-gray-800">Upload Prestasi (Opsional)</h3>
          <p class="text-gray-600">
            Jika memiliki prestasi akademik atau non-akademik, unggah sertifikat atau foto sebagai bukti. 
            Ini dapat menjadi nilai tambah dalam proses seleksi.
          </p>
        </div>
      </div>

      <div class="flex items-start gap-4">
        <div class="bg-blue-500 text-white font-bold w-8 h-8 rounded-full flex items-center justify-center">5</div>
        <div>
          <h3 class="text-lg font-semibold text-gray-800">Periksa dan Simpan Data</h3>
          <p class="text-gray-600">
            Sebelum mengirimkan, pastikan semua data telah benar. Anda dapat meninjau kembali dan memperbaiki data
            sebelum menekan tombol <strong>"Kirim Pendaftaran"</strong>.
          </p>
        </div>
      </div>

      <div class="flex items-start gap-4">
        <div class="bg-blue-500 text-white font-bold w-8 h-8 rounded-full flex items-center justify-center">6</div>
        <div>
          <h3 class="text-lg font-semibold text-gray-800">Konfirmasi dan Cetak Bukti</h3>
          <p class="text-gray-600">
            Setelah berhasil mengirimkan formulir, sistem akan menampilkan <strong>bukti pendaftaran</strong>.
            Simpan atau cetak bukti tersebut sebagai arsip.
          </p>
        </div>
      </div>
    </div>

    <!-- Catatan Tambahan -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mt-10">
      <h4 class="font-semibold text-blue-700 mb-2">💡 Tips Penting:</h4>
      <ul class="list-disc list-inside text-blue-700 space-y-1">
        <li>Gunakan foto dan dokumen dengan resolusi yang jelas.</li>
        <li>Pastikan koneksi internet stabil saat melakukan upload data.</li>
        <li>Simpan perubahan setiap kali Anda mengedit data.</li>
        <li>Jika mengalami kendala, hubungi panitia melalui menu “Kontak Panitia”.</li>
      </ul>
    </div>
  </div>
</div>
<!-- Profile Page -->
<div id="profile" class="page hidden">
  <div class="bg-white p-6 rounded-xl shadow mx-auto">

    <h2 class="text-3xl font-semibold mb-6 text-center md:text-left">Profil Pendaftar</h2>

    <!-- Flex container utama -->
    <div class="flex flex-col md:flex-row gap-6">

      <!-- Pas Foto Besar -->
      <div class="flex-shrink-0">
        @if($berkas && $berkas->pas_foto)
          <img src="{{ asset('storage/' . $berkas->pas_foto) }}" alt="Pas Foto" class="w-48 h-60 object-cover rounded-lg border shadow">
        @else
          <div class="w-48 h-60 bg-gray-200 rounded-lg flex items-center justify-center text-gray-500 border text-lg font-semibold">
            Belum ada foto
          </div>
        @endif
      </div>

      <!-- Data utama di samping gambar -->
      <div class="flex-1 flex flex-col justify-center gap-4">
        <div>
          <p class="text-gray-500">Nama Lengkap</p>
          <p class="font-semibold text-gray-800 text-lg">{{ $user->nama_pendaftar ?? '-' }}</p>
        </div>
        <div>
          <p class="text-gray-500">NISN</p>
          <p class="font-semibold text-gray-800 text-lg">{{ $user->nisn_pendaftar ?? '-' }}</p>
        </div>
        <div>
          <p class="text-gray-500">Nomor HP</p>
          <p class="font-semibold text-gray-800 text-lg">{{ $user->no_hp_ortu ?? '-' }}</p>
        </div>
      </div>

    </div>

    <!-- Data tambahan di bawah -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm mt-6">
      <div>
        <p class="text-gray-500">Tanggal Lahir</p>
        <p class="font-semibold text-gray-800">{{ $user->tanggallahir_pendaftar ?? '-' }}</p>
      </div>
      <div>
        <p class="text-gray-500">Agama</p>
        <p class="font-semibold text-gray-800">{{ $user->agama ?? '-' }}</p>
      </div>
      <div class="col-span-2">
        <p class="text-gray-500">Alamat</p>
        <p class="font-semibold text-gray-800">{{ $user->alamat_pendaftar ?? '-' }}</p>
      </div>
      <div>
        <p class="text-gray-500">Nama Orang Tua</p>
        <p class="font-semibold text-gray-800">{{ $user->nama_ortu ?? '-' }}</p>
      </div>
      <div>
        <p class="text-gray-500">Pekerjaan Orang Tua</p>
        <p class="font-semibold text-gray-800">{{ $user->pekerjaan_ortu ?? '-' }}</p>
      </div>
    </div>

  </div>
</div>




  </main>

  <script>
    // === Ganti halaman ===
    function showPage(pageId, btn) {
      document.querySelectorAll('.page').forEach(p => p.classList.add('hidden'));
      document.getElementById(pageId).classList.remove('hidden');

      document.querySelectorAll('.nav-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    }

    // === Toggle dropdown ===
    function toggleDropdown() {
      const menu = document.getElementById('dropdownMenu');
      const icon = document.getElementById('dropdownIcon');
      menu.classList.toggle('hidden');
      icon.classList.toggle('rotate-180');
    }

    // === Default halaman awal ===
    document.addEventListener("DOMContentLoaded", () => {
      showPage('dashboard', document.querySelector('.nav-btn'));
    });
  </script>

</body>
</html>
