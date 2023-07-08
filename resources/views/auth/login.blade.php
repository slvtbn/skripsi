@extends('master-auth')

@section('title', 'Login')
@section('auth')
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <h1 class="text-primary">SPASKIB</h1>
                    </div>
                    <div class="card card-primary">
                    <div class="card-header"><h4>Login</h4></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" tabindex="1" value="{{ old('email') }}" required autofocus>
                            <div class="invalid-feedback">
                                Kolom harus diisi
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                            <div class="invalid-feedback">
                                Kolom harus diisi
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Login
                            </button>
                        </div>
                        </form>

                    </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                    Belum punya akun? <a href="{{ route('register') }}">Buat disini</a>
                    </div>
                    <div class="simple-footer">
                    Copyright &copy; PPI Biak Numfor
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>
    @if ($errors->any())
        <script>
            // Menampilkan pesan kesalahan dengan SweetAlert2
            Swal.fire({
                icon: 'error',
                title: 'Failed',
                text: 'Username atau Password Salah'
            });
        </script>
    @endif
@endsection