<!-- Testimoni Section -->
<section id="testimoni" class="py-20 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="font-dmserif text-5xl font-bold text-blue-600 mb-4"><span class="italic">Testimoni </span><span class="font-gabarito" >Alumni & Orang Tua</span></h2>
            <p class="text-xl font-hubot text-gray-600">Dengar pengalaman mereka yang telah bergabung</p>
        </div>

        <!-- Container auto-scroll dengan gradient -->
        <div class="relative overflow-hidden">
            <!-- Gradient di kiri & kanan -->
            <div class="absolute left-0 top-0 h-full w-16 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none"></div>
            <div class="absolute right-0 top-0 h-full w-16 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none"></div>

            <!-- Wrapper scroll -->
            <div class="flex font-hubot space-x-6 animate-scroll">
                <!-- Testimoni 1 -->
                <div class="flex-none bg-gradient-to-br from-blue-50 to-white rounded-2xl p-8 shadow-lg w-80">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Ahmad Fauzi" class="w-12 h-12 rounded-full object-cover">
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-900">Ahmad Fauzi</h4>
                            <p class="text-gray-600 text-sm">Alumni 2023 - UI</p>
                        </div>
                    </div>
                    <div class="text-yellow-500 mb-4">★★★★★</div>
                    <p class="text-gray-700 italic">
                        "Sekolah ini benar-benar mempersiapkan saya untuk dunia perkuliahan..."
                    </p>
                </div>

                <!-- Testimoni 2 -->
                <div class="flex-none bg-gradient-to-br from-blue-50 to-white rounded-2xl p-8 shadow-lg w-80">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Siti Nurhaliza" class="w-12 h-12 rounded-full object-cover">
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-900">Siti Nurhaliza</h4>
                            <p class="text-gray-600 text-sm">Orang Tua Siswa</p>
                        </div>
                    </div>
                    <div class="text-yellow-500 mb-4">★★★★★</div>
                    <p class="text-gray-700 italic">
                        "Sebagai orang tua, saya sangat puas dengan perkembangan anak saya..."
                    </p>
                </div>

                <!-- Testimoni 3 -->
                <div class="flex-none bg-gradient-to-br from-blue-50 to-white rounded-2xl p-8 shadow-lg w-80">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/56.jpg" alt="Budi Santoso" class="w-12 h-12 rounded-full object-cover">
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-900">Budi Santoso</h4>
                            <p class="text-gray-600 text-sm">Alumni 2022 - ITB</p>
                        </div>
                    </div>
                    <div class="text-yellow-500 mb-4">★★★★★</div>
                    <p class="text-gray-700 italic">
                        "Pengalaman belajar yang luar biasa, guru-gurunya sangat mendukung..."
                    </p>
                </div>

                <!-- Testimoni 4 -->
                <div class="flex-none bg-gradient-to-br from-blue-50 to-white rounded-2xl p-8 shadow-lg w-80">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/67.jpg" alt="Mira Lestari" class="w-12 h-12 rounded-full object-cover">
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-900">Mira Lestari</h4>
                            <p class="text-gray-600 text-sm">Orang Tua Siswa</p>
                        </div>
                    </div>
                    <div class="text-yellow-500 mb-4">★★★★★</div>
                    <p class="text-gray-700 italic">
                        "Sekolah ini membuat anak saya lebih percaya diri dan berprestasi..."
                    </p>
                </div>

                <!-- Testimoni 5 -->
                <div class="flex-none bg-gradient-to-br from-blue-50 to-white rounded-2xl p-8 shadow-lg w-80">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/78.jpg" alt="Riko Pratama" class="w-12 h-12 rounded-full object-cover">
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-900">Riko Pratama</h4>
                            <p class="text-gray-600 text-sm">Alumni 2021 - ITB</p>
                        </div>
                    </div>
                    <div class="text-yellow-500 mb-4">★★★★★</div>
                    <p class="text-gray-700 italic">
                        "Materi dan bimbingan yang diberikan mempermudah saya meraih target kuliah..."
                    </p>
                </div>

                <!-- Testimoni 6 -->
                <div class="flex-none bg-gradient-to-br from-blue-50 to-white rounded-2xl p-8 shadow-lg w-80">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/88.jpg" alt="Dewi Anggraini" class="w-12 h-12 rounded-full object-cover">
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-900">Dewi Anggraini</h4>
                            <p class="text-gray-600 text-sm">Orang Tua Siswa</p>
                        </div>
                    </div>
                    <div class="text-yellow-500 mb-4">★★★★★</div>
                    <p class="text-gray-700 italic">
                        "Sangat merekomendasikan sekolah ini, anak saya berkembang pesat dalam akademik..."
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Auto scroll horizontal */
@keyframes scroll {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

.animate-scroll {
  display: flex;
  gap: 1.5rem;
  animation: scroll 30s linear infinite;
}
</style>
