<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];
$jenisop=$_SESSION['jenis'];


$pass=md5($_POST['passlama']);
$passbaru=md5($_POST['passbaru']);
// Hapus kategori_mobil_mobil
if ($module=='ubah_password' AND $act=='update'){
	$cekda=mysqli_fetch_array($ad=mysqli_query($con,"select *from operator  where username='$_POST[username]' and password='$pass' "));
	$ambildata=mysqli_fetch_row($aaad=mysqli_query($con,"select *from operator  where username='$_POST[username]'  "));
	
	if($ambildata>0){
		
	$simp=mysqli_query($con,"UPDATE operator SET password = '$passbaru' WHERE username='$_POST[username]' ");
	if($simp){?>
  <script type="application/javascript">
  alert("Password berhasil di update .");
  history.go(-1);
  </script>
  <?php }else{ ?>
  <script type="application/javascript">
  alert("Password gagal di update .");
  history.go(-1);
  </script>
  <?php }
		
	}else{
	
	?>
  <script type="application/javascript">
  alert("Username atau password salah .");
    history.go(-1);
  </script>
  <?php
		
	}
}
?>
