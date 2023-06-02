<?php

namespace App\Models;

use App\Models\BobotNilai;
use App\Models\CalonPaskibra;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'tb_nilai';
    protected $fillable = ['calon_paskibraka_id', 'akademik', 'jalan_ditempat', 'langkah_tegap', 'penghormatan', 'belok', 'hadap', 'lari', 'pushup', 'situp', 'pullup', 'tb', 'bb', 'bentuk_kaki'];

    public function calon_paskibraka() {
        return $this->belongsTo(CalonPaskibra::class, 'calon_paskibraka_id', 'id');
    }

    public function bobot_nilai() {
        return $this->hasOne(BobotNilai::class, 'nilai_id', 'id');
    }
}
