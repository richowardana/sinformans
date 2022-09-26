<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $title }}</title>
    <meta name="robots" content="noindex, nofollow">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="{{ asset('admin/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('admin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/simple-datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ asset('admin/assets/img/logo.png') }}" alt="">
                                    <span class="d-none d-lg-block">Sinforman</span>
                                </a>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4">
                                        <h5 class="card-title text-center pb-0 fs-4">Register akun</h5>
                                        <p class="text-center small">
                                            Lengkapi form dibawah untuk register
                                        </p>
                                    </div>
                                    <form class="row g-1" method="POST" action="/register">
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Nama</label>
                                            <input type="text" name="name" class="form-control 
                                            @error('name')
                                                is-invalid
                                            @enderror" id="yourName" value="{{ old('name') }}" required>
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control 
                                            @error('email')
                                                is-invalid
                                            @enderror" id=" yourEmail" value="{{ old('email') }}" required>
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Nama pengguna</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="username" class="form-control 
                                                @error('username')
                                                    is-invalid
                                                @enderror" id="yourUsername" value="{{ old('username') }}" required>
                                                @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Kata sandi</label>
                                            <input type="password" name="password" class="form-control 
                                            @error('password')
                                                is-invalid    
                                            @enderror" id="yourPassword" required>
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        {{-- <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value=""
                                                    id="acceptTerms" required>
                                                <label class="form-check-label small" for="acceptTerms">
                                                    Saya setuju dan menerima <a href="#">syarat dan kotentuan</a> yang
                                                    berlaku
                                                </label>
                                            </div>
                                        </div> --}}
                                        <div class="col-12 mt-4">
                                            <button class="btn btn-primary w-100" type="submit">
                                                Register Akun
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Sudah mempunyai akun? <a href="/login">Log in</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <script src="{{ asset('admin/assets/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/echarts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/quill.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/simple-datatables.js') }}"></script>
    <script src="{{ asset('admin/assets/js/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/validate.js') }}"></script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
</body>

</html>