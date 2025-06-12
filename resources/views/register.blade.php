<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - XPEDISI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="card shadow w-100" style="max-width: 700px;">
      <div class="card-body p-4">
        <div class="text-center mb-4">
          <img src="{{ asset('images/logo.png') }}" alt="XPEDISI Logo" class="img-fluid" style="max-height: 50px;">
          <h4 class="mt-3">Create an Account</h4>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </ul>
        </div>
      @endif

        <form method="POST" action="/register">
          @csrf
          <div class="row">
            <!-- Full Name -->
            <div class="col-md-6 mb-3">
              <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter full name" value="{{ old('name') }}">
              </div>
            </div>

            <!-- Email -->
            <div class="col-md-6 mb-3">
              <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ old('email') }}">
              </div>
            </div>

            <!-- Address -->
            <div class="col-md-6 mb-3">
              <label for="alamat" class="form-label">Address</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                <textarea class="form-control" name="alamat" id="alamat" rows="1" placeholder="Enter address">{{ old('alamat') }}</textarea>
              </div>
            </div>
            
            <!-- Phone Number -->
            <div class="col-md-6 mb-3">
              <label for="no_telepon" class="form-label">Phone Number</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                <input type="tel" name="no_telepon" class="form-control" id="no_telepon" placeholder="08xxxxxxxxxx" value="{{ old('no_telepon') }}">
              </div>
            </div>
            
            <!-- Password -->
            <div class="col-md-6 mb-3">
              <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
              </div>
            </div>

            <!-- Retype Password -->
            <div class="col-md-6 mb-3">
              <label for="retype-password" class="form-label">Retype Password <span class="text-danger">*</span></label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="password" name="password_confirmation" class="form-control" id="retype-password" placeholder="Retype password">
              </div>
            </div>

            
          </div>

          <!-- Submit -->
          <button type="submit" class="btn btn-danger w-100">Register</button>
        </form>
      </div>
    </div>
  </div>

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
