@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Laporan Bulanan</h1>
  </div>
  <form action="/dashboard/laporan" method="GET" class="border-bottom">
    @csrf
    <label for="bulan" class="form-label fs-4">Bulan</label>
    <br>
    <select class="dropdown" name="bulan">
        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
    </select>
    <br>
    <label for="tahun" class="form-label fs-4">Tahun</label>
    <input type="number" class="form-control col-sm-6 @error('tahun') is-invalid @enderror" id="tahun" name="tahun" placeholder="Masukkan Tahun">

    @error('kode_lapangan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <button class="btn btn-primary mt-2 mb-2" type="submit">Buat Laporan</button>
</form>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Laporan Bulanan</h1>
  </div>
<p>Bulan: {{ $bulan }}</p>
<p>Tahun: {{ $tahun }}</p>
@if ($menyewas->isEmpty())
    <p>Tidak ada hasil menyewa untuk bulan ini.</p>
@else
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Kode Sewa</th>
                <th scope="col">Penyewa</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Lapangan</th>
                <th scope="col">Jam</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menyewas as $sewa)
                <tr>
                    <td>{{ $sewa->booking_code }}</td>
                    <td>{{ $sewa->user_nama }}</td>
                    <td>{{ $sewa->tanggal }}</td>
                    <td>{{ $sewa->nama }}</td>
                    <td>{{ $sewa->Jam }}</td>
                    <td class="border-0 {{ $sewa->status === 'Belum Lunas' ? 'badge bg-danger' : 'badge bg-success' }}">{{ $sewa->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection