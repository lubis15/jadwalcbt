<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $fillable = [
        'isi_jadwal',
        'jam_awal',
        "jam_akhir",
        'tanggal_awal',
        'tanggal_akhir',
        'pic',
        'penyelenggara',
        'keterangan',
    ];
}
