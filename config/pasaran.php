<?php
$pasaran = array('Legi', 'Pahing', 'Pon', 'Wage', 'Kliwon');

$date = date('d');
$month = date('m');
$year = date('Y');

$tgl = GregorianToJD($month, $date, $year);

// hitung modulo 5 dari selisih harinya
$mod = $tgl % 5;
// menampilkan nama hari pasaran, yaitu elemen ke-$mod dari array $pasaran
echo $pasaran[$mod];
?>
