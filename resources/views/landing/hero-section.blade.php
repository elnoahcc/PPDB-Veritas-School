<section id="hero" 
    class="min-h-screen flex flex-col md:flex-row items-center justify-center 
           px-6 md:px-12 md:gap-12 mt-24 md:mt-0">
           
  <!-- 📝 Teks -->
  <div class="flex-1 text-center md:text-left space-y-6 md:pr-4 max-w-lg md:items-start flex flex-col
              order-2 md:order-1">
    <h1 class="font-gabarito text-4xl md:text-6xl font-extrabold text-blue-700 leading-tight">
      Nurturing Well-rounded<br>
      <span class="font-dmserif italic">Changemakers Today</span>
    </h1>

    <p class="text-gray-600 text-lg md:text-xl max-w-md font-hubot">
      Sekolah unggulan yang membentuk generasi pemimpin masa depan melalui pendidikan karakter, inovasi, dan empati.
    </p>

    <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0 justify-center md:justify-start">
      @guest
          <a href="/register" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-hubot font-bold hover:bg-blue-700 transition">
              Daftar Sekarang
          </a>
      @endguest

      @auth
          @if(Auth::user()->role === 'ADMIN')
              <a href="{{ url('admin/dashboard') }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-hubot font-bold hover:bg-blue-700 transition">
                  Dashboard
              </a>
          @elseif(Auth::user()->role === 'PENDAFTAR')
              <a href="{{ url('pendaftar/dashboard') }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-hubot font-bold hover:bg-blue-700 transition">
                  Dashboard
              </a>
          @endif
      @endauth

      <a href="#about" class="border border-blue-600 text-blue-600 px-8 py-3 rounded-lg font-hubot font-bold hover:bg-blue-50 transition">
          Lihat Selengkapnya
      </a>
    </div>
  </div>

  <!-- 🖼️ Gambar -->
  <div class="flex-1 mt-10 md:mt-0 flex justify-center max-w-md relative
              order-1 md:order-2">
    <img src="{{ asset('image/landing/hero-person.png') }}" alt="Sekolah Unggulan" 
         class="w-2/3 md:w-full object-contain">

    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-white to-transparent"></div>
  </div>

</section>
