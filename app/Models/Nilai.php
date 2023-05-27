<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'tb_nilai';
    protected $fillable = ['nama_lengkap', 'asal_sekolah', 'jenis_kelamin', 'akademik', 'jalan_ditempat', 'langkah_tegap', 'penghormatan', 'belok', 'hadap', 'lari', 'pushup', 'situp', 'pullup', 'tb', 'bb', 'bentuk_kaki'];
}
