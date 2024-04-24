<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perkuliahan extends Model
{
    use HasFactory;

    protected $table = 'perkuliahan';
    protected $fillable = ['nim', 'kode_mk', 'nilai'];

    public function mahasiswa(){
        return $this->belongsTo(mahasiswa::class, 'nim', 'nim');
    }

    public function mataKuliah(){
        return $this->belongsTo(mataKuliah::class, 'kode_mk', 'kode_mk');
    }

}
