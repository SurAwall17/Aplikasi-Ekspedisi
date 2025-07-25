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
    @php $i = 1; @endphp

<table id="myTable" class="display table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Resi</th>
            <th>Nama Pengirim</th>
            <th>Nama Penerima</th>
            <th>No HP</th>
            <th>Nama Barang</th>
            <th>Berat</th>
            <th>Volume</th>
            <th>Type</th>
            <th>Harga</th>
            <th>Tanggal Pengiriman</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->resi }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->penerima }}</td>
                <td>{{ $item->nohp_penerima }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td><span class="badge bg-secondary">{{ $item->berat }} kg</span></td>
                <td><span class="badge bg-secondary">{!! $item->volume !!} m<sup>3</sup></span></td>
                <td>{{ $item->type }}</td>
                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>{{ $item->tgl_pengiriman }}</td>
                <td>
                    @if ($item->status_pengiriman === 'Menunggu Pembayaran')
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalBayar{{ $item->id }}">
                            <i class="bi bi-credit-card"></i> Bayar
                        </button>
                    @elseif ($item->status_pengiriman === 'Menunggu Konfirmasi')
                        <span class="badge bg-primary"><i class="bi bi-hourglass-split me-1"></i> Menunggu Konfirmasi</span>
                    @elseif ($item->status_pengiriman === 'Sedang Diproses')
                        <span class="badge bg-warning text-dark"><i class="bi bi-clock me-1"></i> Sedang Diproses</span>
                    @elseif ($item->status_pengiriman === 'Dalam Perjalanan')
                        <span class="badge bg-info text-dark"><i class="bi bi-truck me-1"></i> Dalam Perjalanan</span>
                    @elseif ($item->status_pengiriman === 'Telah Sampai')
                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Terkirim</span>
                    @else
                        <span class="badge bg-secondary"><i class="bi bi-question-circle me-1"></i> {{ $item->status_pengiriman }}</span>
                    @endif
                </td>
                <td>
                <a href="/lacak-barang/{{ $item->gudang_id }}" class="btn btn-info btn-sm">
                    <i class="bi bi-geo-alt"></i> Lacak
                </a>
            </td>
            </tr>

            <!-- Modal Pembayaran -->
            <div class="modal fade" id="modalBayar{{ $item->id }}" tabindex="-1" aria-labelledby="modalBayarLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="/pembayaran/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalBayarLabel{{ $item->id }}">Upload Bukti Pembayaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Informasi Rekening Tujuan:</label>
                                    @foreach ($bank as $b)
                                        <div class="d-flex align-items-center mb-2">
                                            <img src="{{ asset('storage/' . $b->gambar) }}" alt="{{ $b->nama_bank }}" width="60" class="me-3 rounded shadow">
                                            <div>
                                                <strong>{{ $b->nama_bank }}</strong><br>
                                                a.n. {{ $b->nama_pemilik }}<br>
                                                No. Rek: {{ $b->no_rekening }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <input type="hidden" name="metode" value="Transfer">

                                <div class="mb-3">
                                    <label for="bukti_bayar{{ $item->id }}" class="form-label">Upload Bukti Pembayaran</label>
                                    <input class="form-control" type="file" name="bukti_bayar" id="bukti_bayar{{ $item->id }}" accept="image/*" required>
                                    <input type="text" hidden name="pengiriman_id" value="{{ $item->id }}">
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
        @endforeach
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