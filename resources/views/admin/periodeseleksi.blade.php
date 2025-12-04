 <!-- Main Content -->
<div class="flex-1 flex flex-col min-h-screen pt-4 relative z-10">
      <div class="flex-1 ">
        <div class="p-4 md:p-6 lg:p-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
      <div>
        <h1 class="text-3xl font-bold text-gray-800">Manajemen Periode Seleksi</h1>
        <p class="text-gray-600 mt-1">Kelola periode penerimaan siswa baru</p>
      </div>
      <button onclick="showAddPeriodeForm()" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg flex items-center gap-2 transition duration-200 shadow-md">
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
              <td class="px-4NLanjutkanpy-3 text-sm text-center">{{ $periode->jumlahPeserta() }}</td>
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
<i class="fas fa-calendar-times text-5xl mb-4 text-gray-300"></i>
<p class="text-lg font-medium">Belum ada periode yang dibuat</p>
<p class="text-sm mt-1">Klik tombol "Tambah Periode" untuk membuat periode baru</p>
</td>
</tr>
@endforelse
</tbody>
</table>
</div>
</div>
  </div>
</div>