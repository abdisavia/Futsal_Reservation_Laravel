<?php

namespace App\Http\Controllers;

use App\Models\Menyewa;
use App\Http\Requests\StoreMenyewaRequest;
use App\Http\Requests\UpdateMenyewaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menyewa = Menyewa::join('jadwals', 'menyewas.id_jadwal', '=', 'jadwals.id')
            ->where('menyewas.id_user', Auth::id())
            ->get();
        $title = "Booking";
        return view('menyewa.index', compact('menyewa','title'));
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
    public function store(StoreMenyewaRequest $request)
    {
        $data = $request->validated();
        $selectedJadwal = $request->input('selected_jadwal');

        foreach ($selectedJadwal as $jadwal) {
            $values = explode('|', $jadwal);
            $idJadwal = $values[0]; // ID jadwal
            $date = $values[1];
            $existingOrder = Menyewa::where('id_jadwal', $idJadwal)
                ->where('tanggal', $date)
                ->first();

            if ($existingOrder) {
                return redirect()->back()->withErrors('Pesanan double pada waktu yang bersamaan.');
            }

            $newData = [
                'id_lapangan' => $request->input('id_lapangan'),
                'id_user' => Auth::id(),
                'id_jadwal' => $idJadwal,
                'harga' => $request->input('harga_lapangan'),
                'tanggal' => $date,
            ];

            Menyewa::create($newData);
        }

        return redirect("/menyewa")->with('sewaSuccess', 'Penyewaan Success!');
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
    public function update(UpdateMenyewaRequest $request, Menyewa $menyewa)
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
