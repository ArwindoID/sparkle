<?php

namespace App\Http\Controllers;

use App\Models\ZonaParkir;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $zonaParkir = ZonaParkir::all()->map(function ($zona) {
            $decodedKoordinat = json_decode($zona->koordinat, true);

            return (object) [
                'id' => $zona->id,
                'nama_zona' => $zona->nama_zona,
                'keterangan' => $zona->keterangan,
                'coords' => implode(',', $decodedKoordinat['coords']),
                'shape' => $decodedKoordinat['shape'],
            ];
        });
        return view('dashboard', compact('zonaParkir'));
    }
}
