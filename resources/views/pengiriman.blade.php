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
          <th>No</th>
          <th>Resi</th>
          <th>Nama Pengirim</th>
          {{-- <th>Truk</th>
          <th>Gudang</th> --}}
          <th>Nama Penerima</th>
          <th>No HP</th>
          <th>Nama Barang</th>
          <th>Berat</th>
          <th>Volume</th>
          <th>Type</th>
          <th>Harga</th>
          <th>Tanggal Pengiriman</th>
          <th>Status</th>
          <th>Pembayaran</th>
          {{-- <th>Aksi</th> --}}
        </tr>
      </thead>
      <tbody>
        
        @foreach ($data as $item)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $item->resi }}</td>
            <td>{{ $item->user->name }}</td>
            {{-- <td>{{ $item->truk->nama_truk }}</td>
            <td>{{ $item->gudang->kode_tempat }}</td> --}}
            <td>{{ $item->penerima }}</td>
            <td>{{ $item->nohp_penerima }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->berat . " kg" }}</td>
            <td>{!! $item->volume . " m<sup>3</sup>" !!}</td>
            <td>{{ $item->type }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->tgl_pengiriman }}</td>
            <td>
              @if ($item->status_pengiriman === 'Menunggu')
                <span class="badge bg-warning text-dark">
                  <i class="bi bi-hourglass-split me-1"></i> Menunggu
                </span>
              @elseif ($item->status_pengiriman === 'Dalam Perjalanan')
                <span class="badge bg-primary">
                  <i class="bi bi-truck me-1"></i> Dalam Perjalanan
                </span>
              @elseif ($item->status_pengiriman === 'Telah Sampai')
                <span class="badge bg-success">
                  <i class="bi bi-check-circle me-1"></i> Terkirim
                </span>
              @else
                <span class="badge bg-secondary">
                  <i class="bi bi-question-circle me-1"></i> {{ $item->status_pengiriman }}
                </span>
              @endif
            </td>
            <td align="center">
              <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalBayar">
                <i class="bi bi-credit-card"></i> Bayar
              </button>
            </td>
            <!-- Modal Pembayaran -->
            <div class="modal fade" id="modalBayar" tabindex="-1" aria-labelledby="modalBayarLabel" aria-hidden="true">
              <div class="modal-dialog">
                <form action="/pembayaran" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalBayarLabel">Upload Bukti Pembayaran</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                      <div class="mb-3">
                        <label class="form-label">Informasi Rekening Tujuan:</label>
                        @foreach ($bank as $item)
                          <div class="d-flex align-items-center mb-2">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_bank }}" width="60" class="me-3 rounded shadow">
                            <div>
                              <strong>{{ $item->nama_bank }}</strong><br>
                              a.n. {{ $item->nama_pemilik }}<br>
                              No. Rek: {{ $item->no_rekening }}
                            </div>
                          </div>
                        @endforeach
                      </div>
                        
                        <input class="form-control" type="text" name="metode" value="Transfer" id="metode" hidden>
                      
                      <div class="mb-3">
                        <label for="bukti_bayar" class="form-label">Upload Bukti Pembayaran (JPG, PNG)</label>
                        <input class="form-control" type="file" name="bukti_bayar" id="bukti_bayar" accept="image/*" required>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Kirim</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>





            
            
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