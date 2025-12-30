<!-- Footer Section -->
<footer class="font-hubot bg-gray-900 text-gray-200 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-8">
            <!-- Logo & Deskripsi -->
            <div class="md:w-1/4">
                <img src="{{ asset('image/icon/icon.png') }}" alt="Logo Sekolah" class="w-24 h-auto mb-4">
                <p class="text-gray-400">
                    Veritas School adalah sekolah yang berfokus pada pengembangan akademik, karakter, dan kreativitas siswa.
                </p>
            </div>

            <!-- Navigation -->
            <div class="md:w-1/4">
                <h3 class="font-bold text-gray-100 mb-4">Menu</h3>
                <ul class="space-y-2">
                    <li><a href="#home" class="hover:text-white transition">Home</a></li>
                    <li><a href="#about" class="hover:text-white transition">Tentang</a></li>
                    <li><a href="#alur" class="hover:text-white transition">Alur Pendaftaran</a></li>
                    <li><a href="#testimoni" class="hover:text-white transition">Testimoni</a></li>
                    <li><a href="#contact" class="hover:text-white transition">Kontak</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="md:w-1/4">
                <h3 class="font-bold text-gray-100 mb-4">Kontak</h3>
                <ul class="space-y-2 text-gray-400">
                    <li>Jl. Contoh No. 123, Jakarta</li>
                    <li>+62 812 3456 7890</li>
                    <li>info@veritas.sch.id</li>
                </ul>
            </div>

            <!-- Sosial Media -->
            <div class="md:w-1/4">
                <h3 class="font-bold text-gray-100 mb-4">Ikuti Kami</h3>
                <div class="flex space-x-4">
                    <a href="#" aria-label="Instagram">
                        <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram" class="w-6 h-6 hover:opacity-80 transition">
                    </a>
                    <a href="#" aria-label="Facebook">
                        <img src="https://cdn-icons-png.flaticon.com/512/145/145802.png" alt="Facebook" class="w-6 h-6 hover:opacity-80 transition">
                    </a>
                    <a href="#" aria-label="LinkedIn">
                        <img src="https://cdn-icons-png.flaticon.com/512/145/145807.png" alt="LinkedIn" class="w-6 h-6 hover:opacity-80 transition">
                    </a>
                </div>
            </div>
        </div>

        <div class="font-hubot mt-12 border-t border-gray-800 pt-6 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Veritas School. All rights reserved.
        </div>
    </div>
</footer>
