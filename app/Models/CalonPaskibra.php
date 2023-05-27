<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonPaskibra extends Model
{
    use HasFactory;
    protected $table = 'tb_calon_paskibraka';
    protected $fillable = ['name', 'alamat', 'asal_sekolah', 'jenis_kelamin', 'tgl_lahir', 'no_telp'];
}
