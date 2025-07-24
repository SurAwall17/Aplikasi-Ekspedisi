@include('partials.header')

  <main class="main">
<style>
  .star {
    font-size: 1.8rem;
    color: #ddd;
    cursor: pointer;
}

.star.selected {
    color: #ffc107; /* Warna kuning bintang */
}

</style>
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Notifikasi</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Notifikasi</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Semua Notifikasi</h2>

      </div><!-- End Section Title -->

      <!-- Tambahkan di dalam container di bagian pengiriman -->
      <div class="container" data-aos="fade-up">
        <div class="row g-3">
          @foreach ($pengiriman as $item)
            @if($item->status_pengiriman == 'Dalam Perjalanan')
              <div class="col-12">
                <div class="alert alert-info alert-dismissible fade show d-flex align-items-center" role="alert">
                  <i class="bi bi-truck me-2"></i>
                  <div>
                    Barang dengan Resi <strong>{{ $item->resi }}</strong> sedang dalam perjalanan ke tujuan.
                  </div>
                  <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
            @elseif($item->status_pengiriman == 'Telah Sampai')
              <div class="col-12">
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center justify-content-between" role="alert">
        <div class="d-flex align-items-center">
            <i class="bi bi-check-circle me-2"></i>
            <div>
                Barang dengan Resi <strong>{{ $item->resi }}</strong> telah sampai di tujuan.
            </div>
        </div>

        <div class="d-flex align-items-center">
            <!-- Tombol Ulasan -->
            <button type="button" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#modalUlasan{{ $item->id }}">
                <i class="bi bi-pencil-square"></i> Ulasan
            </button>

            <!-- Tombol Close -->
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>


            @endif
            <div class="modal fade" id="modalUlasan{{ $item->id }}" tabindex="-1" aria-labelledby="modalUlasanLabel{{ $item->id }}" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="modalUlasanLabel{{ $item->id }}">Beri Ulasan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body text-center">
                          
                          <!-- Rating Bintang -->
                          <div class="mb-3">
                              <div class="rating" id="rating-{{ $item->id }}">
                                  @for ($i = 1; $i <= 5; $i++)
                                      <i class="bi bi-star star" data-value="{{ $i }}"></i>
                                  @endfor
                              </div>
                          </div>

                          <!-- Textarea Ulasan -->
                          <div class="mb-3">
                              <textarea class="form-control" rows="3" placeholder="Tulis ulasan Anda..." id="ulasan-{{ $item->id }}"></textarea>
                          </div>
                          
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                          <button type="button" class="btn btn-primary" onclick="kirimUlasan({{ $item->id }})">Kirim</button>
                      </div>
                  </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>




    </section><!-- /Starter Section Section -->

  </main>
  <script>
      document.addEventListener("DOMContentLoaded", function () {
          document.querySelectorAll('.rating').forEach(ratingEl => {
              const stars = ratingEl.querySelectorAll('.star');
              stars.forEach(star => {
                  star.addEventListener('click', function () {
                      const value = this.getAttribute('data-value');
                      stars.forEach(s => {
                          s.classList.toggle('selected', s.getAttribute('data-value') <= value);
                      });
                      ratingEl.setAttribute('data-selected', value);
                  });
              });
          });
      });

      function kirimUlasan(id) {
          const rating = document.getElementById('rating-' + id).getAttribute('data-selected') || 0;
          const ulasan = document.getElementById('ulasan-' + id).value;

          if (rating == 0) {
              alert("Silakan pilih rating!");
              return;
          }

          if (ulasan.trim() === "") {
              alert("Silakan tulis ulasan Anda!");
              return;
          }

          fetch("{{ route('ulasan.store') }}", {
              method: "POST",
              headers: {
                  "Content-Type": "application/json",
                  "X-CSRF-TOKEN": "{{ csrf_token() }}"
              },
              body: JSON.stringify({
                  pengiriman_id: id,
                  rating: rating,
                  komentar: ulasan
              })
          })
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  alert("Terima kasih atas ulasannya!");
                  location.reload(); // reload halaman setelah berhasil
              } else {
                  alert("Gagal menyimpan ulasan!");
              }
          })
          .catch(error => {
              console.error("Error:", error);
              alert("Terjadi kesalahan!");
          });
      }

</script>

@include('partials.footer')