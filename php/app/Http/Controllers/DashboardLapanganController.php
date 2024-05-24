<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;

class DashboardLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Lapangan = lapangan::all();
        return view('dashboard.lapangan.index',compact('Lapangan'));
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
        $validatedData = $request->validate([
            'kode_lapangan' => 'required|unique:lapangans|max:5',
            'nama' => 'required|max:50',
            'harga' => 'required|max:10'
        ]);
        lapangan::create($validatedData);
        return redirect('/dashboard/lapangan')->with('success', 'Data Lapangan Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lapangan $lapangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lapangan $lapangan)
    {
        return view('dashboard.lapangan.edit',compact('lapangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lapangan $lapangan)
    {
        $rules = [
            'nama' => 'required|max:50',
            'harga' => 'required|max:10'
        ];
        if ($request->kode_lapangan != $lapangan->kode_lapangan) {
            $rules['kode_lapangan'] = 'required|unique:lapangans|max:5';
        }
        $validatedData = $request->validate($rules);
        lapangan::where('id', $lapangan->id)
                ->update($validatedData);

        return redirect('/dashboard/lapangan')->with('success', 'Data Lapangan Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lapangan $lapangan)
    {
        // dd($lapangan);
        lapangan::destroy($lapangan->id);
        return redirect('/dashboard/lapangan')->with('success', 'Data Lapangan Berhasil dihapus!');
    }
}
