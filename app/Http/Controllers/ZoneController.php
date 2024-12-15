<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ZoneController extends Controller
{
    /**
     * Display the dashboard with the map.
     */
    public function dashboard()
    {
        return view('dashboard');
    }

    /**
     * Display the details of a specific zone.
     *
     * @param int $id
     */
    public function show($id)
{
    // Validasi zona (opsional)
    if (!in_array($id, [1, 2, 3, 4, 5, 6])) {
        abort(404, 'Zona tidak ditemukan');
    }

    // Tentukan path gambar berdasarkan zona
    $imagePath = "/images/zona{$id}.jpg";

    // Kirim data ke view
    return view('zone', [
        'zoneId' => $id,
        'imagePath' => $imagePath,
    ]);
}

}
