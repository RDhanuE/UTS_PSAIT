<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    protected $filable = ['kode_mk', 'nama_mk', 'sks'];
}
