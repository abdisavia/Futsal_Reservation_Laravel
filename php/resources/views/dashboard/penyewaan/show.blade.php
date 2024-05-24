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
                <tr>
                    <td>{{ $menyewa->booking_code }}</td>
                    <td>{{ $menyewa->user_nama }}</td>
                    <td>{{ $menyewa->tanggal }}</td>
                    <td>{{ $menyewa->nama }}</td>
                    <td>{{ $menyewa->Jam }}</td>
                    <td class="{{ $menyewa->status === 'Belum Lunas' ? 'border-0 badge bg-danger' : 'border-0 badge bg-success' }}">{{ $menyewa->status }}</td>

                    <td>
                        <form action="/dashboard/penyewaan/{{ $menyewa->id }}" method="post" class="d-inline">
                            @method('PUT')
                            @csrf
                            <button type="submit" class="border-0 badge bg-success"
                                onclick="return confirm('Penyewaan {{ $menyewa->user_nama }} sudah lunas?')">
                                <i class="bi bi-check2"></i>
                            </button>
                        </form>

                        <form action="/dashboard/penyewaan/{{ $menyewa->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="border-0 badge bg-danger"
                                onclick="return confirm('Hapus Penyewaan {{ $menyewa->user_nama }}?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
