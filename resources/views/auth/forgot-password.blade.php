@extends('layouts.auth', ['title' => 'Forgot Password'])

@section('content')
    <div class="container">

        {{-- Outer Row --}}
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="img-logo text-center mt-5">
                    <img src="{{ asset('assets/img/company.png') }}" style="width: 80px;">
                </div>

                <div class="card o-hidden border-0 shadow-lg mb-3 mt-5">
                    <div class="card-body p-4">

                        {{-- alert --}}
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="text-center">
                            <h1 class="h5 text-gray-900 mb-3">RESET PASSWORD</h1>
                        </div>

                        {{-- route password.email obtained from fortify without setup manually --}}
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold text-uppercase">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                    autocomplete="email" placeholder="Masukkan Alamat Email" autofocus required>

                                {{-- error message --}}
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            {{-- button submit --}}
                            <button type="submit" class="btn btn-primary btn-block">SEND PASSWORD RESET LINK</button>
                        </form>
                    </div>
                </div>

                {{-- link redirect to login page --}}
                <div class="text-center text-white">
                    <label><a href="/login" class="text-dark">Kembali ke Login</a></label>
                </div>
            </div>
        </div>
    </div>
@endsection