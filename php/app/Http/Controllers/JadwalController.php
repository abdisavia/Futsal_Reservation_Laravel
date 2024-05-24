<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Menyewa;
use App\Models\Lapangan;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use Carbon\CarbonPeriod;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_lapangan)
    {
        // Get the range of dates (7-day range starting from today)
        $title = "Jadwal";
        $datePeriod = CarbonPeriod::create(now(), now()->addDays(6));
        $jadwalLapangan=[];
        foreach ($datePeriod as $date) {
            $dayName = $date->format('l');
            $jadwal = jadwal::all();
            $sewa = menyewa::all();
            $lapangan = lapangan::where('id', $id_lapangan)->first();

            $jadwalLapangan[]=[
                'day_name' => $dayName,
                'dates' => $date->format('d M'),
                'date' => $date,
                'jadwal' => $jadwal,
                'sewa' => $sewa,
                'lapangan' => $lapangan
            ];
        }
        

        return view('jadwal.index', compact('jadwalLapangan', 'id_lapangan', 'lapangan', 'title'));
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
    public function store(StoreJadwalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
