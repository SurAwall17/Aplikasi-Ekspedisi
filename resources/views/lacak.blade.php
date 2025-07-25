@include('partials.header')

<main class="main">
    <div class="container mt-4">
        <h3>Lokasi barang saat ini</h3>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Gudang: {{ $gudang->kode_tempat }}</h5>
                <p><strong>Alamat:</strong> {{ $gudang->alamat }}</p>
            </div>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</main>

@include('partials.footer')
