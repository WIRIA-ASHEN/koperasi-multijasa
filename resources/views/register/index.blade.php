@extends('layouts.main')

@section('container')

<main class="form-registration w-100 m-auto">

  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="/register" method="post">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">Form Register</h1>
        <div class="form-floating">
          <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" required>
          <label for="name">Nama</label>
          @error('name')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="username" name="username" class="form-control rounded-top @error('username') is-invalid @enderror" id="username" placeholder="username" required>
          <label for="username">username</label>
          @error('username')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required>
          <label for="email">Email address</label>
          @error('email')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
          <label for="password">Password</label>
          @error('password')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Daftar</button>
      </form>
      <small class="d-block text-center mt-3">Have an account? <a href="/login">Back to Login</a></small>
    </div>
  </div>
    
  </main>

@endsection