
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