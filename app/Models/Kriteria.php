<?php

namespace App\Models;

use App\Models\Aspek;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'tb_kriteria';
    protected $fillable = ['aspek_id', 'simbol', 'kriteria', 'nilai_target', 'kelas'];

    public function aspek() {
        return $this->belongsTo(Aspek::class, 'aspek_id', 'id');
    }
}
