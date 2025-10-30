<section class="bg-white py-12">
  <div class="container mx-auto px-6">
    <div class="text-center mb-10">
      <h2 class="text-5xl font-bold font-gabarito text-blue-600"><span class="font-dmserif">Berita Terbaru </span>Veritas School</h2>
      <p class="text-gray-600 mt-2 font-hubot">Pantau terus informasi dan kegiatan terbaru di Veritas School</p>
    </div>

    <div id="news-grid" class="grid md:grid-cols-3 gap-8">
      <!-- News Item 1 -->
      <div class="news-item cursor-pointer bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300" data-index="0">
        <img src="https://images.pexels.com/photos/4145193/pexels-photo-4145193.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Berita 1" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-2 font-gabarito">Kegiatan Ekstrakurikuler Baru</h3>
          <p class="text-gray-600 text-sm mb-4 font-hubot">Siswa Veritas School mengikuti berbagai ekstrakurikuler untuk mengembangkan bakat dan kreativitas.</p>
        </div>
      </div>

      <!-- News Item 2 -->
      <div class="news-item cursor-pointer bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300" data-index="1">
        <img src="https://images.pexels.com/photos/4145793/pexels-photo-4145793.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Berita 2" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-2 font-gabarito">Pentas Seni Tahunan</h3>
          <p class="text-gray-600 text-sm mb-4 font-hubot">Siswa menampilkan karya seni mereka dalam acara pentas seni tahunan Veritas School.</p>
        </div>
      </div>

      <!-- News Item 3 -->
      <div class="news-item cursor-pointer bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300" data-index="2">
        <img src="https://images.pexels.com/photos/4145232/pexels-photo-4145232.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Berita 3" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-2 font-gabarito">Workshop Pendidikan Digital</h3>
          <p class="text-gray-600 text-sm mb-4 font-hubot">Guru dan siswa belajar teknologi terbaru dalam workshop pendidikan digital untuk inovasi belajar.</p>
        </div>
      </div>

      <!-- News Item 4 -->
      <div class="news-item cursor-pointer hidden bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300" data-index="3">
        <img src="https://images.pexels.com/photos/4145197/pexels-photo-4145197.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Berita 4" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-2 font-gabarito">Lomba Sains Antar Kelas</h3>
          <p class="text-gray-600 text-sm mb-4 font-hubot">Siswa menunjukkan kemampuan mereka dalam lomba sains antar kelas yang seru dan edukatif.</p>
        </div>
      </div>

      <!-- News Item 5 -->
      <div class="news-item cursor-pointer hidden bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300" data-index="4">
        <img src="https://images.pexels.com/photos/4145199/pexels-photo-4145199.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Berita 5" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-2 font-gabarito">Kunjungan Edukasi</h3>
          <p class="text-gray-600 text-sm mb-4 font-hubot">Siswa melakukan kunjungan edukasi ke museum untuk memperluas wawasan dan pengalaman belajar.</p>
        </div>
      </div>
    </div>

    <div class="text-center mt-8">
      <button id="show-more" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300 font-hubot">
        Lihat Selengkapnya
      </button>
    </div>
  </div>
</section>

<!-- Modal -->
<div id="news-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white rounded-xl max-w-xl w-full overflow-hidden relative">
    <button id="modal-close" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-2xl font-bold">&times;</button>
    <img id="modal-img" src="" alt="Berita" class="w-full h-64 object-cover">
    <div class="p-6">
      <h3 id="modal-title" class="font-gabarito text-2xl font-semibold mb-3"></h3>
      <p id="modal-desc" class="font-hubot text-gray-700 mb-6"></p>
      <div class="flex justify-between">
        <button id="prev-btn" class="font-hubot px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Sebelumnya</button>
        <button id="next-btn" class="font-hubot px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Selanjutnya</button>
      </div>
    </div>
  </div>
</div>

<script>
const showMoreBtn = document.getElementById('show-more');
const hiddenNews = document.querySelectorAll('.news-item.hidden');
const newsItems = document.querySelectorAll('.news-item');
const modal = document.getElementById('news-modal');
const modalImg = document.getElementById('modal-img');
const modalTitle = document.getElementById('modal-title');
const modalDesc = document.getElementById('modal-desc');
const modalClose = document.getElementById('modal-close');
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');

let currentIndex = 0;

// Show hidden news
showMoreBtn.addEventListener('click', () => {
  hiddenNews.forEach(item => item.classList.remove('hidden'));
  showMoreBtn.style.display = 'none';
});

// Open modal
newsItems.forEach(item => {
  item.addEventListener('click', () => {
    currentIndex = parseInt(item.dataset.index);
    openModal(currentIndex);
  });
});

function openModal(index){
  const item = newsItems[index];
  modalImg.src = item.querySelector('img').src;
  modalTitle.textContent = item.querySelector('h3').textContent;
  modalDesc.textContent = item.querySelector('p').textContent;
  modal.classList.remove('hidden');
  modal.classList.add('flex');
}

// Close modal
modalClose.addEventListener('click', () => {
  modal.classList.remove('flex');
  modal.classList.add('hidden');
});

// Navigate
prevBtn.addEventListener('click', () => {
  currentIndex = (currentIndex - 1 + newsItems.length) % newsItems.length;
  openModal(currentIndex);
});
nextBtn.addEventListener('click', () => {
  currentIndex = (currentIndex + 1) % newsItems.length;
  openModal(currentIndex);
});
</script>
