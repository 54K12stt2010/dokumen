<?php
//membangun koneksi
$username="mimsoe";
$password="mims";
$database="192.168.1.8/ellprd";
//$table = 'sdm_temp';
$user = 'sdmpayroll';
$password = 'payroll05';
 
$koneksi=oci_connect($username,$password,$database);
 
if($koneksi){
//echo "Koneksi berhasil";
}else{
$err=oci_error();
echo "Gagal tersambung ke ORACLE". $err['text'];
}

?>