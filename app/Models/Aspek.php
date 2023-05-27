<?php

namespace App\Models;

use App\Models\Kriteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aspek extends Model
{
    use HasFactory;
    protected $table = 'tb_aspek';
    protected $fillable = ['aspek'];

    public function kriteria() {
        return $this->hasMany(Kriteria::class, 'aspek_id', 'id');
    }
}
