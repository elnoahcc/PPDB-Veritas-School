<!-- About Section with Image -->
<section id="about" class="py-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center md:items-start gap-12">
    
    <!-- Image -->
    <div class="md:w-1/2">
      <img src="{{ asset('image/icon/icon-with-text.png') }}" alt="Sekolah Elite" class=" w-full object-cover">
    </div>

    <!-- Text Content -->
    <div class="md:w-1/2">
      <h2 class="text-5xl font-dmserif font-bold text-blue-700 text-ellipsis mb-4"><span class="italic">About </span><span class="font-gabarito">Veritas School</span></h2>
      <p class="font-hubot text-lg text-gray-600 mb-8">
        Kami adalah institusi pendidikan unggulan yang berkomitmen membentuk generasi masa depan yang cerdas, berkarakter, dan inovatif. Dengan kurikulum berbasis kompetensi global, fasilitas modern, serta pengajar berkualitas internasional, kami mendorong setiap siswa untuk mengeksplorasi potensi maksimal mereka dalam lingkungan belajar yang inspiratif dan mendukung.
      </p>

      <!-- Photo Collage -->
      <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
        <div class="overflow-hidden rounded-xl">
          <img src="{{ asset('image/landing/teacher-write.png') }}" alt="Foto 1" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
        </div>
        <div class="overflow-hidden rounded-xl">
          <img src="{{ asset('image/landing/teacher-with-student.png') }}" alt="Foto 2" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
        </div>
        <div class="overflow-hidden rounded-xl">
          <img src="{{ asset('image/landing/student-with-student-study.png') }}" alt="Foto 3" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
        </div>
        <div class="overflow-hidden rounded-xl">
          <img src="{{ asset('image/landing/two-student-smile.png') }}" alt="Foto 4" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
        </div>
        <div class="overflow-hidden rounded-xl">
          <img src="{{ asset('image/landing/student-jump-happy.png') }}" alt="Foto 5" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
        </div>
        <div class="overflow-hidden rounded-xl">
          <img src="{{ asset('image/landing/student-with-computer.png') }}" alt="Foto 6" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
        </div>
      </div>
      <!-- End Photo Collage -->

    </div>

  </div>
</section>
