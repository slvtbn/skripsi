<?php

namespace App\Models;

use App\Models\NilaiGap;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BobotGap extends Model
{
    use HasFactory;
    protected $table = 'tb_bobot_gap';
    protected $fillable = ['nilai_gap_id', 'bobot_gap_akademik', 'bobot_gap_jalan_ditempat', 'bobot_gap_langkah_tegap', 'bobot_gap_penghormatan', 'bobot_gap_belok', 'bobot_gap_hadap', 'bobot_gap_lari', 'bobot_gap_pushup', 'bobot_gap_situp', 'bobot_gap_pullup', 'bobot_gap_tb', 'bobot_gap_bb', 'bobot_gap_bentuk_kaki', 'cf', 'sf', 'nilai_akhir'];

    public function nilai_gap() {
        return $this->belongsTo(NilaiGap::class, 'nilai_gap_id', 'id');
    }
}
