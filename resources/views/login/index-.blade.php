@extends('layouts.main')

@section('container')

<main class="form-signin w-100 m-auto">

  <div class="row justify-content-center">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('loginErr'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginErr') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="col-md-5">
      <form action="/login" method="post">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required>
          <label for="floatingInput">Email address</label>
          @error('email')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-floating">
        <input type="password" name="password" class="form-control" id="email" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Login</button>
      </form>
      <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register</a></small>
    </div>
  </div>
    
  </main>

@endsection