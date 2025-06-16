@include('partials.header')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Daftar Pengiriman</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Daftar Pengiriman</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Daftar Pengiriman</h2>

      </div><!-- End Section Title -->

      <!-- Tambahkan di dalam container di bagian pengiriman -->
     <div class="container" data-aos="fade-up">

  <!-- Tombol Tambah Pengiriman -->
  <div class="d-flex justify-content-end mb-3">
    <a href="/form-pengiriman" class="btn btn-danger">
      <i class="bi bi-plus-circle me-1"></i> Tambah Pengiriman
    </a>
  </div>

  <!-- Tabel Daftar Pengiriman -->
  <div class="table-responsive">
    <table id="myTable" class="display">
      <thead>
        <tr>
          <th>ID</th>
          <th>Customer</th>
          <th>Truk</th>
          <th>Gudang</th>
          <th>Nama Penerima</th>
          <th>No HP</th>
          <th>Nama Barang</th>
          <th>Berat</th>
          <th>Volume</th>
          <th>Type</th>
          <th>Harga</th>
          <th>Tanggal Pengiriman</th>
          <th>Status</th>
          {{-- <th>Aksi</th> --}}
        </tr>
      </thead>
      <tbody>
        
        @foreach ($data as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->truk->nama_truk }}</td>
            <td>{{ $item->gudang->kode_tempat }}</td>
            <td>{{ $item->penerima }}</td>
            <td>{{ $item->nohp_penerima }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->berat . " kg" }}</td>
            <td>{!! $item->volume . " m<sup>3</sup>" !!}</td>
            <td>{{ $item->type }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->tgl_pengiriman }}</td>
            <td>{{ $item->status_pengiriman }}</td>
            
            
          </tr>
        @endforeach
        {{-- @foreach ($pengiriman as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->customer->nama }}</td>
            ...
          </tr>
        @endforeach --}}
      </tbody>
    </table>
  </div>

</div>



    </section><!-- /Starter Section Section -->

  </main>
@include('partials.footer')
<script>
let table = new DataTable('#myTable');

</script>