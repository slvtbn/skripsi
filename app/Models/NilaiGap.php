<?php

namespace App\Models;

use App\Models\BobotNilai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NilaiGap extends Model
{
    use HasFactory;
    protected $table = 'tb_nilai_gap';
    protected $fillable = ['bobot_nilai_id', 'gap_akademik', 'gap_jalan_ditempat', 'gap_langkah_tegap', 'gap_penghormatan', 'gap_belok', 'gap_hadap', 'gap_lari', 'gap_pushup', 'gap_situp', 'gap_pullup', 'gap_tb', 'gap_bb', 'gap_bentuk_kaki'];

    public function bobot_nilai() {
        return $this->belongsTo(BobotNilai::class, 'bobot_nilai_id', 'id');
    }
}
