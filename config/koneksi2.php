<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
 
$koneksi = new mysqli("localhost", "root", "", "db_dokumen");
if($koneksi->connect_errno) {
	echo "Gagal melakukan koneksi ke MySQL: " . $koneksi->connect_error;
}
?>