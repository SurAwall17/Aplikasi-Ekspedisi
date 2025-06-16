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
        <form method="POST" action="/tambah-pengiriman">
          @csrf
          <div class="row g-3">

            <!-- Costumer -->
            <div class="col-md-4">
              <label for="customer" class="form-label">Nama Pengirim</label>
              <input type="text" hidden name="user_id" readonly value="{{ Auth()->user()->id }}" class="form-control" id="namaPengirim" placeholder="Masukkan nama pengirim">

              <input type="text" readonly value="{{ Auth()->user()->name }}" class="form-control" id="namaPengirim" placeholder="Masukkan nama pengirim">
              
            </div>

            <!-- Truk -->
            <div class="col-md-4">
              <label for="truck" class="form-label">Truk</label>
              <select id="truck" name="truk_id" class="form-select">
                <option selected>Pilih Truk</option>
                 @foreach ($truk as $item)
                  <option value="{{ $item->id }}">{{ $item->nama_truk }}</option>
                @endforeach
              </select>
            </div>

            <!-- Gudang -->
            <div class="col-md-4">
              <label for="warehouse" class="form-label">Gudang</label>
              <select id="warehouse" name="gudang_id" class="form-select">
                <option selected>Pilih Gudang</option>
                @foreach ($gudang as $item)
                  <option value="{{ $item->id }}">{{ $item->kode_tempat }}</option>
                @endforeach
              </select>
            </div>

            <!-- Nama Penerima -->
            <div class="col-md-6">
              <label for="namaPenerima" class="form-label">Nama Penerima</label>
              <input type="text" name="penerima" class="form-control" id="namaPenerima" placeholder="Masukkan nama penerima">
            </div>

            <!-- No HP Penerima -->
            <div class="col-md-6">
              <label for="noHpPenerima" class="form-label">No HP Penerima</label>
              <input type="text" name="nohp_penerima" class="form-control" id="noHpPenerima" placeholder="08xxxx">
            </div>

            <!-- Nama Barang -->
            <div class="col-md-6">
              <label for="namaBarang" class="form-label">Nama Barang</label>
              <input type="text" name="nama_barang" class="form-control" id="namaBarang">
            </div>

            <!-- Berat -->
            <div class="col-md-6">
              <label for="berat" 
             class="form-label">Berat (kg)</label>
              <input type="number" name="berat" class="form-control" id="berat">
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
              <input type="number" name="volume" readonly class="form-control" id="volume" step="0.01">
            </div>

            <!-- Type -->
            <div class="col-md-6">
              <label for="type" class="form-label">Type</label>
              <select id="type" name="type" class="form-select">
                <option selected>Pilih Tipe</option>
                <option value="Reguler">Reguler</option>
                <option value="Ekspres">Ekspres</option>
              </select>
            </div>

            <!-- Harga -->
            <div class="col-md-6">
              <label for="harga" class="form-label">Harga (Rp)</label>
              <input type="number" name="harga" class="form-control" id="harga">
            </div>

            <!-- Tanggal Pengiriman -->
            <div class="col-md-6">
              <label for="tglPengiriman" class="form-label">Tanggal Pengiriman</label>
              <input type="date" name="tgl_pengiriman" class="form-control" id="tglPengiriman">
            </div>

            <!-- Status Pengiriman -->
            <div class="col-md-6">
              <label for="statusPengiriman" class="form-label">Status Pengiriman</label>
              <select id="statusPengiriman" name="status_pengiriman" class="form-select">
                <option selected>Pilih Status</option>
                <option value="Menunggu">Menunggu</option>
                <option value="Dalam Perjalanan">Dalam Perjalanan</option>
                <option value="Terkirim">Terkirim</option>
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

<script>
  const panjang = document.getElementById('panjang')
  const lebar = document.getElementById('lebar')
  const tinggi = document.getElementById('tinggi')
  const volume = document.getElementById('volume')

  function hitungVolume(){
    volume.value = (panjang.value * lebar.value * tinggi.value) / 4000
  }

  panjang.addEventListener('input', hitungVolume)
  lebar.addEventListener('input', hitungVolume)
  tinggi.addEventListener('input', hitungVolume)


  
</script>