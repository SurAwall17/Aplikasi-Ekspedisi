
  <footer id="footer" class="footer">

  <!-- Newsletter Section -->
  {{-- <div class="footer-newsletter">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-6">
          <h4>Berlangganan Info Pengiriman</h4>
          <p>Daftarkan email Anda untuk mendapatkan info promo dan layanan terbaru dari Xpedisi Fajar Bone.</p>
          <form action="#" method="post" class="php-email-form">
            <div class="newsletter-form">
              <input type="email" name="email" placeholder="Masukkan email Anda">
              <input type="submit" value="Langganan">
            </div>
            <div class="loading">Memuat...</div>
            <div class="error-message"></div>
            <div class="sent-message">Pendaftaran berhasil. Terima kasih!</div>
          </form>
        </div>
      </div>
    </div>
  </div> --}}

  <!-- Footer Top -->
  <div class="container footer-top">
    <div class="row gy-4">

      <div class="col-lg-4 col-md-6 footer-about">
        <a href="/" class="d-flex align-items-center">
          <span class="sitename">Xpedisi Fajar Bone</span>
        </a>
        <div class="footer-contact pt-3">
          <p>Jl.Cakalang No.30</p>
          <p>Kota Makassar, Sulawesi Selatan</p>
          <p class="mt-3"><strong>Telepon:</strong> <span>0822-1234-5678</span></p>
          <p><strong>Email:</strong> <span>info@xpedisifajarbone.com</span></p>
        </div>
      </div>

      <div class="col-lg-2 col-md-3 footer-links">
        <h4>Menu Utama</h4>
        <ul>
          <li><i class="bi bi-chevron-right"></i> <a href="#">Beranda</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#about">Tentang Kami</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#services">Layanan</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#faq">FAQ</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-3 footer-links">
        <h4>Layanan Ekspedisi</h4>
        <ul>
          <li><i class="bi bi-chevron-right"></i> <a href="#">Pengiriman Reguler</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#">Pengiriman Ekspres</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#">Lacak Paket</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#">Cek Tarif</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-12">
        <h4>Ikuti Kami</h4>
        <p>Dapatkan informasi terbaru dan promo menarik di media sosial kami.</p>
        <div class="social-links d-flex">
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>

    </div>
  </div>

  <!-- Footer Copyright -->
  <div class="container copyright text-center mt-4">
    <p>© <strong class="sitename">Xpedisi Fajar Bone</strong> - Seluruh Hak Dilindungi.</p>
    <div class="credits">
      Dikembangkan oleh Tim IT Xpedisi Fajar Bone | Template by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
</footer>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  {{-- Data Table JQuery --}}
  <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
  <script>
    	
  let table = new DataTable('#myTable');
  </script>
</body>


</html>