<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
        $judul = 'JADWAL CBT CENTER';
        $jadwal = Jadwal::all();

        return view('layanan.jadwal', [
            'judul' => $judul,
            'jadwal' => $jadwal,
        ]);
    }
}
