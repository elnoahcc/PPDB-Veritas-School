<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Pendaftar</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('image/icon/icon.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- ✅ Tailwind Config -->
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
  <link href="https://fonts.googleapis.com/css2?family=Hubot+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">

  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-100 font-hubot flex">

  <!-- Sidebar -->
  <aside class="w-64 bg-white h-screen shadow-lg p-6 flex flex-col fixed">
    <h2 class="text-2xl font-bold mb-8">Pendaftar</h2>
    <nav class="flex-1">
      <ul class="space-y-4">
        <li><a href="{{ route('pendaftar.dashboard') }}" class="block px-4 py-2 rounded bg-blue-100 text-blue-700 font-semibold">Dashboard</a></li>
        <li><a href="#" class="block px-4 py-2 rounded hover:bg-gray-200">Profil</a></li>
        <li><a href="#" class="block px-4 py-2 rounded hover:bg-gray-200">Panduan</a></li>
      </ul>
    </nav>
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 mt-4">Logout</button>
    </form>
  </aside>

  <!-- Main Content -->
  <main class="ml-64 flex-1 min-h-screen p-8">
    <header class="flex justify-between items-center mb-8">
      <h1 class="text-3xl font-bold">Selamat Datang, {{ auth()->user()->username }}</h1>
    </header>

    {{-- Alert Section --}}
    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-4 rounded mb-6">{{ session('success') }}</div>
    @endif
    @if($errors->any())
      <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
        <ul class="list-disc ml-5">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

   <div class="bg-white p-6 rounded-xl shadow mb-8">
  <h2 class="text-2xl font-semibold mb-4">Data Diri Pendaftar</h2>

  <form action="{{ route('pendaftar.update') }}" method="POST" class="space-y-6" onsubmit="return validateForm()">
    @csrf
    <div class="grid grid-cols-2 gap-4">
      <!-- NISN -->
      <div>
        <label class="block font-semibold mb-1">NISN</label>
        <input type="text" name="nisn_pendaftar"
          value="{{ old('nisn_pendaftar', $user->nisn_pendaftar) }}"
          class="w-full border rounded p-2"
          required>
      </div>

      <!-- Nama Lengkap -->
      <div>
        <label class="block font-semibold mb-1">Nama Lengkap</label>
        <input type="text" name="nama_pendaftar"
          value="{{ old('nama_pendaftar', $user->nama_pendaftar) }}"
          class="w-full border rounded p-2 capitalize-name"
          required>
      </div>

      <!-- Tanggal Lahir -->
      <div>
        <label class="block font-semibold mb-1">Tanggal Lahir</label>
        <input 
          type="date" 
          name="tanggallahir_pendaftar" 
          id="tanggallahir_pendaftar"
          value="{{ old('tanggallahir_pendaftar', $user->tanggallahir_pendaftar) }}"
          class="w-full border rounded p-2"
          required>
        <small class="text-gray-500 text-sm">*Usia minimal 10 tahun sebelum tahun ini</small>
      </div>

      <!-- Agama -->
      <div>
        <label class="block font-semibold mb-1">Agama</label>
        <div class="grid grid-cols-2 gap-2 mt-1">
          @php
            $agamaList = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu', 'Kepercayaan Khusus'];
          @endphp
          @foreach($agamaList as $a)
          <label class="flex items-center gap-2">
            <input type="radio" name="agama" value="{{ $a }}" 
              {{ old('agama', $user->agama) == $a ? 'checked' : '' }} required>
            <span>{{ $a }}</span>
          </label>
          @endforeach
        </div>
      </div>

      <!-- Alamat -->
      <div class="col-span-2">
        <label class="block font-semibold mb-1">Alamat Lengkap</label>
        <textarea name="alamat_pendaftar" class="w-full border rounded p-2" required>{{ old('alamat_pendaftar', $user->alamat_pendaftar) }}</textarea>
      </div>
    </div>

    <hr class="my-4">

    <!-- Data Orang Tua -->
    <h2 class="text-2xl font-semibold mb-4">Data Orang Tua</h2>
    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="block font-semibold mb-1">Nama Orang Tua</label>
        <input type="text" name="nama_ortu"
          value="{{ old('nama_ortu', $user->nama_ortu) }}"
          class="w-full border rounded p-2 capitalize-name"
          required>
      </div>
      <div>
        <label class="block font-semibold mb-1">Pekerjaan Orang Tua</label>
        <input type="text" name="pekerjaan_ortu"
          value="{{ old('pekerjaan_ortu', $user->pekerjaan_ortu) }}"
          class="w-full border rounded p-2 capitalize-name"
          required>
      </div>
      <div>
        <label class="block font-semibold mb-1">No HP Orang Tua</label>
        <input type="text" name="no_hp_ortu"
          value="{{ old('no_hp_ortu', $user->no_hp_ortu) }}"
          class="w-full border rounded p-2"
          required>
      </div>
      <div class="col-span-2">
        <label class="block font-semibold mb-1">Alamat Orang Tua</label>
        <textarea name="alamat_ortu" class="w-full border rounded p-2" required>{{ old('alamat_ortu', $user->alamat_ortu) }}</textarea>
      </div>
    </div>

    <hr class="my-4">

    <!-- Nilai Semester -->
    <h2 class="text-2xl font-semibold mb-4">Nilai Rapor (Semester 1–5)</h2>
    <div class="grid grid-cols-5 gap-3">
      @for ($i = 1; $i <= 5; $i++)
      <div>
        <label class="block font-semibold mb-1">Semester {{ $i }}</label>
        <input type="number" step="0.01" min="0" max="100"
          name="nilai_smt{{ $i }}" 
          value="{{ old('nilai_smt'.$i, $user->{'nilai_smt'.$i}) }}"
          class="w-full border rounded p-2 text-center"
          required>
      </div>
      @endfor
    </div>

    <div class="text-right mt-6">
      <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">Simpan Data</button>
    </div>
  </form>
</div>

<!-- ✅ JAVASCRIPT UNTUK VALIDASI DAN KAPITALISASI -->
<script>
  // Validasi umur minimal 10 tahun
  function validateForm() {
    const tanggalLahir = document.querySelector('[name="tanggallahir_pendaftar"]').value;
    if (tanggalLahir) {
      const tanggal = new Date(tanggalLahir);
      const batas = new Date();
      batas.setFullYear(batas.getFullYear() - 10);
      if (tanggal > batas) {
        alert("Usia minimal 10 tahun untuk pendaftar SMA!");
        return false;
      }
    }
    return true;
  }

  // Tanggal default dan batas
  const tglInput = document.getElementById('tanggallahir_pendaftar');
  const now = new Date();
  const minYear = now.getFullYear() - 18; // ideal umur SMA
  const maxYear = now.getFullYear() - 10;
  const maxDate = new Date(maxYear, now.getMonth(), now.getDate());
  const defaultDate = new Date(minYear, 6, 15);
  tglInput.max = maxDate.toISOString().split('T')[0];
  if (!tglInput.value) {
    tglInput.value = defaultDate.toISOString().split('T')[0];
  }

  // Auto kapitalisasi nama dan pekerjaan
  document.querySelectorAll('.capitalize-name').forEach(input => {
    input.addEventListener('input', () => {
      input.value = input.value
        .toLowerCase()
        .replace(/\b\w/g, l => l.toUpperCase());
    });
  });
</script>


    <!-- Upload Berkas -->
    <div class="bg-white p-6 rounded-xl shadow">
      <h2 class="text-2xl font-semibold mb-4">Upload Berkas Wajib</h2>
      <form action="{{ route('pendaftar.uploadBerkas') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block font-semibold mb-1">Fotokopi Ijazah/SKHUN (Legalisir)</label>
            <input type="file" name="ijazah_skhun" class="w-full border rounded p-2" required>
            @if($berkas && $berkas->ijazah_skhun)
              <p class="text-green-600 text-sm mt-1">✔ {{ basename($berkas->ijazah_skhun) }}</p>
            @endif
          </div>
          <div>
            <label class="block font-semibold mb-1">Fotokopi Akta Kelahiran</label>
            <input type="file" name="akta_kelahiran" class="w-full border rounded p-2" required>
            @if($berkas && $berkas->akta_kelahiran)
              <p class="text-green-600 text-sm mt-1">✔ {{ basename($berkas->akta_kelahiran) }}</p>
            @endif
          </div>
          <div>
            <label class="block font-semibold mb-1">Fotokopi Kartu Keluarga (KK)</label>
            <input type="file" name="kk" class="w-full border rounded p-2" required>
            @if($berkas && $berkas->kk)
              <p class="text-green-600 text-sm mt-1">✔ {{ basename($berkas->kk) }}</p>
            @endif
          </div>
          <div>
            <label class="block font-semibold mb-1">Pas Foto 3x4 (4 Lembar)</label>
            <input type="file" name="pas_foto" class="w-full border rounded p-2" required>
            @if($berkas && $berkas->pas_foto)
              <p class="text-green-600 text-sm mt-1">✔ {{ basename($berkas->pas_foto) }}</p>
            @endif
          </div>
        </div>
        <div class="text-right mt-6">
          <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700">Upload Berkas</button>
        </div>
      </form>

      
    </div>

    <!-- Form Upload Prestasi -->
<div class="bg-white rounded-xl shadow p-6 mt-10">
  <h2 class="text-2xl font-semibold mb-4">Prestasi</h2>

  @if(session('success_prestasi'))
      <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
          {{ session('success_prestasi') }}
      </div>
  @endif

  <form action="{{ route('pendaftar.uploadPrestasi') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf

      <div>
          <label class="block font-semibold mb-1">Nama Kejuaraan</label>
          <input type="text" name="nama_kejuaraan" class="w-full border rounded p-2" required placeholder="Contoh: Olimpiade Sains 2024">
      </div>

      <div>
          <label class="block font-semibold mb-1">Tingkat Kejuaraan</label>
          <div class="flex gap-6 mt-2">
              @foreach(['Nasional', 'Provinsi', 'Kabupaten/Kota', 'Desa/Kelurahan'] as $tingkat)
              <label class="flex items-center gap-2">
                  <input type="radio" name="tingkat" value="{{ $tingkat }}" required>
                  <span>{{ $tingkat }}</span>
              </label>
              @endforeach
          </div>
      </div>

      <div>
          <label class="block font-semibold mb-1">Upload Foto Sertifikat/Prestasi</label>
          <input type="file" name="foto_prestasi" accept=".jpg,.jpeg,.png" required class="w-full border rounded p-2">
      </div>

      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
          Upload Prestasi
      </button>
  </form>

  <!-- Daftar Prestasi yang sudah diunggah -->
  <div class="mt-6">
      <h3 class="text-xl font-semibold mb-2">Prestasi Kamu</h3>
      @if($user->prestasis->isEmpty())
          <p class="text-gray-500">Belum ada prestasi yang diunggah.</p>
      @else
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
          @foreach($user->prestasis as $prestasi)
          <div class="border rounded-lg p-4 bg-gray-50">
              <img src="{{ asset('storage/' . $prestasi->foto_prestasi) }}" alt="Prestasi" class="w-full h-40 object-cover rounded mb-3">
              <p class="font-semibold">{{ $prestasi->nama_kejuaraan }}</p>
              <p class="text-sm text-gray-600">{{ $prestasi->tingkat }}</p>
          </div>
          @endforeach
      </div>
      @endif
  </div>
</div>

  </main>

</body>
</html>
