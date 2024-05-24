@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Penyewaan</h1>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- <form action="/dashboard/penyewaan/search" method="get" class="mb-3">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari berdasarkan kode booking" name="booking_code">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form> --}}

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Kode Sewa</th>
                    <th scope="col">Penyewa</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Lapangan</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menyewa as $sewa)
            <tr>
                <td>{{ $sewa->booking_code }}</td>
                <td>{{ $sewa->user_nama }}</td>
                <td>{{ $sewa->tanggal }}</td>
                <td>{{ $sewa->nama }}</td>
                <td>{{ $sewa->Jam }}</td>
                <td class="{{ $sewa->status === 'Belum Lunas' ? 'border-0 badge bg-danger' : 'border-0 badge bg-success' }}">{{ $sewa->status }}</td>

                <td>
                    <form action="/dashboard/penyewaan/{{ $sewa->id }}" method="post" class="d-inline">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="border-0 badge bg-success"
                            onclick="return confirm('Penyewaan {{ $sewa->user_nama }} sudah lunas?')">
                            <i class="bi bi-check2"></i>
                        </button>
                    </form>
                  
                  {{-- <a href="/dashboard/lapangan/{{ $lapangan->id }}/edit"><span class="badge bg-success"><i class="bi bi-pencil-fill"></i></span></a> --}}
                  <form action="/dashboard/penyewaan/{{ $sewa->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="border-0 badge bg-danger" onclick="return confirm('Hapus Lapangan {{ $sewa->user_nama }}?')"><i class="bi bi-trash"></i></button>
                  </form>
                </td>
            </tr> 
        @endforeach
            </tbody>
        </table>
    </div>
@endsection
