<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use App\Models\Namafas;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class LayananBackendController extends Controller
{
    public function jadwalbackend()
    {
        $judul = 'Jadwal CBT Center';
        $jadwal = Jadwal::all();
        $user = Auth::user();

        return view('layanan.jadwalbackend', [
            'judul' => $judul,
            'jadwal' => $jadwal,
            'user' => $user,
        ]);
    }
    
    public function createJadwal(Request $request) 
    {
        // Validasi input
        $request->validate([
            'isi_jadwal' => 'required',
            'jam_awal' => 'required|date_format:H:i', // Format 24 jam
            'jam_akhir' => 'required|date_format:H:i|after:jam_awal',
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
            'pic' => 'required',
            'penyelenggara' => 'required',
            'keterangan' => 'required',
        ]);
    
        // Cek apakah ada jadwal dengan tanggal awal atau akhir yang sama dan rentang waktu bertumpukan
        $exists = Jadwal::where(function ($query) use ($request) {
                        $query->where('tanggal_awal', $request->tanggal_awal)
                              ->orWhere('tanggal_awal', $request->tanggal_akhir)
                              ->orWhere('tanggal_akhir', $request->tanggal_awal)
                              ->orWhere('tanggal_akhir', $request->tanggal_akhir);
                    })
                    ->where(function ($query) use ($request) {
                        $query->whereBetween('jam_awal', [$request->jam_awal, $request->jam_akhir])
                              ->orWhereBetween('jam_akhir', [$request->jam_awal, $request->jam_akhir])
                              ->orWhere(function ($query) use ($request) {
                                  $query->where('jam_awal', '<=', $request->jam_awal)
                                        ->where('jam_akhir', '>=', $request->jam_akhir);
                              });
                    })
                    ->exists();
    
        if ($exists) {
            // Jika jadwal dengan tanggal dan rentang waktu yang sama sudah ada, kembalikan pesan error
            return redirect()->back()->with('error', 'Jadwal dengan tanggal atau rentang waktu yang sama sudah ada!')->withInput();
        }
    
        // Simpan data jadwal
        Jadwal::create([
            'isi_jadwal' => $request->isi_jadwal,
            'jam_awal' => $request->jam_awal,
            'jam_akhir' => $request->jam_akhir,    
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
            'pic' => $request->pic,
            'penyelenggara' => $request->penyelenggara,
            'keterangan' => $request->keterangan,
        ]);
    
        // Redirect dengan status sukses
        return redirect('/jadwalbackend')->with('success', 'Jadwal berhasil ditambahkan!');
    }
       

    public function deleteJadwal(Request $request)
    {
        $delete = Jadwal::where('id', $request->id)->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'Jadwal berhasil dihapus.');
        }
        return redirect()->back()->with('error', 'Jadwal tidak di temukan');
    }

    public function updateJadwal(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'id' => 'required|exists:jadwal,id', // Pastikan ID jadwal ada di database
            'isi_jadwal' => 'required',
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
            'pic' => 'required',
            'penyelenggara' => 'required',
            'keterangan' => 'required',
        ]);

        // Temukan jadwal berdasarkan ID yang diberikan
        $jadwal = Jadwal::findOrFail($request->id);

        // Cek apakah ada jadwal dengan tanggal awal atau akhir yang sama dan rentang waktu bertumpukan (kecuali jadwal ini sendiri)
        $exists = Jadwal::where(function ($query) use ($request) {
                        $query->where('tanggal_awal', $request->tanggal_awal)
                            ->orWhere('tanggal_awal', $request->tanggal_akhir)
                            ->orWhere('tanggal_akhir', $request->tanggal_awal)
                            ->orWhere('tanggal_akhir', $request->tanggal_akhir);
                    })
                    ->where('id', '!=', $jadwal->id)
                    ->where(function ($query) use ($request) {
                        $query->whereBetween('jam_awal', [$request->jam_awal, $request->jam_akhir])
                            ->orWhereBetween('jam_akhir', [$request->jam_awal, $request->jam_akhir])
                            ->orWhere(function ($query) use ($request) {
                                $query->where('jam_awal', '<=', $request->jam_awal)
                                        ->where('jam_akhir', '>=', $request->jam_akhir);
                            });
                    })
                    ->exists();

        if ($exists) {
            // Jika jadwal dengan tanggal dan rentang waktu yang sama sudah ada, kembalikan pesan error
            return redirect()->back()->with('error', 'Jadwal dengan tanggal atau rentang waktu yang sama sudah ada!')->withInput();
        }

        // Perbarui properti jadwal dengan data baru
        $jadwal->isi_jadwal = $request->isi_jadwal;
        $jadwal->jam_awal = $request->jam_awal;
        $jadwal->jam_akhir = $request->jam_akhir;
        $jadwal->tanggal_awal = $request->tanggal_awal;
        $jadwal->tanggal_akhir = $request->tanggal_akhir;
        $jadwal->pic = $request->pic;
        $jadwal->penyelenggara = $request->penyelenggara;
        $jadwal->keterangan = $request->keterangan;

        // Simpan perubahan
        $jadwal->save();

        // Jika perubahan berhasil disimpan, arahkan kembali pengguna ke halaman yang sesuai
        return redirect()->back()->with('success', 'Jadwal berhasil diperbarui.');
    }
    




    public function getJadwalById($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return response()->json($jadwal);
    }
    
}
