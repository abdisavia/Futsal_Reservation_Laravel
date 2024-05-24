@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Lapangan</h1>
  </div>
  @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
  @endif
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Kode Lapangan</th>
          <th scope="col">Nama</th>
          <th scope="col">Harga</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($Lapangan as $lapangan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $lapangan->kode_lapangan }}</td>
                <td>{{ $lapangan->nama }}</td>
                <td>{{ $lapangan->harga }}</td>
                <td>
                  
                  <a href="/dashboard/lapangan/{{ $lapangan->id }}/edit"><span class="badge bg-success"><i class="bi bi-pencil-fill"></i></span></a>
                  <form action="/dashboard/lapangan/{{ $lapangan->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="border-0 badge bg-danger" onclick="return confirm('Hapus Lapangan {{ $lapangan->nama }}?')"><i class="bi bi-trash"></i></button>
                  </form>
                </td>
            </tr> 
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Lapangan</h1>
  </div>
  
  <form action="" method="post">
    @csrf
    <label for="kode_lapangan" class="form-label fs-4">Kode Lapangan</label>
    <input type="text" class="form-control  @error('kode') is-invalid @enderror" id="kode_lapangan" name="kode_lapangan" placeholder="Masukkan Kode Lapangan">
    @error('kode_lapangan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <label for="nama" class="form-label fs-4 ">Nama Lapangan</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama Lapangan">
    @error('nama')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <label for="harga" class="form-label fs-4 ">Harga Lapangan</label>
    <input type="int" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="Masukkan Harga Lapangan">
    @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <button class="btn-primary mt-3" type="submit">Tambah</button>
  </form> 
@endsection