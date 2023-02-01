<?php

class Jamu
{
    public function umur($tahunLahir)
    {
        $umur = (int)date("Y") - (int)$tahunLahir;
        return (string)$umur;
    }
    public function namaJamu($keluhan1, $keluhan2)
    {
        $jamu = '';
        $keluhan1 = $_POST["keluhan1"];
        $keluhan2 = $_POST["keluhan2"];
        if (($keluhan1 == 'keseleo') && $keluhan2 == 'kurang nafsu makan') {
            $jamu = 'Beras Kencur';
        } else if (($keluhan1 == 'darah tinggi') && ($keluhan2 == 'gula darah')) {
            $jamu = 'Brotowali';
        } else if (($keluhan1 == 'kram perut') && $keluhan2 == 'masuk angin') {
            $jamu = 'Temulawak';
        } else if ($keluhan1 == 'keseleo') {
            $jamu = 'Kunyit Asam';
        }
        return $jamu;
    }
}

class Saran extends Jamu
{
    public function Saran()
    {
        $umur = $this->umur($_POST['tgl_lahir']);
        $cekUmur = $umur <= 10 ? "Dikonsumsi 1x" : "Dikonsumsi 2x";
        return $cekUmur;
    }
}

$jamu = new Jamu();
$saran = new Saran();
$umur = $jamu->umur($_POST['tgl_lahir']);
$namajamu = $jamu->namaJamu($_POST['keluhan1'], $_POST['keluhan2']);
