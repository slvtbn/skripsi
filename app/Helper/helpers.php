<?php 

function bobot($skalaPenilaian, $nilai) {
    $nilai = (int) $nilai;
    foreach($skalaPenilaian as $skala) {
        if($nilai >= $skala->batas_atas && $nilai <= $skala->batas_bawah) {
            return $bobot = $skala->bobot;
        }else{
            $bobot = null;
        }
    }
    return $bobot;
}

function bobot2($skalaPenilaian, $nilai, $gender) {
    $nilai = (int) $nilai;
    foreach($skalaPenilaian as $skala) {
        if($gender == 'Laki-laki' && $nilai >= $skala->ba_cowo && $nilai <= $skala->bb_cowo) {
            return $bobot = $skala->bobot;
        }else if($gender == 'Perempuan' && $nilai >= $skala->ba_cewe && $nilai <= $skala->bb_cewe) {
            return $bobot = $skala->bobot;
        }else {
            $bobot = null;
        }
    }
    return $bobot;
}

// fungsi menghitung bobot bb
function bobot3($tinggi, $berat) {
    // berat = 54, 45
    // tinggi = 160
    // bb ideal = 50 ; 55 ; 45
    $bb_ideal = $tinggi - 110;
    if($berat == $bb_ideal || ($berat <= ($bb_ideal+5) && $berat > $bb_ideal) || ($berat >= ($bb_ideal-5) && $berat < 50)) {
        $bobot = 5;
    }else if(($berat <= ($bb_ideal+10) && $berat > $bb_ideal) || ($berat >= ($bb_ideal-10) && $berat < 50)){
        $bobot = 3;
    }else {
        $bobot = 1;
    }

    return $bobot;
}

// fungsi menghitung gap
function gap($bobot, $target) {
    $gap = $bobot - $target;
    return $gap;
}

// fungsi menghitung bobot nilai gap
function bobotGap($nilai, $tabelGap) {
    $nilai = (int) $nilai;
    foreach($tabelGap as $gap) {
        if($nilai == $gap->selisih) {
            return $bobot_gap = $gap->bobot_nilai;
        }
    }
}
?>