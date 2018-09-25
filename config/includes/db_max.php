<?php
//membangun koneksi
$username="review";
$password="review";
$database="192.168.1.157/maxprd";
 
$koneksi=oci_connect($username,$password,$database);
 
if($koneksi){
//echo "Koneksi berhasil";
}else{
$err=oci_error();
echo "Gagal tersambung ke ORACLE". $err['text'];
}

?>