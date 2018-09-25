<?php
include "../config/koneksi.php";

$mid = $_POST[mid];
$mpass     = $_POST[mpass];

// pastikan username dan password adalah berupa huruf atau angka.
$login=mysql_query("SELECT * FROM member WHERE iduser='$mid' AND password='$mpass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();

 $_SESSION[member]     = $r[idmem];
  $_SESSION[iduser]     = $r[iduser];
  $_SESSION[nama]  = $r[nama];
  $_SESSION[password]     = $r[password];
		?><script language="javascript">
			document.location='../index.php?act=default'
		</script>	<?
}else{
?><script language="javascript">
	alert("User Name/Password salah..!");
	document.location='../index.php?act=default'
	</script>	<?
}
?>
