@extends('master-auth')

@section('title', 'Register')

@section('auth')
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                    <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                    <div class="card-header"><h4>Register</h4></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input id="name" type="text" class="form-control" name="name" tabindex="1" value="{{ old('name') }}" required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your email
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" value="{{ old('email') }}" required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your email
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" name="old('password')" tabindex="2" required>
                                <div class="invalid-feedback">
                                please fill in your password
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" tabindex="2" required>
                                <div class="invalid-feedback">
                                please fill in your password
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Register
                                </button>
                            </div>
                        </form>

                    </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Purna Paskibraka Indonesia
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>
@endsection