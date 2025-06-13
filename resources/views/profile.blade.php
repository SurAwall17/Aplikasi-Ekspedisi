@include('partials.header')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Profile</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Update Profile</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Profile</h2>

      </div><!-- End Section Title -->

      <!-- Tambahkan di dalam container di bagian pengiriman -->
    <div class="container" data-aos="fade-up">
      <form action="/profile/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Foto Profil dengan Ikon Edit -->
        <div class="mb-4 text-center">
          <div class="position-relative d-inline-block">
            <img id="previewImage" src="{{ Auth::user()->foto ? asset('storage/foto/' . Auth::user()->foto) : Avatar::create(Auth::user()->name)->toBase64() }}" alt="Foto Profil"
                class="rounded-circle border border-2" width="150" height="150" style="object-fit: cover;">

            <!-- Ikon Pensil -->
            <label for="foto"
                class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle d-flex justify-content-center align-items-center shadow"
                style="width: 36px; height: 36px; cursor: pointer;"
                title="Ubah Foto">
            <i class="bi bi-pencil-fill"></i>
          </label>


            <!-- Input file tersembunyi -->
            <input type="file" id="foto" name="foto" accept="image/*" class="d-none" onchange="previewFoto(this)">
          </div>
          <h2 class="mt-2 text-uppercase">{{ Auth()->user()->name }}</h2>
        </div>

        <!-- Nama -->
        <div class="mb-3">
          <label for="name" class="form-label">Nama Lengkap</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
            <input type="text" class="form-control" id="name" name="name"
                  value="{{ old('name', $user->name) }}" required>
          </div>
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
            <input type="email" class="form-control" id="email" name="email"
                  value="{{ old('email', $user->email) }}" required>
          </div>
        </div>

        <!-- Alamat -->
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $user->alamat) }}</textarea>
          </div>
        </div>

        <!-- No Telepon -->
        <div class="mb-3">
          <label for="no_telepon" class="form-label">No. Telepon</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
            <input type="tel" class="form-control" id="no_telepon" name="no_telepon"
                  value="{{ old('no_telepon', $user->no_telepon) }}" required>
          </div>
        </div>


        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-danger"><i class="bi bi-floppy"></i> Update Profil</button>
      </form>
    </div>




    </section><!-- /Starter Section Section -->

  </main>
@include('partials.footer')
<script>
  function previewFoto(input) {
    const file = input.files[0];
    const preview = document.getElementById('previewImage');

    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview.src = e.target.result;
      };
      reader.readAsDataURL(file);
    }
  }
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
