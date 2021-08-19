@extends('layout.app')
@section('title', 'Login')
@section('content')
    <div class="container-sm w-25 mt-5">
        <form method="POST" action="{{ url('/custom-login') }}">
            @csrf
            @if (session('failed'))
                <div class="mb-3">
                    <div class="alert alert-danger" role="alert">
                        Login Failed!
                    </div>
                </div>
            @endif
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter email address...">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter password...">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex">
                <button type="submit" class="btn btn-primary mx-auto">Login</button>
            </div>
        </form>
    </div>
@endsection