<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotNilai extends Model
{
    use HasFactory;
    protected $table = 'tb_bobot_nilai';
    protected $fillable = ['nilai_id', 'bobot_akademik', 'bobot_jalan_ditempat', 'bobot_langkah_tegap', 'bobot_penghormatan', 'bobot_belok', 'bobot_hadap', 'bobot_lari', 'bobot_pushup', 'bobot_situp', 'bobot_pullup', 'bobot_tb', 'bobot_bb', 'bobot_bentuk_kaki'];

    public function nilai() {
        return $this->belongsTo(Nilai::class, 'nilai_id', 'id');
    }
}
