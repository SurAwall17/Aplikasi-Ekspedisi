@include('partials.header')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Pengiriman</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Pengiriman</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tambah Pengiriman</h2>
        <p><span>Masukkan informasi pengiriman</span></p>

      </div><!-- End Section Title -->

      <!-- Tambahkan di dalam container di bagian pengiriman -->
      <div class="container" data-aos="fade-up">
        <form>
          <div class="row g-3">

            <!-- Costumer -->
            <div class="col-md-4">
              <label for="customer" class="form-label">Customer</label>
              <select id="customer" class="form-select">
                <option selected>Pilih Customer</option>
                <option>Customer 1</option>
                <option>Customer 2</option>
              </select>
            </div>

            <!-- Truk -->
            <div class="col-md-4">
              <label for="truck" class="form-label">Truk</label>
              <select id="truck" class="form-select">
                <option selected>Pilih Truk</option>
                <option>Truk 1</option>
                <option>Truk 2</option>
              </select>
            </div>

            <!-- Gudang -->
            <div class="col-md-4">
              <label for="warehouse" class="form-label">Gudang</label>
              <select id="warehouse" class="form-select">
                <option selected>Pilih Gudang</option>
                <option>Gudang 1</option>
                <option>Gudang 2</option>
              </select>
            </div>

            <!-- Nama Penerima -->
            <div class="col-md-6">
              <label for="namaPenerima" class="form-label">Nama Penerima</label>
              <input type="text" class="form-control" id="namaPenerima" placeholder="Masukkan nama penerima">
            </div>

            <!-- No HP Penerima -->
            <div class="col-md-6">
              <label for="noHpPenerima" class="form-label">No HP Penerima</label>
              <input type="text" class="form-control" id="noHpPenerima" placeholder="08xxxx">
            </div>

            <!-- Nama Barang -->
            <div class="col-md-6">
              <label for="namaBarang" class="form-label">Nama Barang</label>
              <input type="text" class="form-control" id="namaBarang">
            </div>

            <!-- Berat -->
            <div class="col-md-6">
              <label for="berat" class="form-label">Berat (kg)</label>
              <input type="number" class="form-control" id="berat">
            </div>

            <!-- Dimensi -->
            <div class="col-md-3">
              <label for="panjang" class="form-label">Panjang (cm)</label>
              <input type="number" class="form-control" id="panjang">
            </div>
            <div class="col-md-3">
              <label for="lebar" class="form-label">Lebar (cm)</label>
              <input type="number" class="form-control" id="lebar">
            </div>
            <div class="col-md-3">
              <label for="tinggi" class="form-label">Tinggi (cm)</label>
              <input type="number" class="form-control" id="tinggi">
            </div>
            <div class="col-md-3">
              <label for="volume" class="form-label">Volume (m³)</label>
              <input type="number" class="form-control" id="volume" step="0.01">
            </div>

            <!-- Type -->
            <div class="col-md-6">
              <label for="type" class="form-label">Type</label>
              <select id="type" class="form-select">
                <option selected>Pilih Tipe</option>
                <option>Reguler</option>
                <option>Ekspres</option>
              </select>
            </div>

            <!-- Harga -->
            <div class="col-md-6">
              <label for="harga" class="form-label">Harga (Rp)</label>
              <input type="number" class="form-control" id="harga">
            </div>

            <!-- Tanggal Pengiriman -->
            <div class="col-md-6">
              <label for="tglPengiriman" class="form-label">Tanggal Pengiriman</label>
              <input type="date" class="form-control" id="tglPengiriman">
            </div>

            <!-- Status Pengiriman -->
            <div class="col-md-6">
              <label for="statusPengiriman" class="form-label">Status Pengiriman</label>
              <select id="statusPengiriman" class="form-select">
                <option selected>Pilih Status</option>
                <option>Menunggu</option>
                <option>Dalam Perjalanan</option>
                <option>Terkirim</option>
              </select>
            </div>

            <!-- Submit Button -->
            <div class="col-12">
              <button type="submit" class="btn btn-danger"><i class="bi bi-floppy"></i> Submit</button>
            </div>

          </div>
        </form>
      </div>


    </section><!-- /Starter Section Section -->

  </main>
@include('partials.footer')