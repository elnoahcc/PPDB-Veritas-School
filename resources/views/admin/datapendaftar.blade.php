
  <div class="bg-white rounded-xl shadow-sm border border-gray-100">

    <!-- Header dengan Button Tambah Pendaftar -->
<div class="p-4 md:p-6 border-b">
  <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <h2 class="text-lg md:text-xl lg:text-2xl font-semibold text-gray-800">Data Pendaftar</h2>
    <div class="flex flex-col sm:flex-row gap-3">
      <!-- 🟢 BUTTON TAMBAH PENDAFTAR - INI YANG BARU -->
      <button onclick="openAddModal()" class="inline-flex items-center justify-center px-4 py-2 bg-green-500 text-white text-sm font-medium rounded-lg hover:bg-green-600 transition-colors shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Tambah Pendaftar
      </button>
      
      <!-- Search Input -->
      <div class="relative">
        <input type="text" id="searchInput" placeholder="Cari nama, NISN, atau alamat..." class="w-full md:w-80 px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      </div>
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
                  <th class="px-3 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">Username</th>
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
                    <td class="px-3 py-4 text-sm font-semibold text-gray-900">{{ $user->username ?? '-' }}</td>
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

<!-- Modal Tambah Pendaftar -->
<div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 overflow-y-auto">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-4xl p-6 relative my-8 mx-4 max-h-[90vh] overflow-y-auto">
    <button onclick="closeAddModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl font-bold">&times;</button>
    <h2 class="text-xl font-semibold mb-6 text-gray-800">Tambah Pendaftar Baru</h2>
    
    <form id="addForm" method="POST" action="{{ route('admin.pendaftar.store') }}">
      @csrf
      
      <!-- Data Akun -->
      <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Data Akun</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Username <span class="text-red-500">*</span></label>
            <input type="text" name="username" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
            <input type="email" name="email" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password <span class="text-red-500">*</span></label>
            <input type="password" name="password" required minlength="8" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
            <p class="text-xs text-gray-500 mt-1">Minimal 8 karakter</p>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password <span class="text-red-500">*</span></label>
            <input type="password" name="password_confirmation" required minlength="8" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
          </div>
        </div>
      </div>

      <!-- Data Pribadi -->
      <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Data Pribadi</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
            <input type="text" name="nama_pendaftar" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">NISN <span class="text-red-500">*</span></label>
            <input type="text" name="nisn_pendaftar" required maxlength="10" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir <span class="text-red-500">*</span></label>
            <input type="date" name="tanggallahir_pendaftar" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Agama <span class="text-red-500">*</span></label>
            <select name="agama" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
              <option value="">Pilih Agama</option>
              <option value="Islam">Islam</option>
              <option value="Kristen">Kristen</option>
              <option value="Katolik">Katolik</option>
              <option value="Hindu">Hindu</option>
              <option value="Buddha">Buddha</option>
              <option value="Konghucu">Konghucu</option>
            </select>
          </div>
          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat <span class="text-red-500">*</span></label>
            <textarea name="alamat_pendaftar" required rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"></textarea>
          </div>
        </div>
      </div>

      <!-- Data Orang Tua -->
      <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Data Orang Tua</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Orang Tua <span class="text-red-500">*</span></label>
            <input type="text" name="nama_ortu" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan Orang Tua <span class="text-red-500">*</span></label>
            <input type="text" name="pekerjaan_ortu" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">No HP Orang Tua <span class="text-red-500">*</span></label>
            <input type="text" name="no_hp_ortu" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
          </div>
        </div>
      </div>

      <!-- Nilai Semester -->
      <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Nilai Semester (Rata-rata Rapor)</h3>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Semester 1 <span class="text-red-500">*</span></label>
            <input type="number" name="nilai_smt1" required min="0" max="100" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Semester 2 <span class="text-red-500">*</span></label>
            <input type="number" name="nilai_smt2" required min="0" max="100" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Semester 3 <span class="text-red-500">*</span></label>
            <input type="number" name="nilai_smt3" required min="0" max="100" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Semester 4 <span class="text-red-500">*</span></label>
            <input type="number" name="nilai_smt4" required min="0" max="100" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Semester 5 <span class="text-red-500">*</span></label>
            <input type="number" name="nilai_smt5" required min="0" max="100" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
          </div>
        </div>
      </div>

      <!-- Buttons -->
      <div class="flex justify-end gap-2 border-t pt-4">
        <button type="button" onclick="closeAddModal()" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">Batal</button>
        <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
          <span class="submit-text">Simpan</span>
        </button>
      </div>
    </form>
  </div>
</div>
