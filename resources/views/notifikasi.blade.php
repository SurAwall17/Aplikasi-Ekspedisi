@include('partials.header')

  <main class="main">

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
          {{-- @foreach ($pengiriman as $item)
            @if($item->status == 'Dalam Perjalanan') --}}
              <div class="col-12">
                <div class="alert alert-info d-flex align-items-center" role="alert">
                  <i class="bi bi-truck me-2"></i>
                  <div>
                    Barang dengan ID <strong>19818 {{-- {{ $item->id }} --}}</strong> sedang dalam perjalanan ke Tujuan.
                  </div>
                </div>
              </div>
            {{-- @elseif($item->status == 'Sudah Sampai')
              <div class="col-12">
                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <i class="bi bi-check-circle me-2"></i>
                  <div>
                    Barang dengan ID <strong>#{{ $item->id }}</strong> telah sampai di tujuan.
                  </div>
                </div>
              </div>
            @endif
          @endforeach --}}
        </div>
      </div>



    </section><!-- /Starter Section Section -->

  </main>
@include('partials.footer')