<?php

namespace App\Http\Controllers;

use App\Models\Menyewa;
use Illuminate\Http\Request;

class DashboardLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
        {
            $bulan = $request->input('bulan');
            $tahun = $request->input('tahun');

            $menyewas = Menyewa::join('lapangans', 'menyewas.id_lapangan', '=', 'lapangans.id')
                        ->join('jadwals', 'menyewas.id_jadwal', '=', 'jadwals.id')
                        ->join('users', 'menyewas.id_user', '=', 'users.id')
                        ->select('menyewas.*', 'lapangans.nama', 'jadwals.Jam', 'users.username as user_nama')
                        ->whereYear('menyewas.tanggal', $tahun)
                        ->whereMonth('menyewas.tanggal', $bulan)
                        ->get();

            // dd($menyewas);
            return view('dashboard.laporan.index', compact('bulan', 'tahun', 'menyewas'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Menyewa $menyewa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menyewa $menyewa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menyewa $menyewa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menyewa $menyewa)
    {
        //
    }
}
