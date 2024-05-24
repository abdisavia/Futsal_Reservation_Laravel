<?php

namespace App\Http\Controllers;

use App\Models\Menyewa;
use Illuminate\Http\Request;

class DashboardMenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menyewa = Menyewa::join('lapangans', 'menyewas.id_lapangan', '=', 'lapangans.id')
            ->join('jadwals', 'menyewas.id_jadwal', '=', 'jadwals.id')
            ->join('users', 'menyewas.id_user', '=', 'users.id')
            ->select('menyewas.*', 'lapangans.nama', 'jadwals.Jam', 'users.username as user_nama')
            ->get();
            
        // dd($menyewa);
        return view('dashboard.penyewaan.index', compact('menyewa'));
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
    public function update(Request $request, $id)
    {
        $sewa = Menyewa::find($id);
        if (!$sewa) {
            return redirect()->back()->with('error', 'Data penyewaan tidak ditemukan.');
        }

        $sewa->status = 'Lunas';
        $sewa->save();

        return redirect('/dashboard/penyewaan')->with('success', 'Pembayaran Sewa Lunas!');
    }

    

    public function destroy($id)
    {
        $sewa = Menyewa::find($id);
        if (!$sewa) {
            return redirect()->back()->with('error', 'Data penyewaan tidak ditemukan.');
        }

        $sewa->delete();

        return redirect()->back()->with('success', 'Data penyewaan berhasil dihapus.');
    }

    
}
