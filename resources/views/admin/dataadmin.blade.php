<div class="p-2 sm:p-6 bg-white rounded-xl shadow-md m-4 sm:m-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
        <h2 class="text-xl sm:text-2xl font-bold text-gray-700">Data Admin</h2>
        <button
        onclick="openAddAdminModal()"
        class="flex items-center justify-center gap-2 bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2.5 rounded-lg shadow-sm transition-all duration-200 hover:shadow-md"
        >
        <i class="fa fa-plus"></i> 
        <span>Tambah Admin</span>
        </button>
    </div>

    <!-- Search Bar -->
    <div class="mb-4">
        <div class="relative">
            <input 
                type="text" 
                id="searchInput"
                placeholder="Cari username, nama panitia, atau email..."
                class="w-full px-4 py-2.5 pl-10 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
            >
            <i class="fa fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        </div>
    </div>

    <!-- Desktop Table View -->
    <div class="hidden lg:block overflow-x-auto rounded-lg border border-gray-200">
        <table class="min-w-full text-sm text-left">
        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
    <tr>
        <th class="px-4 py-3 font-semibold">No</th>
        <th class="px-4 py-3 font-semibold">Username</th>
        <th class="px-4 py-3 font-semibold">Nama Panitia</th>
        <th class="px-4 py-3 font-semibold">Email</th>
        <th class="px-4 py-3 text-center font-semibold">Aksi</th>
    </tr>
</thead>    
       <tbody id="adminTableBody" class="divide-y divide-gray-100">
    @forelse ($admins as $index => $admin)
    <tr class="hover:bg-gray-50 transition-colors" data-username="{{ strtolower($admin->username) }}" data-nama="{{ strtolower($admin->admin->nama_panitia ?? '') }}" data-email="{{ strtolower($admin->email ?? '') }}">
        <td class="px-4 py-3 font-semibold text-gray-700">{{ $index + 1 }}</td>
        <td class="px-4 py-3 text-gray-700">{{ $admin->username }}</td>
        <td class="px-4 py-3 text-gray-600">{{ $admin->admin->nama_panitia ?? '-' }}</td>
        <td class="px-4 py-3 text-gray-600">{{ $admin->email ?? '-' }}</td>
        <td class="px-4 py-3">
            <div class="flex items-center justify-center gap-2">
                <button
                    onclick="openEditAdminModal({{ $admin->id }}, '{{ $admin->username }}', '{{ $admin->admin->nama_panitia ?? '' }}', '{{ $admin->email }}')"
                    class="inline-flex items-center gap-1.5 bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1.5 rounded-lg transition-all duration-200 hover:shadow-md text-xs font-medium"
                >
                    <i class="fa fa-edit"></i> Edit
                </button>
                <button
                    onclick="openConfirmModal(this, '{{ route('admin.delete', $admin->id) }}', 'DELETE')"
                    class="inline-flex items-center gap-1.5 bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-lg transition-all duration-200 hover:shadow-md text-xs font-medium"
                >
                    <i class="fa fa-trash"></i> Hapus
                </button>
            </div>
        </td>
    </tr>
    @empty
    <tr id="emptyRow">
        <td colspan="5" class="text-center text-gray-500 py-8">
            <i class="fa fa-inbox text-3xl mb-2 block text-gray-300"></i>
            <p class="font-medium">Belum ada admin</p>
        </td>
    </tr>
    @endforelse
</tbody>
        </table>
    </div>

    <!-- Mobile/Tablet Card View -->
    <div id="adminCardView" class="lg:hidden space-y-3">
        @forelse ($admins as $index => $admin)
        <div class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow" data-username="{{ strtolower($admin->username) }}" data-nama="{{ strtolower($admin->admin->nama_panitia ?? '') }}" data-email="{{ strtolower($admin->email ?? '') }}">
            <div class="flex items-start justify-between mb-3">
            <div class="flex-1">
                <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center justify-center w-6 h-6 bg-indigo-100 text-indigo-600 rounded-full text-xs font-bold">
                    {{ $admins->firstItem() + $index }}
                </span>
                <h3 class="font-semibold text-gray-800">{{ $admin->username }}</h3>
                </div>
                <div class="space-y-1.5 text-sm">
                <div class="flex items-center gap-2 text-gray-600">
                    <i class="fa fa-user w-4 text-gray-400"></i>
                    <span>{{ $admin->admin->nama_panitia ?? '-' }}</span>
                </div>
                <div class="flex items-center gap-2 text-gray-600">
                    <i class="fa fa-envelope w-4 text-gray-400"></i>
                    <span class="truncate">{{ $admin->email ?? '-' }}</span>
                </div>
                </div>
            </div>
            </div>
            
            <div class="flex gap-2 pt-3 border-t border-gray-100">
            <button
                onclick="openEditAdminModal({{ $admin->id }}, '{{ $admin->username }}', '{{ $admin->admin->nama_panitia ?? '' }}', '{{ $admin->email }}')"
                class="flex-1 inline-flex items-center justify-center gap-1.5 bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-2 rounded-lg transition-all duration-200 text-sm font-medium"
            >
                <i class="fa fa-edit"></i> Edit
            </button>
            <button
                onclick="openConfirmModal(this, '{{ route('admin.delete', $admin->id) }}', 'DELETE')"
                class="flex-1 inline-flex items-center justify-center gap-1.5 bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg transition-all duration-200 text-sm font-medium"
            >
                <i class="fa fa-trash"></i> Hapus
            </button>
            </div>
        </div>
        @empty
        <div id="emptyCard" class="text-center text-gray-500 py-12 border border-gray-200 rounded-lg">
            <i class="fa fa-inbox text-4xl mb-3 block text-gray-300"></i>
            <p class="font-medium">Belum ada admin</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $admins->links() }}
    </div>
    </div>

    <!-- ========================================================= -->
    <!-- ==== MODALS ==== -->
    <!-- ========================================================= -->

    <!-- Modal Tambah Admin -->
    <div id="addAdminModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-5 sm:p-6 relative max-h-[90vh] overflow-y-auto">
        <button onclick="closeAddAdminModal()" class="absolute top-3 right-4 text-gray-400 hover:text-gray-600 text-2xl leading-none">&times;</button>
        <h2 class="text-lg sm:text-xl font-semibold mb-4 sm:mb-5 text-gray-700 pr-8">Tambah Admin</h2>
        <form method="POST" action="{{ route('admin.store') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Username <span class="text-red-500">*</span></label>
            <input 
            type="text" 
            name="username" 
            required 
            class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
            placeholder="Masukkan username"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Panitia</label>
            <input 
            type="text" 
            name="nama_panitia" 
            class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
            placeholder="Masukkan nama panitia"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input 
            type="email" 
            name="email" 
            class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
            placeholder="admin@example.com"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password <span class="text-red-500">*</span></label>
            <input 
            type="password" 
            name="password" 
            required 
            class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
            placeholder="Minimal 8 karakter"
            >
        </div>
        <div class="pt-4 flex flex-col-reverse sm:flex-row justify-end gap-2">
            <button 
            type="button" 
            onclick="closeAddAdminModal()" 
            class="w-full sm:w-auto px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-all font-medium"
            >
            Batal
            </button>
            <button 
            type="submit" 
            class="w-full sm:w-auto px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition-all font-medium shadow-sm hover:shadow-md"
            >
            Simpan
            </button>
        </div>
        </form>
    </div>
    </div>

   <!-- Modal Edit Admin -->
<div id="editAdminModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-5 sm:p-6 relative max-h-[90vh] overflow-y-auto">
        <button onclick="closeEditAdminModal()" class="absolute top-3 right-4 text-gray-400 hover:text-gray-600 text-2xl leading-none">&times;</button>
        <h2 class="text-lg sm:text-xl font-semibold mb-4 sm:mb-5 text-gray-700 pr-8">Edit Admin</h2>
        <form id="editAdminForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input 
                    type="text" 
                    name="username" 
                    id="editAdminUsername" 
                    required
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                >
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Panitia</label>
                <input 
                    type="text" 
                    name="nama_panitia" 
                    id="editAdminNamaPanitia" 
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                >
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="editAdminEmail" 
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                >
            </div>

            <div class="pt-4 flex flex-col-reverse sm:flex-row justify-end gap-2">
                <button 
                    type="button" 
                    onclick="closeEditAdminModal()" 
                    class="w-full sm:w-auto px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-all font-medium"
                >
                    Batal
                </button>
                <button 
                    type="submit" 
                    class="w-full sm:w-auto px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition-all font-medium shadow-sm hover:shadow-md"
                >
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
