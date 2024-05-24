@extends('dashboard.layouts.main')
@section('container')
  @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
  @endif
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Lapangan</h1>
  </div>
  
  <form action="/dashboard/lapangan/{{ $lapangan->id }}" method="post">
    @method('patch')
    @csrf
    <label for="kode_lapangan" class="form-label fs-4">Kode Lapangan</label>
    <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode_lapangan" name="kode_lapangan" placeholder="Masukkan Kode Lapangan" value="{{ $lapangan->kode_lapangan }}">
    <label for="nama" class="form-label fs-4 ">Nama Lapangan</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama Lapangan" value="{{ $lapangan->nama }}">
    @error('nama')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <label for="harga" class="form-label fs-4 ">Harga Lapangan</label>
    <input type="int" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="Masukkan Harga Lapangan"value="{{ $lapangan->harga }}">
    @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <button class="btn-primary mt-3" type="submit">Update</button>
  </form> 
@endsection