<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function biodata()
    {
        return $this->belongsTo(Biodata::class, 'id_biodata');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'id_kelas');
    }
    
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class,'id_jurusan');
    }

    public function jadwal_belajar()
    {
        return $this->belongsTo(Jadwal_belajar::class,'id_jadwal');
    }
}
