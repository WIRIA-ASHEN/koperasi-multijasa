@extends('layouts.main')

@section('container')
    <h1>Halaman About</h1>
    <p>{{ $nama }}</p>
    <p>{{ $kelas }}</p>
    <p>{{ $prodi }}</p>
    <p>{{ $jurusan }}</p>
    <img src="img/{{ $image }}" alt="{{ $nama }}" width="250" >
@endsection